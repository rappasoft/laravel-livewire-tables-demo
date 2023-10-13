<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

   /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CitySeeder::class,
            AddressGroupSeeder::class,
            AddressSeeder::class,
            TagSeeder::class,
            UserSeeder::class,
            NewsSeeder::class,
            ArticleSeeder::class,
            UserPhotoSeeder::class,
        ]);
    }
}
