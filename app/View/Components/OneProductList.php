<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OneProductList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lists;
    public function __construct($data)
    {
        $this->lists = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.one-product-list');
    }
}
