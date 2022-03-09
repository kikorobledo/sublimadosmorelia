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
                'name' => 'Chica',
            ],
            [
                'name' => 'Mediana',
            ],
            [
                'name' => 'Grande',
            ],
            [
                'name' => 'Extra grande',
            ]
        ];

        foreach($sizes as $size){
            Size::create($size);
        }

    }
}
