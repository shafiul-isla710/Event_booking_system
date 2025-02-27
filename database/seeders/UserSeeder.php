<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::create([
           'role'=>"admin",
           'name'=>'app admin',
           'email'=>'admin@gmail.com',
           'password'=>Hash::make('password'),
       ]);
       User::create([
           'role'=>" even_admin",
           'name'=>'event admin',
           'email'=>'event@gmail.com',
           'password'=>Hash::make('password'),
       ]);
       User::create([
           'role'=>"user ",
           'name'=>'sadik al hasan',
           'email'=>'sadik@gmail.com',
           'password'=>Hash::make('password'),
       ]);
       User::create([
           'role'=>"user ",
           'name'=>'Rafik ',
           'email'=>'rafik23@gmail.com',
           'password'=>Hash::make('password'),
       ]);
       User::create([
           'role'=>"user",
           'name'=>'Sofik',
           'email'=>'safik23@gmail.com',
           'password'=>Hash::make('password'),
       ]);
    }
}
