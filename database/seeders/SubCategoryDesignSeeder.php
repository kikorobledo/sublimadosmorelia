<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\SubCategoryDesign;

class SubCategoryDesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategoryDesign::Create([
            'name' => 'Cumpleaños',
            'slug' => Str::slug('Cumpleaños'),
            'category_design_id' => 1
        ]);

        SubCategoryDesign::Create([
            'name' => 'Bautizo',
            'slug' => Str::slug('Bautizo'),
            'category_design_id' => 1
        ]);

        SubCategoryDesign::Create([
            'name' => 'Funebres',
            'slug' => Str::slug('Funebres'),
            'category_design_id' => 1
        ]);

        SubCategoryDesign::Create([
            'name' => 'Primera Comunión',
            'slug' => Str::slug('Primera Comunión'),
            'category_design_id' => 1
        ]);

        SubCategoryDesign::Create([
            'name' => 'Anime',
            'slug' => Str::slug('Anime'),
            'category_design_id' => 5
        ]);

        SubCategoryDesign::Create([
            'name' => 'Soccer',
            'slug' => Str::slug('Soccer'),
            'category_design_id' => 2
        ]);

        SubCategoryDesign::Create([
            'name' => 'Día de la madre',
            'slug' => Str::slug('Día de la madre'),
            'category_design_id' => 1
        ]);

        SubCategoryDesign::Create([
            'name' => 'Día del padre',
            'slug' => Str::slug('Día del padre'),
            'category_design_id' => 1
        ]);

    }
}
