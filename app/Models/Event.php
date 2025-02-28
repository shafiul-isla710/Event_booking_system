<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    protected $fillable = ['title','description','start_date','end_date'];
    public function Booking(){
        return $this->hasMany(Booking::class);
    }
}
