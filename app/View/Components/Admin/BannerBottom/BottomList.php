<?php

namespace App\View\Components\Admin\BannerBottom;

use Illuminate\View\Component;
use App\Models\Bottom;
class BottomList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lists='';
    public function __construct()
    {
        $this->lists = Bottom::orderBy('id','DESC')->get();
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.banner-bottom.bottom-list');
    }
}
