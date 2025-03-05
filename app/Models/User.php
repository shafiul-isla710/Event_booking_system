<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable ,HasFactory;
    protected $fillable =['name','email','password','role','profile_image'];
    protected $attribute = [
        'profile_image' => null
    ];

    public function Booking(){
        return $this->hasMany(Booking::class);
    }
    public function Notification(){
        return $this->hasMany(Notification::class);
    }
    protected $hidden = ['created_at','updated_at'];
}
