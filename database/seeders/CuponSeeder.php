<?php

namespace Database\Seeders;

use App\Models\Cupon;
use Illuminate\Database\Seeder;

class CuponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cupons = [
            [    'code' => 'Taza',
                'status' => 'activa',
                'available' => 10,
                'min_quantity' => 10,
                'price' => 5,
                'product_id' => 1,
            ],
            [
                'code' => 'Magica',
                'status' => 'activa',
                'available' => 10,
                'min_quantity' => 10,
                'price' => 5,
                'product_id' => 2,
            ],
            [
                'code' => 'Pañal',
                'status' => 'activa',
                'available' => 10,
                'min_quantity' => 10,
                'price' => 5,
                'product_id' => 32,
            ],
        ];

        foreach($cupons as $cupon)
            Cupon::create($cupon);
    }
}
