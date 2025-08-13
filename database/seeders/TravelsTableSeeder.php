<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TravelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // prendo tutti i tags
        $tags = Tag::all();

        $travels = config("travels");

        foreach ($travels as $travelData) {

            $newTravel = new Travel();

            $newTravel->category_id = $travelData["category_id"];
            $newTravel->title = $travelData["title"];
            $newTravel->description = $travelData["description"];
            $newTravel->destination_country = $travelData["destination_country"];
            $newTravel->destination_city = $travelData["destination_city"];
            $newTravel->cover_image = $travelData["cover_image"];
            $newTravel->departure_date = $travelData["departure_date"];
            $newTravel->return_date = $travelData["return_date"];
            $newTravel->is_published = $travelData["is_published"];

            $newTravel->save();

            // scelgo casualmente da 2 a 4 tag estraendo una lista di ID
            $randomTags = $tags->random(rand(2, 4))->pluck('id');

            // associo i tag casuali al viaggio
            $newTravel->tags()->attach($randomTags);
        }
    }
}
