<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            [
                'name' => 'Negro',
            ],
            [
                'name' => 'Amarillo',
            ],
            [
                'name' => 'Azul Cielo',
            ],
            [
                'name' => 'Rosa',
            ],
            [
                'name' => 'Verde',
            ],
            [
                'name' => 'Naranja',
            ],
            [
                'name' => 'Azul Marino',
            ],
            [
                'name' => 'Rojo',
            ],
            [
                'name' => 'Blanco',
            ],
            [
                'name' => 'Plata',
            ],
        ];

        foreach($colors as $color){
            Color::create($color);
        }
    }
}
