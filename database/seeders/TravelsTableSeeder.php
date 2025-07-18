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

        $travels = [
            [
                'category_id' => 1,
                'title' => 'Lisbona e Sintra Experience',
                'description' => 'Scopri il fascino di Lisbona e i palazzi incantati di Sintra in un viaggio tra storia e panorami unici.',
                'destination_country' => 'Portogallo',
                'destination_city' => 'Lisbona',
                'cover_image' => 'travels/lisbona.jpg',
                'departure_date' => '2025-08-10',
                'return_date' => '2025-08-15',
                'is_published' => true,
            ],
            [
                'category_id' => 2,
                'title' => 'Safari in Kenya',
                'description' => 'Avventura indimenticabile nei parchi naturali del Kenya tra leoni, elefanti e tramonti spettacolari.',
                'destination_country' => 'Kenya',
                'destination_city' => 'Nairobi',
                'cover_image' => 'travels/kenya-safari.jpg',
                'departure_date' => '2025-09-05',
                'return_date' => '2025-09-12',
                'is_published' => true,
            ],
            [
                'category_id' => 3,
                'title' => 'Tour delle Capitali Nordiche',
                'description' => 'Un viaggio tra le capitali più affascinanti del Nord Europa: Copenaghen, Oslo e Stoccolma.',
                'destination_country' => 'Svezia, Norvegia, Danimarca',
                'destination_city' => 'Stoccolma',
                'cover_image' => 'travels/nordic-tour.jpg',
                'departure_date' => '2025-12-01',
                'return_date' => '2025-12-10',
                'is_published' => true,
            ],
            [
                'category_id' => 4,
                'title' => 'New York City Lights',
                'description' => 'Scopri la metropoli che non dorme mai: grattacieli, Central Park e la Statua della Libertà.',
                'destination_country' => 'USA',
                'destination_city' => 'New York',
                'cover_image' => 'travels/newyork.jpg',
                'departure_date' => '2025-11-20',
                'return_date' => '2025-11-28',
                'is_published' => true,
            ],
            [
                'category_id' => 5,
                'title' => 'Bali e le sue Meraviglie',
                'description' => 'Tra templi, risaie e spiagge paradisiache, Bali ti aspetta per un viaggio da sogno.',
                'destination_country' => 'Indonesia',
                'destination_city' => 'Denpasar',
                'cover_image' => 'travels/bali.jpg',
                'departure_date' => '2025-10-01',
                'return_date' => '2025-10-10',
                'is_published' => true,
            ],
            [
                'category_id' => 6,
                'title' => 'Tokyo tra Tradizione e Futuro',
                'description' => 'Esplora il cuore del Giappone tra tecnologia, templi e cultura millenaria.',
                'destination_country' => 'Giappone',
                'destination_city' => 'Tokyo',
                'cover_image' => 'travels/tokyo.jpg',
                'departure_date' => '2025-09-18',
                'return_date' => '2025-09-28',
                'is_published' => true,
            ],
            [
                'category_id' => 7,
                'title' => 'Weekend a Parigi',
                'description' => 'Passeggia lungo la Senna, ammira la Torre Eiffel e gusta una colazione parigina.',
                'destination_country' => 'Francia',
                'destination_city' => 'Parigi',
                'cover_image' => 'travels/parigi.jpg',
                'departure_date' => '2025-08-25',
                'return_date' => '2025-08-28',
                'is_published' => true,
            ],
            [
                'category_id' => 1,
                'title' => 'Avventura in Islanda',
                'description' => 'Geyser, cascate e aurore boreali: un viaggio unico tra i paesaggi più spettacolari.',
                'destination_country' => 'Islanda',
                'destination_city' => 'Reykjavík',
                'cover_image' => 'travels/islanda.jpg',
                'departure_date' => '2025-12-15',
                'return_date' => '2025-12-22',
                'is_published' => true,
            ],
            [
                'category_id' => 2,
                'title' => 'Tour dell’Italia del Sud',
                'description' => 'Dalla Costiera Amalfitana alla Sicilia, tra mare, storia e tradizione gastronomica.',
                'destination_country' => 'Italia',
                'destination_city' => 'Napoli',
                'cover_image' => 'travels/napoli.jpg',
                'departure_date' => '2025-09-15',
                'return_date' => '2025-09-25',
                'is_published' => true,
            ],
            [
                'category_id' => 3,
                'title' => 'Deserto del Sahara',
                'description' => 'Un’esperienza magica tra le dune infinite e le notti stellate del Sahara.',
                'destination_country' => 'Marocco',
                'destination_city' => 'Merzouga',
                'cover_image' => 'travels/sahara.jpg',
                'departure_date' => '2025-11-01',
                'return_date' => '2025-11-07',
                'is_published' => true,
            ],
            [
                'category_id' => 1,
                'title' => 'Incanto sui Canali di Amsterdam',
                'description' => 'Esplora i pittoreschi canali, i musei di fama mondiale e l\'atmosfera vibrante di Amsterdam.',
                'destination_country' => 'Paesi Bassi',
                'destination_city' => 'Amsterdam',
                'cover_image' => 'travels/amsterdam.jpg',
                'departure_date' => '2025-10-05',
                'return_date' => '2025-10-10',
                'is_published' => true,
            ],
            [
                'category_id' => 2,
                'title' => 'Tenerife: Isola dell\'Eterna Primavera',
                'description' => 'Dalle vette vulcaniche del Teide alle spiagge nere, un mix di natura, avventura e relax tutto l\'anno.',
                'destination_country' => 'Spagna',
                'destination_city' => 'Las Americas',
                'cover_image' => 'travels/tenerife.jpg',
                'departure_date' => '2025-11-10',
                'return_date' => '2025-11-17',
                'is_published' => true,
            ],
            [
                'category_id' => 1,
                'title' => 'Misteri e Fascino di Edimburgo',
                'description' => 'Scopri la capitale scozzese tra vicoli medievali, castelli imponenti e leggende antiche.',
                'destination_country' => 'Regno Unito',
                'destination_city' => 'Edimburgo',
                'cover_image' => 'travels/edimburgo.jpg',
                'departure_date' => '2025-09-01',
                'return_date' => '2025-09-06',
                'is_published' => true,
            ],
            [
                'category_id' => 3,
                'title' => 'Santorini: Sogno Egeo in Bianco e Blu',
                'description' => 'Un\'isola vulcanica con tramonti mozzafiato, villaggi iconici e un\'atmosfera romantica unica.',
                'destination_country' => 'Grecia',
                'destination_city' => 'Fira',
                'cover_image' => 'travels/santorini.jpg',
                'departure_date' => '2025-08-20',
                'return_date' => '2025-08-27',
                'is_published' => true,
            ],
            [
                'category_id' => 3,
                'title' => 'Salento: Mare, Barocco e Tradizioni',
                'description' => 'Esplora le spiagge cristalline, l\'architettura barocca e le antiche tradizioni culinarie del tacco d\'Italia.',
                'destination_country' => 'Italia',
                'destination_city' => 'Otranto',
                'cover_image' => 'travels/salento.jpg',
                'departure_date' => '2025-07-20',
                'return_date' => '2025-07-27',
                'is_published' => true,
            ],
            [
                'category_id' => 3,
                'title' => 'Penisola Calcidica: Paradiso Greco',
                'description' => 'Dalle acque smeraldo ai villaggi tradizionali, un viaggio tra bellezze naturali e autenticità greca.',
                'destination_country' => 'Grecia',
                'destination_city' => 'Kassandra',
                'cover_image' => 'travels/calcidica.jpeg',
                'departure_date' => '2025-08-01',
                'return_date' => '2025-08-08',
                'is_published' => true,
            ],
        ];

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
