<?php

namespace Database\Seeders;

use App\Models\News;
use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{

    private static int $newsCount = 50;


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        News::factory(self::$newsCount)->create();
    }
}
