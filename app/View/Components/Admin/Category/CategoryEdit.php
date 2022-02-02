<?php

namespace App\View\Components\Admin\Category;

use Illuminate\View\Component;

use App\Models\Category;
class CategoryEdit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $list='';
    public $parentdata='';
    public function __construct($data)
    {
        $this->list = $data;
        $this->parentdata = $this->getParentData($data->parent);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(){
        return view('components.admin.category.category-edit');
    }
    public function getParentData($parent){
        if(!empty($parent)){
            return Category::find($parent);
        }else{
            return '';
        }
    }
}
