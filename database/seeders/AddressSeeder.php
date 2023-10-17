<?php

namespace Database\Seeders;

use App\Models\Address;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{

    /**
     * Set how many Addresses you would like to generate
     * 
     * Default is 300
     * 
     *  @var int
     */
    private static int $addressCount = 320;


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Address::factory(self::$addressCount)->create();
    }
}
