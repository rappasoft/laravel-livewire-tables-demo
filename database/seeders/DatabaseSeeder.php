<?php

namespace Database\Seeders;

use App\Models\AddressGroup;
use App\Models\City;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

         Tag::factory(10)->create();
         City::factory(20)->create();


         AddressGroup::factory(20)->create();

         User::factory(100)
             ->create()
             ->each(function($user) use($faker) {
                $user->tags()->save($id = Tag::inRandomOrder()->first());
                $user->tags()->save(Tag::where('id', '<>', $id)->inRandomOrder()->first());
                $user->address()->create([
                    'address_group_id' => AddressGroup::inRandomOrder()->first()->id,
                    'address' => $faker->address,
                ]);
             });
    }
}
