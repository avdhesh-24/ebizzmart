<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
class CategoryList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $childs;
    public $list;
    public $breadcrem;
    public function __construct($data)
    {
        $this->childs = Category::where('parent',$data->id)->paginate(15);
        $this->list = $data;
        $this->breadcrem = $this->BreadCrum($data);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(){
        return view('components.category-list');
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
