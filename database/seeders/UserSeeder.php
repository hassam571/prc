<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'JohnDoe', // Replace with form input or desired value
            'email'    => 'u@u', // Replace with form input
            'password' => bcrypt('a'), // Always hash the password!
            'role' => ('user'), // Always hash the password!
        ]);
        User::create([
            'username' => 'JohnDoe', // Replace with form input or desired value
            'email'    => 'a@a', // Replace with form input
            'password' => bcrypt('a'), // Always hash the password!
            'role' => ('admin'), // Always hash the password!
        ]);
    }
}