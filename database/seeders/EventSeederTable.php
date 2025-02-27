<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            "title"=>'event 1',
            "description"=>'event 1 description',
            "start_date"=>now()->addDays(7),
            "end_date"=>now()->addDays(7)->addHours(5),
        ]);
        Event::create([
            "title"=>'event 2',
            "description"=>'event 2 description',
            "start_date"=>now()->addDays(8),
            "end_date"=>now()->addDays(8)->addHours(5),
        ]);
        Event::create([
            "title"=>'event 3',
            "description"=>'event 3 description',
            "start_date"=>now()->addDays(9),
            "end_date"=>now()->addDays(9)->addHours(5),
        ]);
    }
}
