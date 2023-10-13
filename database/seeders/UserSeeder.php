<?php

namespace Database\Seeders;

use App\Models\{Address,AddressGroup,Tag,User};
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Set how many Users you would like to generate 
     * 
     * Default is 103
     * 
     * @var int
     */
    private static int $userCount = 103;




    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->tags = Tag::all();

        $faker = Factory::create();

        $this->addresses = Address::select('id')->get();

        User::factory(self::$userCount)
            ->create()
            ->each(function ($user) use ($faker) {
                $assignedTagCount = rand(1,5);
                $user->tags()->sync($this->tags->random($assignedTagCount)->pluck('id')->toArray());
                $user->address()->save($this->addresses->random(1)->first());
            });

    }
}
