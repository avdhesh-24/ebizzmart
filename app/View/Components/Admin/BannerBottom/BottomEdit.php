<?php

namespace App\View\Components\Admin\BannerBottom;

use Illuminate\View\Component;

class BottomEdit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $list='';
    public function __construct($data)
    {
        $this->list = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.banner-bottom.bottom-edit');
    }
}
