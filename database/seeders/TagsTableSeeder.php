<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            "Escursioni" => "#4CAF50",
            "Musei" => "#6A5ACD",
            "Cucina tradizionale" => "#FF4500",
            "Low cost" => "#808080",
            "Spiaggia" => "#FFD700",
            "Cultura" => "#A9A9A9",
            "Snorkeling" => "#1E90FF",
            "Sci" => "'#B0C4DE",
            "Natura" => "#2F4F4F",
            "Sole" => "#FFFACD",
            "Avventura" => "#FF6347",
            "Relax" => "#ADD8E6",
            "Vita Notturna" => "#4B0082",
            "Fotografia" => "#696969",
            "Storia" => "#8B4513 ",
            "Shopping" => "#FF1493",
            "Romantico" => "#FF69B4",
            "Famiglia" => "#FFDAB9",
            "Lusso" => "#DAA520"
        ];

        foreach ($tags as $tag => $color) {
            $newTag = new Tag();

            $newTag->name = $tag;
            $newTag->color = $color;

            $newTag->save();
        }
    }
}
