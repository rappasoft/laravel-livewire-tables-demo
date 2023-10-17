<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UserPhotoSeeder extends Seeder
{

   
    /**
     * Set the path to the Avatar Storage, relative to Storage() root
     * 
     * Default is public/avatars
     * 
     *  @var string
     */
    private static string $avatarPath = 'public/avatars/';


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $usersWithoutPhotos = User::all();
        
        foreach ($usersWithoutPhotos as $userWithoutPhoto)
        {
            if (Storage::missing(self::$avatarPath.$userWithoutPhoto->id.'.jpg'))
            {
                Storage::put(self::$avatarPath.$userWithoutPhoto->id.'.jpg', Http::accept('image/jpeg')->get('https://i.pravatar.cc/100'), 'public');
            }
        }

    }
}
