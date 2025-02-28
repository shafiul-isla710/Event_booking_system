<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
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
}
