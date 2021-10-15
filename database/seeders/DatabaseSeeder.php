<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Tag::factory(10)->create();

         User::factory(100)
             ->create()
             ->each(function($user) {
                $user->tags()->save($id = Tag::inRandomOrder()->first());
                $user->tags()->save(Tag::where('id', '<>', $id)->inRandomOrder()->first());
             });
    }
}
