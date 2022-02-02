<?php

namespace App\View\Components\Admin\Attribute;

use Illuminate\View\Component;
use App\Models\AttributeGroup;
class AddAttribute extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $list;
    public $group;
    public function __construct($data)
    {
        $this->list=$data;
        $this->group = $this->getGroup($data);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(){
        return view('components.admin.attribute.add-attribute');
    }
    public function getGroup($attribute){
        return AttributeGroup::find($attribute);
    }
}
