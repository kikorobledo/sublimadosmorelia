<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Builder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sizes = [
            [
                'name' => '11 oz',
            ],
            [
                'name' => '15 oz',
            ],
            [
                'name' => 'Chico',
            ],
            [
                'name' => 'Mediano',
            ],
            [
                'name' => 'Grande',
            ],
            [
                'name' => 'Extra grande',
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

        foreach($sizes as $size){
            Size::create($size);
        }

    }
}
