<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class TravelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        // prendo tutti i tags
        $tags = Tag::all();

        for ($i = 0; $i < 10; $i++) {

            $newTravel = new Travel();

            $newTravel->category_id = rand(1, 7);
            $newTravel->title = $faker->words(3, true);
            $newTravel->description = $faker->paragraph();
            $newTravel->destination_country = $faker->country();
            $newTravel->destination_city = $faker->city();
            $newTravel->cover_image = "https://fastly.picsum.photos/id/74/4288/2848.jpg?hmac=q02MzzHG23nkhJYRXR-_RgKTr6fpfwRgcXgE0EKvNB8";
            $newTravel->departure_date = $faker->date();
            $newTravel->return_date = $faker->date();
            $newTravel->is_published = true;

            $newTravel->save();

            // scelgo casualmente da 2 a 4 tag estraendo una lista di ID
            $randomTags = $tags->random(rand(2, 4))->pluck('id');

            // associo i tag casuali al viaggio
            $newTravel->tags()->attach($randomTags);
        }
    }
}
