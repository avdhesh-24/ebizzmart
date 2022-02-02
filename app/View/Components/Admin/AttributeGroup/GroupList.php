<?php

namespace App\View\Components\Admin\AttributeGroup;

use Illuminate\View\Component;
use App\Models\AttributeGroup;
class GroupList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lists;
    public function __construct()
    {
        $this->lists = AttributeGroup::with('attributes')->latest()->paginate(10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.attribute-group.group-list');
    }
}
