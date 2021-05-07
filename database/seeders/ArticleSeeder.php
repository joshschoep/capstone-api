<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Article::factory(30)->create();

        $extraArticles = fopen('database/seeders/extra_articles.csv', 'r');
        while(($data = fgetcsv($extraArticles)) !== FALSE){
            \App\Models\Article::create([
                'headline' => $data[0],
                'short' => $data[1],
                'content' => $data[1],
                'user_id' => User::all()->first()->id,
                'section_id' => Section::all()->first()->id,
                'thumbnail_url' => $data[3],
                'thumbnail_inline_location' => $data[4]
            ]);
        }
    }
}
