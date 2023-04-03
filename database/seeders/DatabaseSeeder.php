<?php

namespace Database\Seeders;

use App\Models\AddressGroup;
use App\Models\City;
use App\Models\Tag;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
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
     * Set how many Tags you would like to generate
     * 
     * Default is 22
     * 
     * @var int
     */
    private static int $tagCount = 22;

    /**
     * Set how many Cities you would like to generate 
     * 
     * Default is 28
     * 
     * @var int
     */
    private static int $cityCount = 28;

    /**
     * Set how many Address Groups you would like to generate
     * 
     * Default is 14
     * 
     *  @var int
     */
    private static int $addressGroupCount = 14;

    /**
     * Set the path to the Avatar Storage, relative to Storage() root
     * 
     * Default is public/avatars
     * 
     *  @var string
     */
    private static string $avatarPath = 'public/avatars/';

    // Instantiate
    private static $allAddressGroups;
    private static $allTags;
    private static array $addressTypeArray;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Here you may define the "Address Type" that is used in the table
        self::$addressTypeArray = ['home', 'work', 'other'];
        
        // You should not need to  modify anything below this point!
        $faker = Factory::create();
        self::$allTags = Tag::factory(self::$tagCount)->create();
        City::factory(self::$cityCount)->create();
        self::$allAddressGroups = AddressGroup::factory(self::$addressGroupCount)->create();
        
        User::factory(self::$userCount)
            ->create()
            ->each(function ($user) use ($faker) {
                $assignedTagCount = rand(1,5);
                $user->tags()->sync(self::$allTags->random($assignedTagCount)->pluck('id')->toArray());
                $user->address()->create([
                    'address_group_id' => self::$allAddressGroups->random()->id,
                    'address' => $faker->address,
                    'name' => $faker->randomElement(self::$addressTypeArray),
                ]);
                if (Storage::missing(self::$avatarPath.$user->id.'.jpg'))
                {
                    Storage::put(self::$avatarPath.$user->id.'.jpg', Http::accept('image/jpeg')->get('https://i.pravatar.cc/100'), 'public');
                }
                

            });
    }
}
