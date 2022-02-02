<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Facility;
use App\Models\TopCategory;
use App\Models\RegionSupplier;
class FooterCatMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $facility;
    public $topcategory;
    public $supplierregion;
    public function __construct()
    {
       $this->facility = Facility::where('status',1)->get();
       $this->supplierregion = RegionSupplier::with('regioncountry')->where('status',1)->get();
       $this->topcategory = TopCategory::with('category','category.categorybrand','category.categorybrand.brand')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer-cat-menu');
    }
}
