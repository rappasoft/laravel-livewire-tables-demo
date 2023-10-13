<?php

namespace Database\Seeders;

use App\Models\City;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{

    private static int $cityCount = 50;


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        City::factory(self::$cityCount)->create();

    }
}
