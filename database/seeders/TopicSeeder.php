<?php

namespace Database\Seeders;

use App\Models\Topic;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Set how many Topics you would like to generate
     * 
     * Default is 15
     * 
     * @var int
     */
    private static int $topicCount = 15;


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Topic::factory(self::$topicCount)->create();

    }
}
