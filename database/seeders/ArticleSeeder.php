<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // You should not need to  modify anything below this point!
        Article::factory(1000)->create();

    }
}
