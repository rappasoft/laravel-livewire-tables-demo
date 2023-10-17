<?php

namespace Database\Seeders;

use App\Models\{News,Topic};
use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsTopicSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $allTopics = Topic::select('id')->get();

        foreach (News::get() as $newsArticle)
        {
            $newsArticle->topics()->sync($allTopics->random(rand(1,3))->pluck('id')->toArray());
        }
        
    }
}


