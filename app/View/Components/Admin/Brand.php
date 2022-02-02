<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use App\Models\Brand as OurBrand;
class Brand extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lists;
    public function __construct()
    {
        $this->lists = OurBrand::latest()->paginate(10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.brand');
    }
}
