<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    protected array $publishers = ['Publisher 1', 'Publisher 2', 'Publisher 3'];

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
            'name' => $this->faker->realText(rand(10, 20)),
            'description' => $this->faker->text(),
            'user_id' => random_int(1, 50),
            'custom_data' => json_encode([
                'publisher' => $this->publishers[rand(0, 2)],
                'views' => intval(rand(10, 500)),
            ]),
        ];
    }
}
