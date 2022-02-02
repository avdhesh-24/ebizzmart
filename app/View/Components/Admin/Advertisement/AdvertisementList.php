<?php

namespace App\View\Components\Admin\Advertisement;

use Illuminate\View\Component;
use App\Models\Advertisement;
class AdvertisementList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lists='';
    public function __construct()
    {
        $this->lists = Advertisement::latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.advertisement.advertisement-list');
    }
}
