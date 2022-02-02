<?php

namespace App\View\Components\Admin\Product;

use Illuminate\View\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Company;
class EditProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lists;
    public $category;
    public $companies;
    public $brands;
    public function __construct($data)
    {
        $this->lists = Product::with('images')->where('id',$data)->first();
        $this->category = $this->getCategory(0);
        $this->companies = Company::where('status',1)->orderby('company_name','ASC')->get();
        $this->brands = Brand::where('status',1)->orderby('name','ASC')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(){
        return view('components.admin.product.edit-product');
    }
    public function getCategory($parent=null){
        $data = Category::where('parent',$parent)->get();
        $Html ='';
        foreach($data as $da){
            $child = $this->getCategory($da->id);
            if(!empty($child)){
                $Html .='<optgroup label="'.$da->name.'">
                            '.$child.'
                        </optgroup>';
            }else{
                if($this->lists->category_id==$da->id){ $select='selected';}else{ $select=''; }
                $Html .='<option value="'.$da->id.'" '.$select.'>'.$da->name.'</option>';
            }
            
        }
        return $Html;
    }
}
