<?php

namespace App\View\Components\Admin\BannerBottom;

use Illuminate\View\Component;

class BottomAdd extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.banner-bottom.bottom-add');
    }
}
