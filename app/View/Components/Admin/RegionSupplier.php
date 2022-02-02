<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use App\Models\Country;
use App\Models\RegionSupplier as Region;
class RegionSupplier extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lists;
    public $regions;
    public function __construct()
    {
       $this->lists = Country::orderBy('name','ASC')->get();
       $this->regions = Region::with('regioncountry')->latest()->paginate(10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.region-supplier');
    }
}
