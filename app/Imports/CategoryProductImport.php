<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryAttribute;
use App\Models\ProductAattribute;
use App\Models\ProductSize;
use App\Models\Attribute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Helper;
class CategoryProductImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        if($collection[0][0]!='Category Name' && $collection[0][1]!='Brand Name' && $collection[0][2]!='Product Name' && $collection[0][3]!='Product Image' && $collection[0][4]!='Product Description' && $collection[0][5]!='Product Ingredients' && $collection[0][6]!='Minimum Order' && $collection[0][7]!='Product Status' && $collection[0][8]!='Meta Title' && $collection[0][9]!='Meta Keywords' && $collection[0][10]!='Meta Description'){
          return back()->with('error_msg', 'Sorry! You can`t upload wrong format.');
        }
        foreach($collection as $Key => $collect):
            if($Key > 0){
                $Category = $this->CheckCategory($collect[0]);
                $Brand = $this->CheckBrand($collect[1]);
                $ProductAlias = Helper::NewAlias('products','title',$collect[2]);
                
                $Image = explode('.',$collect[3]);

                $Data = new Product();
                $Data->title = $collect[2];
                $Data->alias = $ProductAlias;
                $Data->brand_id = $Brand;
                $Data->category_id = $Category;
                $Data->thumb_image = (!empty($Image) ? $Image[0].'.webp' : '') ;
                $Data->image = (!empty($Image) ? $Image[0].'.webp' : '') ;
                $Data->description = $collect[4];
                $Data->ingredients = $collect[5];
                $Data->minimum_order = $collect[6];
                $Data->status = $collect[7];
                $Data->meta_title = $collect[8];
                $Data->meta_keywords = $collect[9];
                $Data->meta_description = $collect[10];
                $Data->save();

                $ProductId = $Data->id;
                
                $PriceArr = array();
                for($W=0;$W<count($collect);$W++){
                    if($W>10){
                        if (strpos($collection[0][$W], 'Mrp') !== false) {
                            $collection[0][$W] = str_replace('Mrp','',$collection[0][$W]);
                        }
                        if (strpos($collection[0][$W], 'Selling_Price') !== false) {
                            $collection[0][$W] = str_replace('Selling_Price','',$collection[0][$W]);
                        }
                        if (strpos($collection[0][$W], 'SKU') !== false) {
                            $collection[0][$W] = str_replace('SKU','',$collection[0][$W]);
                        }
                        if (strpos($collection[0][$W], 'Stock') !== false) {
                            $collection[0][$W] = str_replace('Stock','',$collection[0][$W]);
                        }
                        $CheckAttr = Attribute::where(['title'=>$collection[0][$W]])->first();
                        if(!empty($CheckAttr) && !empty($collect[$W])){
                            if($CheckAttr->attribute_group_id==1){
                                if(!empty($collect[$W])){ $PriceArr[] = $collect[$W].'#'.$CheckAttr->id.'#'.$ProductId; }
                            }else{
                                $Attr = new ProductAattribute();
                                $Attr->product_id = $ProductId;
                                $Attr->attribute_id = $CheckAttr->id;
                                $Attr->description = $collect[$W];
                                $Attr->save();
                            }
                        }
                    }
                }
                foreach(array_chunk($PriceArr,4) as $Chk){
                    $attribute = explode("#",$Chk[3]);
                    $SKu = explode("#",$Chk[2]);
                    $stock = explode("#",$Chk[3]);
                    $mrp = explode("#",$Chk[0]);
                    $selling_price = explode("#",$Chk[1]);
                    $ProductId = explode("#",$Chk[0]);
                    $Attr = new ProductSize();
                    $Attr->product_id = $ProductId[2];
                    $Attr->attribute_id = $attribute[1];
                    $Attr->stock_qty = $stock[0];
                    $Attr->sku =  $SKu[0];
                    $Attr->mrp = $mrp[0];
                    $Attr->selling_price = $selling_price[0];
                    $Attr->save();     
                }
            }
        endforeach;
        return back()->with('success_msg', 'CSV Uploaded Successfully.');
    }

    public function CheckAlias($Table,$Field,$Title){
        $table=$Table;
        $field=$Field;
        $slug = $Title;
        $slug = Str::slug($Title, "-");
        $key=NULL;
        $value=NULL;
        $i = 0;
        $params = array ();
        $params[$field] = $slug;
        if($key)$params["$key !="] = $value;
        $Check = DB::table($table)->where($params)->get()->count();
        for($A=1;$A<=$Check;$A++){
            $slug = preg_replace ('/[0-9]+$/', ++$A, $slug );
            $params [$field] = $slug;
        }
        return  $alias=$slug;
    }

    public function CheckCategory($Category){
        $Alias = $this->CheckAlias('categories','name',$Category);
        $Check = Category::where(['alias'=>$Alias])->first();
        if(!empty($Check)){
            return $Check->id;
        }else{
            $data = new Category();
            $data->name = ucwords($Category);
            $data->alias = $Alias;
            $data->meta_title = ucwords($Category);
            $data->meta_keywords = ucwords($Category);
            $data->meta_description = ucwords($Category);
            $data->save();
            return $data->id;
        }
    }

    public function CheckBrand($Brand){
        $Alias = $this->CheckAlias('brands','name',$Brand);
        $Check = Brand::where(['alias'=>$Alias])->first();
        if(!empty($Check)){
            return $Check->id;
        }else{
            $data = new Brand();
            $data->name = ucwords($Brand);
            $data->alias = $Alias;
            $data->meta_title = ucwords($Brand);
            $data->meta_keywords = ucwords($Brand);
            $data->meta_description = ucwords($Brand);
            $data->save();
            return $data->id;
        }
    }

    
}
