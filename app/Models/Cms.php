<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;
    protected $guard = "cms";
    protected $fillable = [
        'title','heading','image','image_alt','img','img_alt','banner','text_1','meta_title','meta_keywords','meta_description'
    ];
}
