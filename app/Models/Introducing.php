<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Introducing extends Model
{
    use HasFactory;
    use Notifiable;
    protected $guard = "introducings";
    protected $fillable = [
        'title','description','image'
    ];
}
