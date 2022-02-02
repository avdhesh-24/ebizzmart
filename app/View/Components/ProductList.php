<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Product;
class ProductList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $list;
    public $categories;
    public $breadcrem;
    public $products;
    public function __construct($list)
    {
        $this->list = $list;
        $this->categories = Category::where('parent',$list->parent)->get();
        $this->breadcrem = $this->BreadCrum($list);
        $this->products = Product::with('defaultprice','attribute','attribute.attribute')->where('category_id',$list->id)->paginate(1);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(){
        return view('components.product-list');
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
