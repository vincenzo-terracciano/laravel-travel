<?php

namespace Database\Seeders;

use App\Models\PackingItem;
use App\Models\Travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class PackingItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // prendo tutti i viaggi
        $travels = Travel::all();

        foreach ($travels as $travel) {

            // creo da 5 a 10 oggetti da mettere in valigia per ogni viaggio
            $itemsCount = rand(5, 10);

            for ($i = 0; $i < $itemsCount; $i++) {
                $newItem = new PackingItem();

                $newItem->travel_id = $travel->id;
                $newItem->item_name = $faker->word();
                $newItem->is_mandatory = $faker->boolean(60);

                $newItem->save();
            }
        }
    }
}
