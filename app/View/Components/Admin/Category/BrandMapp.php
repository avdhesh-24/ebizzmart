<?php

namespace App\View\Components\Admin\Category;

use Illuminate\View\Component;
use App\Models\CategoryBrand;
use App\Models\Category;
use App\Models\Brand;
class BrandMapp extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categorylist;
    public $brandlist;
    public $lists;
    public function __construct($list)
    {
        $this->categorylist = Category::find($list);
        $this->lists = CategoryBrand::with('brand')->where('category_id',$list)->paginate(8);
        $this->brandlist = Brand::where('status',1)->orderBy('name','ASC')->get();
       
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.category.brand-mapp');
    }
}
