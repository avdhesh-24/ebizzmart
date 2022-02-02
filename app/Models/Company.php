<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasOne(User::class,'company','id');
    }
    public function business(){
        return $this->hasOne(BusinessType::class,'id','business_type');
    }
    public function type(){
        return $this->hasOne(UserType::class,'id','iam');
    }
    public function countries(){
        return $this->hasOne(Country::class,'id','country');
    }
    public function cities(){
        return $this->hasOne(City::class,'id','city');
    }
    public function trademarketdistribution(){
        return $this->hasOne(MainMarketDistribution::class);
    }
    public function albums(){
        return $this->hasMany(CompanyImage::class);
    }
    public function banners(){
        return $this->hasMany(CompanyBannerImage::class);
    }
    public function certification(){
        return $this->hasMany(CompanyCertification::class);
    }
    public function productcertification(){
        return $this->hasMany(CompanyProductCertification::class);
    }
    public function factories(){
        return $this->hasMany(CompanyFactorie::class);
    }
    
}
