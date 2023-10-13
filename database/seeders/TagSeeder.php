<?php

namespace Database\Seeders;

use App\Models\Tag;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{

    /**
     * Set how many Tags you would like to generate
     * 
     * Default is 22
     * 
     * @var int
     */
    private static int $tagCount = 22;



    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $allTags = Tag::factory(self::$tagCount)->create();

    }
}
