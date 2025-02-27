<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    public function Booking(){
        return $this->hasMany(Booking::class);
    }
}
