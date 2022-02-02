<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use HasFactory;
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function brand(){
        return $this->hasOne(Brand::class,'id','brand_id');
    }
    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function attribute(){
        return $this->hasMany(ProductAattribute::class);
    }

    public function size(){
        return $this->hasMany(ProductSize::class);
    }

    public function defaultprice()
    { 
        return $this->hasOne(ProductSize::class)->orderBy('selling_price','ASC');
    } 

    public function rating(){
        return $this->belongsTo(ProductRating::class,'id','product_id')->orderby('rating','ASC');
    }
   
}
