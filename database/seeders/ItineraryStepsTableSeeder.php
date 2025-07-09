<?php

namespace Database\Seeders;

use App\Models\ItineraryStep;
use App\Models\Place;
use App\Models\Travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class ItineraryStepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // prendo tutti i viaaggi
        $travels = Travel::all();

        foreach ($travels as $travel) {

            // recupero i luoghi del viaggio corrente
            $places = Place::where('travel_id', $travel->id)->get();

            // creo da 3 a 7 tappe randomiche per ogni viaggio
            $stepsCount = rand(3, 7);

            for ($i = 0; $i < $stepsCount; $i++) {

                $newStep = new ItineraryStep();

                $newStep->travel_id = $travel->id;
                $newStep->title = $faker->sentence(3);
                $newStep->description = $faker->paragraph(3);
                $newStep->day_number = $i + 1;

                $newStep->estimated_time = $faker->time('H:i');
                $newStep->activity_type = $faker->randomElement([
                    '⭐ Da non perdere',
                    '🍴 Pausa cibo',
                    '☕ Colazione',
                    '🏛️ Visita culturale',
                    '🌳 Relax',
                    '🛍️ Shopping',
                    '📸 Punto panoramico',
                    '🎭 Evento o spettacolo',
                    '🚶 Passeggiata',
                    '🏖️ Spiaggia',
                    '🧗 Attività',
                    '🍷 Degustazione',
                    '🕌 Visita religiosa',
                ]);

                if ($places->isNotEmpty()) {
                    $newStep->place_id = $places->random()->id;
                }

                $newStep->save();
            }
        }
    }
}
