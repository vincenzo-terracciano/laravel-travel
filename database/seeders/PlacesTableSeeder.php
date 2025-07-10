<?php

namespace Database\Seeders;

use App\Models\Place;
use App\Models\Travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // prendo tutti i viaggi
        $travels = Travel::all();

        // tipologie di luoghi da visitare
        $types = config('place_types');

        foreach ($travels as $travel) {

            // creo da 3 a 12 luoghi da visitare per ogni viaggio
            $placesCount = rand(3, 12);

            for ($i = 0; $i < $placesCount; $i++) {

                $newPlace = new Place();

                $newPlace->travel_id = $travel->id;
                $newPlace->name = $faker->words(3, true);
                $newPlace->type = $faker->randomElement($types);
                $newPlace->description = $faker->paragraph();
                $newPlace->latitude = $faker->latitude();
                $newPlace->longitude = $faker->longitude();

                $newPlace->save();
            }
        }
    }
}
