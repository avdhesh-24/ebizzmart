<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function child(){
        return $this->hasMany(Category::class,'parent','id');
    }
    public function categorybrand(){
        return $this->hasMany(CategoryBrand::class);
    }
    public function catattribute(){
        return $this->hasMany(CategoryAttribute::class);
    }
}
