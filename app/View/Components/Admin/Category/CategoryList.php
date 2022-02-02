<?php

namespace App\View\Components\Admin\Category;

use Illuminate\View\Component;
use App\Models\Category;

class CategoryList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lists='';
    public $Parent='';
    public $parentdata='';
    public function __construct($data,$parent)
    {
        $this->lists=$data;
        $this->Parent=$parent;
        $this->parentdata = $this->getParentData($parent);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(){
        return view('components.admin.category.category-list');
    }
    public function getParentData($parent){
        if(!empty($parent)){
            return Category::find($parent);
        }else{
            return '';
        }
    }
}
