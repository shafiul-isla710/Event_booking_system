<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'user_id'=> 3,
            'event_id'=>1,
            'ticket_qty'=>2,
            'ticket_price'=>200,
            'total_price'=>400,
            'status'=>'pending',
        ]);
       
    }
}
