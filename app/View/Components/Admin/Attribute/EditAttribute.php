<?php

namespace App\View\Components\Admin\Attribute;

use Illuminate\View\Component;
use App\Models\AttributeGroup;
class EditAttribute extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lists;
    public $group;
    public function __construct($data)
    {
        $this->lists = $data;
        $this->group = AttributeGroup::find($data->attribute_group_id);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.attribute.edit-attribute');
    }
}
