<?php

namespace Database\Seeders;

use App\Models\AddressGroup;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AddressGroupSeeder extends Seeder
{

    /**
     * Set how many Address Groups you would like to generate
     * 
     * Default is 14
     * 
     *  @var int
     */
    private static int $addressGroupCount = 14;


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       AddressGroup::factory(self::$addressGroupCount)->create();
    }
}
