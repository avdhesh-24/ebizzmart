<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CompMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $company;
    public function __construct($data){
        $this->company = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comp-menu');
    }
}
