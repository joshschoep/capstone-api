<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersfile = fopen('database/seeders/users.csv', 'r');
        while(($data = fgetcsv($usersfile)) !== FALSE){
            \App\Models\User::create([
                "first_name" => $data[0],
                "last_name" => $data[1],
                "email" => $data[2],
                "password" => Hash::make("changeme123"),
                
                "title" => $data[3],
                "capacity" => "full_time",
                "role" => $data[4],
                "created_at" => count($data) > 5 ? $data[5] : 1619145543
            ]);
        }
    }
}
