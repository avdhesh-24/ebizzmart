<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Banner extends Model
{
    use HasFactory;
    use Notifiable;
    protected $guard = "banner";
    protected $fillable = [
        'type','image', 'image_alt','description',
    ];
    
}
