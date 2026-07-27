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
        // Reset the factory order counter
        \App\Models\User::resetOrder();

        $this->tags = Tag::all();

        $faker = Factory::create();

        $this->addresses = Address::select('id')->get();

        $users = User::factory(self::$userCount)
            ->create()
            ->each(function ($user) use ($faker) {
                $assignedTagCount = rand(1,5);
                $user->tags()->sync($this->tags->random($assignedTagCount)->pluck('id')->toArray());
                $user->address()->save($this->addresses->random(1)->first());
            });

        // Assign parent_id to some users after all users are created
        $allUserIds = $users->pluck('id')->toArray();
        $users->skip(3)->each(function ($user) use ($allUserIds) {
            if (rand(0, 1)) { // 50% chance of having a parent
                $possibleParents = array_filter($allUserIds, fn($id) => $id < $user->id);
                if (!empty($possibleParents)) {
                    $user->parent_id = $possibleParents[array_rand($possibleParents)];
                    $user->save();
                }
            }
        });

        foreach (User::whereNull('parent_id')->get() as $topLevelUser)
        {
            $topLevelUser->has_parent = false;
            $topLevelUser->save();
        }
    }
}
