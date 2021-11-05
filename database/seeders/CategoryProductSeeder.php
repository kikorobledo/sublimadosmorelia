<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Cerámica',
                'slug' => Str::slug('Cerámica'),
            ],
            [
                'name' => 'Aluminios',
                'slug' => Str::slug('Aluminios'),
            ],
            [
                'name' => 'Aceros',
                'slug' => Str::slug('Aceros'),
            ],
            [
                'name' => 'Vidrios',
                'slug' => Str::slug('Vidrio'),
            ],
            [
                'name' => 'Textiles',
                'slug' => Str::slug('Textiles'),
            ],
            [
                'name' => 'Impresiones',
                'slug' => Str::slug('Impresiones'),
            ],
            [
                'name' => 'Otros',
                'slug' => Str::slug('Otros'),
            ],
        ];

        foreach($categories as $category){
            CategoryProduct::create($category);
        }

    }
}
