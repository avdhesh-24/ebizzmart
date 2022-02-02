<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\TopCategory as OurTopCategory;
class TopCategory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categorylists;
    public $lists;
    public function __construct()
    {
       $this->categorylists = Category::where('status',1)->orderBy('name','ASC')->get();
       $this->lists = OurTopCategory::with('category')->latest()->paginate(8);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.top-category');
    }
}
