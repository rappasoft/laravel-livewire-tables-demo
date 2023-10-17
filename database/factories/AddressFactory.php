<?php

namespace Database\Factories;

use App\Models\{Address,AddressGroup};
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    private static array $addressTypeArray;

    /**
     * Define the model's default state.
     *
     * @return array
     *
     * @throws \Exception
     */
    public function definition()
    {
        // Here you may define the "Address Type" that is used in the table
        self::$addressTypeArray = ['home', 'work', 'other'];

        $this->allAddressGroups = AddressGroup::select('id')->get();

        return [
                'address_group_id' => $this->allAddressGroups->random()->id,
                'address' => $this->faker->address,
                'name' => $this->faker->realText(rand(10,20)),
            ];
    }
}
