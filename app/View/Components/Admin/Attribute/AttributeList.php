<?php

namespace App\View\Components\Admin\Attribute;

use Illuminate\View\Component;
use App\Models\Attribute;
use App\Models\AttributeGroup;
use Request;
class AttributeList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lists;
    public $group;
    public function __construct()
    {
        $this->group = AttributeGroup::find(Request::segment(3));
        $this->lists = Attribute::where('attribute_group_id',Request::segment(3))->latest()->paginate(10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.attribute.list');
    }
}
