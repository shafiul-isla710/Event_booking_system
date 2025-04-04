<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['user_id','event_id','ticket_qty','ticket_price','total_price','status'];
    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Event(){
        return $this->belongsTo(Event::class);
    }
}
