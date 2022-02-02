<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionSupplier extends Model
{
    use HasFactory;

    public function regioncountry(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
