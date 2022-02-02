<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AttributeGroup;
class Attribute extends Model
{
    use HasFactory;
    public function group(){
        return $this->belongsTo(AttributeGroup::class,'attribute_group_id','id');
    }

    public function products(){
        return $this->hasMany(ProductSize::class,'attribute_id','id');
    }
}
