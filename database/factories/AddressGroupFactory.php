<?php

namespace Database\Factories;

use App\Models\AddressGroup;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AddressGroup::class;

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
            'name' => $this->faker->name,
            'city_id' => City::inRandomOrder()->first()->id,
        ];
    }
}
