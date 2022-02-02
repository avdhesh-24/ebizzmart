<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Attribute;
use App\Models\CategoryAttribute;
use App\Models\Product;
use App\Models\ProductAattribute;
use App\Models\ProductOffer;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\ProductBlog;
use App\Models\ProductCombo;
use App\Models\ProductComboprice;
use Auth;
use Helper;
use Image;
class ProductController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }
     
    public function index(){
        $lists = Product::latest()->get();
        return view('admin.product.list',compact('lists'));
    }

    public function New($Parent=null){
        $lists = Product::where('status',1)->orderBy('title','ASC')->get();
        return view('admin.product.add',compact('lists'));
    }

    public function Edit($Id){
        return view('admin.product.edit',compact('Id'));
    }

    public function Remove(Request $r){
        $data = Product::find($r->removeId);
        $images = ProductImage::where('product_id',$r->removeId)->get();
        if(!empty($data->image) && file_exists(public_path('uploads/product/banner/'.$data->image))){
            unlink(public_path('uploads/product/banner/'.$data->image));
        }
        if(!empty($data->image) && file_exists(public_path('uploads/product/'.$data->image))){
            unlink(public_path('uploads/product/'.$data->image));
        }
        foreach($images as $img){
            if(!empty($img->image) && file_exists(public_path('uploads/product/'.$data->image))){
                unlink(public_path('uploads/product/'.$data->image));
            }
        }
        Product::find($r->removeId)->delete();
        ProductImage::where('product_id',$r->removeId)->delete();
        ProductSize::where('product_id',$r->removeId)->delete();
        ProductColor::where('product_id',$r->removeId)->delete();
        ProductAattribute::where('product_id',$r->removeId)->delete();
        ProductOffer::where('product_id',$r->removeId)->delete();
        return back()->with('success_msg', 'Product data have been remove successfully.');
    }

    public function Status($Status,$Id){
        Product::where('id',$Id)->update(['status'=>$Status]);
        return back()->with('success_msg', 'Product status has been updated successfully.');
    }

    public function Featured($Status,$Id){
        Product::where('id',$Id)->update(['featured'=>$Status]);
        return back()->with('success_msg', 'Featured status has been updated successfully.');
    }

    public function Save(Request $r){
        $validated = $r->validate([
            'product_name' => 'required|max:255',
            'mro'=>'required',
            'availability'=>'required',
            'category' => 'required',
            'image' =>'required',
            'company' => 'required',
            'brand' => 'required',
        ]);

       
        if(!empty($r->image)){
            $extension =  $r->image->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $ImageName = Helper::DirectFile('uploads/product/',$r->image);
                $thumb = $ImageName;
                \File::copy(public_path('uploads/product/'.$ImageName),public_path('uploads/product/banner/'.$ImageName));
        
            }else{
                $thumb = Helper::ProductImageWithSize('uploads/product/',400,400,$r->image);
                $ImageName = Helper::ProductImageWithSize('uploads/product/banner/',1000,1000,$r->image);
            }
        }else{
            $ImageName='';
        }
        
        $data = new Product();
        $data->title = $r->product_name;
        $data->alias = Helper::NewAlias('products','title',$r->product_name);
        $data->description = $r->decription;
        $data->brand_id = $r->brand;
        $data->company_id = $r->company;
        $data->meta_title = $r->meta_title ? $r->meta_title : $r->product_name;
        $data->short_description = $r->short_description;
        $data->category_id = $r->category;
        $data->availability = $r->availability;
        $data->minimum_order = $r->mro;
        $data->meta_keywords= $r->meta_keywords;
        $data->meta_description = $r->meta_description;
        $data->image = $ImageName;
        $data->thumb_image = $thumb;
        $data->save();
        self::AddProductImages($r->all(),$data->id);
        self::AddProductAttribute($r->all(),$data->id);
        return back()->with('success_msg', 'Product has been saved successfully.');
    }

    public function Update(Request $r){
        $validated = $r->validate([
            'product_name' => 'required|max:255',
            'mro'=>'required',
            'availability'=>'required',
            'category' => 'required',
            'company' => 'required',
            'brand' => 'required',
        ]);

        $data = Product::find($r->preId);

        if(!empty($r->image)){
            $extension =  $r->image->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $ImageName = Helper::DirectFile('uploads/product/',$r->image);
                $thumb = $ImageName;
                \File::copy(public_path('uploads/product/'.$ImageName),public_path('uploads/product/banner/'.$ImageName));
        
            }else{
                $thumb = Helper::ProductImageWithSize('uploads/product/',400,400,$r->image);
                $ImageName = Helper::ProductImageWithSize('uploads/product/banner/',1000,1000,$r->image);
            }
            if(!empty($data->image) && file_exists(public_path('uploads/product/banner/'.$data->image))){
                unlink(public_path('uploads/product/banner/'.$data->image));
            }
            if(!empty($data->thumb_image) && file_exists(public_path('uploads/product/'.$data->thumb_image))){
                unlink(public_path('uploads/product/'.$data->thumb_image));
            }
            $data->thumb_image = $thumb;
        }else{
            $ImageName=$r->preimage;
        }
        
        
        $data->title = $r->product_name;
        $data->alias = $r->product_alias;
        $data->description = $r->decription;
        $data->brand_id = $r->brand;
        $data->company_id = $r->company;
        $data->meta_title = $r->meta_title ? $r->meta_title : $r->product_name;
        $data->short_description = $r->short_description;
        $data->category_id = $r->category;
        $data->availability = $r->availability;
        $data->minimum_order = $r->mro;
        $data->meta_keywords= $r->meta_keywords;
        $data->meta_description = $r->meta_description;
        $data->image = $ImageName;
        $data->save();

        self::AddProductImages($r->all(),$data->id);
        self::AddProductAttribute($r->all(),$data->id);

        return back()->with('success_msg', 'Product has been updated successfully.');

    }

    public function AddProductImages($data,$ProductId){
        if(!empty($data['moreimg'])){
            $Moimage = $data['moreimg'];
            foreach($Moimage as $key => $Ro){
                $Image = $Ro;

                if(empty($Image)){
                    $FileName = '';
                }else{
                    $extension =  $Image->getClientOriginalExtension();
                    if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                        $FileName = Helper::DirectFile('uploads/product/',$Image);
                    }else{
                        $FileName = Helper::ProductImageWithSize('uploads/product/',1000,1000,$Image);
                    }
                    \File::copy(public_path('uploads/product/'.$FileName),public_path('uploads/product/banner/'.$FileName));
        
                }

                $data = new ProductImage();
                $data->product_id = $ProductId;
                $data->image = $FileName;
                $data->save();
            }
        }
        

        return true;
    }

    public function AddProductAttribute($data,$ProductId){
        $Attribute = $data['attribute'];
        $Attributegroup = $data['attributegroup'];
        $Attributetitle = $data['attribute_title'];
        $attributeId = $data['attributeId'];
        $sku = $data['sku'];
        $mrp = $data['mrp'];
        $selling_price = $data['selling_price'];


        foreach($sku as $key => $Ro):
            if(!empty($Attribute[$key])):
                if($Attributegroup[$key]==1 && !empty($sku[$key])){
                    if(!empty($data['preattribute_sizeId'][$key])){
                        $dataA = ProductSize::find($data['preattribute_sizeId'][$key]);
                    }else{
                        $dataA = new ProductSize();
                        $dataA->product_id = $ProductId;
                    }
                    $dataA->attribute_id = $Attribute[$key];
                    $dataA->sku = $sku[$key];
                    $dataA->mrp = $mrp[$key];
                    $dataA->selling_price = $selling_price[$key];
                    $dataA->save();
                }
            endif;    
        endforeach; 

        foreach($Attribute as $key => $Ro):
            if(!empty($Attribute[$key]) && $Attributegroup[$key]==3):
                if(!empty($data['preattribute_colorId'][$key])){
                    $dataA = ProductColor::find($data['preattribute_colorId'][$key]);
                }else{
                    $dataA = new ProductColor();
                    $dataA->product_id = $ProductId;
                }
                $dataA->attribute_id = $Attribute[$key];
                $dataA->save();
            endif;    
        endforeach; 

        
        foreach($attributeId as $key => $Ro):
            if(!empty($Attributetitle[$key])):
                if(!empty($data['preattribute_titleId'][$key])){
                    $dataA = ProductAattribute::find($data['preattribute_titleId'][$key]);
                }else{
                    $dataA = new ProductAattribute();
                    $dataA->product_id = $ProductId;
                }
                $dataA->attribute_id = $attributeId[$key];
                $dataA->description = $Attributetitle[$key];
                $dataA->save();
            endif;    
        endforeach; 
    }

    public function Product_Category_Attribute(Request $r){
        $Category = $r->category;
        $Product = $r->product;
        
        $CatAttr = CategoryAttribute::join('attribute_groups','category_attributes.attribute_group_id','attribute_groups.id')->where(['category_id'=>$Category])->select('attribute_groups.*')->get();
        $Html='';
        foreach($CatAttr as $key => $group):
            $Attr = Attribute::where(['attribute_group_id'=>$group->id,'status'=>1])->get();
            if($Attr->count()>0):
                if($group->id==1):
                    if($key==0){$Show='show';}else{$Show='';}
                    $Html .='<div class="card mb-3">
                            <div class="card-header bg-secondary p-0" id="headingOne">
                                <button type="button" class="btn btn-link w-100 text-left text-black py-3 px-4" data-toggle="collapse" data-target="#collapse'.$group->id.'" aria-expanded="false" aria-controls="collapseOne"><span style="font-size: 15px;color: #fff;">'.strtoupper($group->title).'</span></button>
                            </div>
                            <div id="collapse'.$group->id.'" class="collapse '.$Show.'" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body row">';
                                foreach($Attr as $rt):
                                    $Qty='';
                                    $SKU='';
                                    $MRP='';
                                    $PreId='';
                                    $SellingPrice='';
                                    if(!empty($Product)){
                                        $dataA = ProductSize::where(['product_id'=>$Product,'attribute_id'=>$rt->id])->first();
                                        if(!empty($dataA)){
                                            $Qty= $dataA->stock_qty;
                                            $SKU= $dataA->sku;
                                            $MRP= $dataA->mrp;
                                            $SellingPrice= $dataA->selling_price;
                                            $PreId =$dataA->id;
                                        }
                                    }

                                    $Html .='<div class="col-md-3"><input type="hidden" name="preattribute_sizeId[]" value="'.$PreId.'"><input type="hidden" name="attribute[]" value="'.$rt->id.'"><input type="hidden" name="attributegroup[]" value="'.$group->id.'"><div class="py-4"><span style="background-color:'.$rt->title.';border-radius: 50%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <strong>'.$rt->title.'</strong></div></div>';
                                    $Html .='<div class="col-md-3">
                                                <div class="form-group">
                                                <label>SKU / Product CODE</label>
                                                <input type="text" class="form-control" value="'.$SKU.'" name="sku[]" placeholder="SKU / Product CODE">
                                                </div>
                                            </div>';
                                    $Html .='<div class="col-md-3">
                                                <div class="form-group">
                                                <label>Product MRP: </label>
                                                <input class="form-control" value="'.$MRP.'" onkeypress="return isNumber(event)"  name="mrp[]" placeholder="Enter MRP...">
                                                </div>
                                            </div>';
                                    $Html .='<div class="col-md-3">
                                                <div class="form-group">
                                                <label>Product Selling Price: </label>
                                                <input class="form-control" value="'.$SellingPrice.'" onkeypress="return isNumber(event)"  name="selling_price[]" placeholder="Enter Selling Price...">
                                                </div>
                                            </div>';
                                endforeach;    
                        $Html .='</div>
                            </div>
                        </div>';
                endif; 

                if($group->id!=3 && $group->id!=1):
                    $Html .='<div class="card">
                    <div class="card-header bg-secondary p-0" id="headingOne">
                        <button type="button"  class="btn btn-link w-100 text-left py-3 px-4 text-black" data-toggle="collapse" data-target="#collapse'.$group->id.'" aria-expanded="true" aria-controls="collapseOne"><span  style="font-size: 15px;color: #fff;">'.$group->title.'</span></button>
                    </div>
                    <div id="collapse'.$group->id.'" class="collapse '.$Show.'" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body row">';
                        foreach($Attr as $rt):
                            $description='';
                            $PId='';
                            if(!empty($Product)){
                                $dataA = ProductAattribute::where(['product_id'=>$Product,'attribute_id'=>$rt->id])->first();
                                if(!empty($dataA)){
                                    $description= $dataA->description;
                                    $PId = $dataA->id;
                                }
                            }
                            $Html .='<div class="col-md-3"><input type="hidden" name="preattribute_titleId[]" value="'.$PId.'"><input type="hidden" name="attributeId[]" value="'.$rt->id.'"><input type="hidden" name="attributegroup[]" value="'.$group->id.'">'.$rt->title.'</div>';
                            $Html .='<div class="col-md-9">
                                        <div class="form-group">
                                        <input class="form-control" value="'.$description.'" name="attribute_title[]" placeholder="Write Something Here...">
                                        </div>
                                    </div>';
                        endforeach;    
                $Html .='</div>
                    </div>
                </div>';    
                endif;
            endif;            
        endforeach;   
        echo $Html; 
    }

    public function Get_Product_Images(Request $r){
        $Id = $r->Id;
        $list = ProductImage::find($Id);
        $data = ProductImage::find($Id)->delete();
        $images = ProductImage::where('product_id',$list->product_id)->get();
        $Html='';
        foreach($images as $image):
            $Html .='<div class="col-md-2">
                        <img src="'.asset('uploads/product/'.$image->image).'" class="imgdes">
                        <a href="javascript:void(0)" onclick="RemovePreImages('.$image->id.')"><i class="fa fa-trash"></i></a>
                    </div>';
        endforeach;
        
        echo $Html;
    }

}
