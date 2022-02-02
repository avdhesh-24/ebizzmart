<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAttribute extends Model
{
    use HasFactory;
    public function attribute_group()
    {
        return $this->hasOne(AttributeGroup::class,'id','attribute_group_id');
    }
}
 