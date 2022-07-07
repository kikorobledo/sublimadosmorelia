<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\CategoryDesign;
use Illuminate\Database\Seeder;

class CategoryDesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryDesign::Create([
            'name' => 'Días festivos',
            'slug' => Str::slug('Días festivos')
        ]);

        CategoryDesign::Create([
            'name' => 'Deportes',
            'slug' => Str::slug('Deportes')
        ]);

        CategoryDesign::Create([
            'name' => 'Peliculas',
            'slug' => Str::slug('Peliculas')
        ]);

        CategoryDesign::Create([
            'name' => 'Series',
            'slug' => Str::slug('Series')
        ]);

        CategoryDesign::Create([
            'name' => 'Caricaturas',
            'slug' => Str::slug('Caricaturas')
        ]);
    }
}
