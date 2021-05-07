<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(ArticleSeeder::class);

        // $user = \App\Models\User::create([
        //     'email' => 'josh@asdf.com',
        //     'password' => Hash::make('asdfasdf'),
        //     'name' => 'josh'
        // ]);
    }
}
