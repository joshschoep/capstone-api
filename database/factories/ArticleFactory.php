<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $content = $this->faker->realText(3000);
        $short = Str::limit($content, 200, '...');
        $employees = Employee::all()->pluck('id')->toArray();
        return [
            'headline' => $this->faker->realText(128),
            'short' => $short,
            'content' => $content,
            'employee_id' => $this->faker->randomElement($employees)
        ];
    }
}
