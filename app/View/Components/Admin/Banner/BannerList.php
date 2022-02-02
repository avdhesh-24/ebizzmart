<?php

namespace App\View\Components\Admin\Banner;

use Illuminate\View\Component;
use App\Models\Banner;

class BannerList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lists='';
    public function __construct()
    {
        $this->lists = Banner::orderBy('id','DESC')->get();
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.banner.banner-list');
    }
}
