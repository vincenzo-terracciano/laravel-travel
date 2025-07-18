<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Avventura" => "fa-solid fa-hiking",
            "Città d'arte" => "fa-solid fa-landmark",
            "Città Iconiche" => "fa-solid fa-city",
            "Mare" => "fa-solid fa-umbrella-beach",
            "Montagna" => "fa-solid fa-mountain",
            "Cultura & Tradizioni" => "fa-solid fa-torii-gate",
            "Viaggi di Coppia" => "fa-solid fa-heart",
            "Viaggi di Gruppo" => "fa-solid fa-people-group"
        ];

        foreach ($categories as $category => $icon) {
            $newCategory = new Category();

            $newCategory->name = $category;
            $newCategory->icon = $icon;

            $newCategory->save();
        }
    }
}
