<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    protected $fillable = ['title','description','start_date','end_date','ticket_price'];
    public function Booking(){
        return $this->hasMany(Booking::class);
    }
    
    protected $hidden = ['created_at','updated_at'];
}
