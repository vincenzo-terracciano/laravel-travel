<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // prendo tutti i viaggi
        $travels = Travel::all();

        foreach ($travels as $travel) {

            // genero da 3 a 20 foto per ogni viaggio
            $photoCount = rand(3, 20);

            for ($i = 0; $i < $photoCount; $i++) {

                $newPhoto = new Photo();

                $newPhoto->travel_id = $travel->id;
                $newPhoto->image = "https://picsum.photos/seed/" . uniqid() . "/800/600";
                $newPhoto->caption = $faker->sentence();

                $newPhoto->save();
            }
        }
    }
}
