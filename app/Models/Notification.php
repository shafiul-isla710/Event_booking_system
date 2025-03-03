<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    
      public function User(){
        return $this->belongsTo(User::class);
      }
      protected $hidden = ['created_at','updated_at'];
}
