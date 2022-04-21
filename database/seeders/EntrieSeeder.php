<?php

namespace Database\Seeders;

use App\Models\Entrie;
use App\Models\Product;
use Illuminate\Database\Seeder;

class EntrieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i <= 100 ; $i++) {

            $entrie = Entrie::factory(1)->create()->first();

            /* $entrie->products()->attach(rand(1,100), [
                                            'price' => rand(25,250),
                                            'quantity' => rand(1,50)
                                        ]); */
        }
    }
}
