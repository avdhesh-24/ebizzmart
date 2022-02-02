<?php

namespace App\View\Components\Admin\Product;

use Illuminate\View\Component;
use App\Models\Product;
class ProductList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lists;
    public function __construct()
    {
       $this->lists = Product::with('category','brand')->latest()->paginate(20);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.product.product-list');
    }
}
