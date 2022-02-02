<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Product;
class ProductView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $list;
    public $breadcrem;
    public $cat;    
    public $products;
    public $childs;
    public function __construct($data)
    {
        $this->list = Product::with('category','images','defaultprice','attribute','attribute.attribute')->find($data->id);
        $this->cat = Category::find($data->category_id);
        $this->breadcrem = $this->BreadCrum($this->cat);
        $this->products = Product::where('category_id',$data->category_id)->paginate(10);
        $this->childs = Category::where('parent',$this->cat->parent)->paginate(15);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-view');
    }

    public function BreadCrum($cat,$Parray=null){
        if(!empty($Parray)){
            $array = array_merge(array($cat->alias=>$cat->name),$Parray);
        }else{
            $array = array($cat->alias=>$cat->name);
        }
        $Sub = Category::where(['id'=>$cat->parent])->first();
        if(!empty($cat->parent)){ $array = $this->BreadCrum($Sub,$array);}
        return $array;
    }
}
