<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class LeftPanel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $homemanagement;
    public $catelog;
    public $brandarr;
    public $categoryarr;
    public $productarr;
    public $attributearr;
    public function __construct(){
        $this->homemanagement = ['top-category','our-facility','region-suppliers','advertisement-management','add-advertisement','edit-advertisement','banner','add-banner','edit-banner','bottom','add-bottom','edit-bottom'];
        $this->catelog=['add-attributes','edit-attributes','attributes','attribute-group','edit-attribute-group','add-attribute-group','brand','brand-mapping','category','add-category','edit-category','products','add-products','edit-products'];
        $this->brandarr = ['brand'];
        $this->categoryarr = ['brand-mapping','category','add-category','edit-category'];
        $this->productarr = ['products','add-products','edit-products'];
        $this->attributearr = ['add-attributes','edit-attributes','attributes','attribute-group','edit-attribute-group','add-attribute-group'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.left-panel');
    }
}
