<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    protected $sections = [
        'Sub Item One',
        'Sub Item Two',
        'Sub Item Three',
        'Sub Item Four has more characters'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->sections as $section){
            Section::create(["title" => $section]);
        }
    }
}
