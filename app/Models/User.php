<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable =['name','email','password','role','profile_image'];

    public function booking(){
        return $this->hasMany(Booking::class);
    }
    public function notification(){
        return $this->hasMany(Notification::class);
    }
}
