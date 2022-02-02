<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Category;
use App\Models\CategoryAttribute;
use Auth;
use App\Models\User;
class CategoryProductSample implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    protected $Category;
    
    function __construct($Category) {
        $this->Category = $Category;
    }
    public function collection(){
        $result=array();
        $result[] = [
            'Category Name',
            'Brand Name',
            'Product Name',
            'Product Image',
            'Product Description',
            'Product Ingredients',
            'Minimum Order',
            'Product Status',
            'Meta Title',
            'Meta Keywords',
            'Meta Description',
        ];
        $Category = Category::find($this->Category);
        $CategoryAttr = CategoryAttribute::with('attribute_group','attribute_group.attributes')->where('category_id',$this->Category)->get();
        foreach($CategoryAttr as $group){
            if(!empty($group->attribute_group->attributes)):
                foreach($group->attribute_group->attributes as $attribute){
                    if($group->attribute_group_id==1){
                        array_push($result[0],$attribute->title.' Mrp');
                        array_push($result[0],$attribute->title.' Selling_Price');
                        array_push($result[0],$attribute->title.' SKU');
                        array_push($result[0],$attribute->title.' Stock');
                    }else{
                        array_push($result[0],$attribute->title);
                    }
                }
            endif;
        }
        for($A=1;$A<=5;$A++){
            $result[] = [
                $Category->alias,
            ];
        }
        return collect($result);
    }
    
}
