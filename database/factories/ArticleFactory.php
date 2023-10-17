<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

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
     *
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(rand(10,20)),
            'country' => $this->faker->country,
            'user_id' => random_int(1, 50),
            'is_published' => random_int(0,1),
            'published_at' => $this->faker->dateTimeBetween('-3 months', '-2 days'),
            'published_by' => $this->faker->name(),
        ];
    }
}
