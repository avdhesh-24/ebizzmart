<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AccountLeft extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $companiesArr;
    public $productArr;
    public function __construct(){
        $this->productArr = ['manage-product'];
        $this->companiesArr = ['company-introduction','certifications-and-trademarks','trade-capacity','company-information','partner-factories'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.account-left');
    }
}
