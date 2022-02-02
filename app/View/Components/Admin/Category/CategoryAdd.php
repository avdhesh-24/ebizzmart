<?php

namespace App\View\Components\Admin\Category;

use Illuminate\View\Component;
use App\Models\Category;
class CategoryAdd extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $Parent='';
    public $level='';
    public $parentdata='';
    public function __construct($parent)
    {
        $this->Parent = $parent;
        $this->level = $this->getLevel($parent);
        $this->parentdata = $this->getParentData($parent);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(){
        return view('components.admin.category.category-add');
    }
    public function getLevel($parent){
        if(!empty($parent)){
            $data = Category::find($parent);
            $level = $data->level+1;
        }else{
            $level = 1;
        }
        return $level;
    }
    public function getParentData($parent){
        if(!empty($parent)){
            return Category::find($parent);
        }else{
            return '';
        }
    }
}
