<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\CategoryProduct;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $ceramicas = [
            [
                'name' => 'Taza blanca',
                'slug' => Str::slug('Taza blanca'),
                'description' => $faker->text(),
                'price' => 50,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Taza con interior y asa de color',
                'slug' => Str::slug('Taza con interior y asa de color'),
                'description' => $faker->text(),
                'price' => 75,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Tequileros de cerámica',
                'slug' => Str::slug('Tequileros de cerámica'),
                'description' => $faker->text(),
                'price' => 60,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Taza blanca con asa de corazón',
                'slug' => Str::slug('Taza blanca con asa de corazón'),
                'description' => $faker->text(),
                'price' => 75,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Cenicero',
                'slug' => Str::slug('Cenicero'),
                'description' => $faker->text(),
                'price' => 120,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Alcancía',
                'slug' => Str::slug('Alcancía'),
                'description' => $faker->text(),
                'price' => 140,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Taza 11 oz con ventana',
                'slug' => Str::slug('Taza 11 oz con ventana'),
                'description' => $faker->text(),
                'price' => 120,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Taza mágica',
                'slug' => Str::slug('Taza mágica'),
                'description' => $faker->text(),
                'price' => 80,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Taza mágica con interior de color',
                'slug' => Str::slug('Taza mágica con interior de color'),
                'description' => $faker->text(),
                'price' => 120,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Taza mágica glitter',
                'slug' => Str::slug('Taza mágica glitter'),
                'description' => $faker->text(),
                'price' => 130,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Taza mágica asa de corazón',
                'slug' => Str::slug('Taza mágica asa de corazón'),
                'description' => $faker->text(),
                'price' => 120,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
        ];

        $ceramica = CategoryProduct::where('name', 'Cerámica')->first();

        foreach($ceramicas as $producto){
            $producto['category_product_id'] = $ceramica->id;
            Product::create($producto);
        }

        $aluminios = [
            [
                'name' => 'Lata de aluminio 350ml',
                'slug' => Str::slug('Lata de aluminio 350ml'),
                'description' => $faker->text(),
                'price' => 120,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Botella deportiva de 750ml',
                'slug' => Str::slug('Botella deportiva de 750ml'),
                'description' => $faker->text(),
                'price' => 150,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Botella deportiva de 600ml',
                'slug' => Str::slug('Botella deportiva de 600ml'),
                'description' => $faker->text(),
                'price' => 120,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Botellas con tapa de rosca 750ml',
                'slug' => Str::slug('Botellas con tapa de rosca 750ml'),
                'description' => $faker->text(),
                'price' => 200,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Botella con boton presionable 750ml',
                'slug' => Str::slug('Botella con boton presionable 750ml'),
                'description' => $faker->text(),
                'price' => 200,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Botella blanca con popote 650ml',
                'slug' => Str::slug('Botella blanca con popote 650ml'),
                'description' => $faker->text(),
                'price' => 160,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Botella deportiva para niños',
                'slug' => Str::slug('Botella deportiva para niños'),
                'description' => $faker->text(),
                'price' => 240,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Taza de peltre 10oz',
                'slug' => Str::slug('Taza de peltre 10oz'),
                'description' => $faker->text(),
                'price' => 130,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Taza de peltre mágica 10oz',
                'slug' => Str::slug('Taza de peltre mágica 10oz'),
                'description' => $faker->text(),
                'price' => 150,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
        ];

        $aluminio = CategoryProduct::where('name', 'Aluminios')->first();

        foreach($aluminios as $producto){
            $producto['category_product_id'] = $aluminio->id;
            Product::create($producto);
        }

        $aceros = [
            [
                'name' => 'Lata de acero con popote 500ml',
                'slug' => Str::slug('Lata de acero con popote 500ml'),
                'description' => $faker->text(),
                'price' => 250,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Botella de acero 500ml',
                'slug' => Str::slug('Botella de acero 500ml'),
                'description' => $faker->text(),
                'price' => 240,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Jarra de acero 16 oz',
                'slug' => Str::slug('Jarra de acero 16 oz'),
                'description' => $faker->text(),
                'price' => 250,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Botella lechera 500ml',
                'slug' => Str::slug('Botella lechera 500ml'),
                'description' => $faker->text(),
                'price' => 275,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Vaso de acero 450ml',
                'slug' => Str::slug('Vaso de acero 450ml'),
                'description' => $faker->text(),
                'price' => 250,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Vaso viajero 20oz',
                'slug' => Str::slug('Vaso viajero 20oz'),
                'description' => $faker->text(),
                'price' => 300,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ]
        ];

        $acero = CategoryProduct::where('name', 'Aceros')->first();

        foreach($aceros as $producto){
            $producto['category_product_id'] = $acero->id;
            Product::create($producto);
        }

        $vidrios = [
            [
                'name' => 'Tequilero de vidrio',
                'slug' => Str::slug('Tequilero de vidrio'),
                'description' => $faker->text(),
                'price' => 60,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Taza de vidrio glaseado 11oz',
                'slug' => Str::slug('Taza de vidrio glaseado 11oz'),
                'description' => $faker->text(),
                'price' => 80,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Tarro de vidrio 16oz',
                'slug' => Str::slug('Tarro de vidrio 16oz'),
                'description' => $faker->text(),
                'price' => 150,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Tarro de vidrio satinado de color 16oz',
                'slug' => Str::slug('Tarro de vidrio satinado de color 16oz'),
                'description' => $faker->text(),
                'price' => 180,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Taza de vidrio satinado de color 11oz',
                'slug' => Str::slug('Taza de vidrio satinatrue color 11oz'),
                'description' => $faker->text(),
                'price' => 80,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
        ];

        $vidrio = CategoryProduct::where('name', 'Vidrios')->first();

        foreach($vidrios as $producto){
            $producto['category_product_id'] = $vidrio->id;
            Product::create($producto);
        }

        $textiles = [
            [
                'name' => 'Pañalero',
                'slug' => Str::slug('Pañalero'),
                'description' => $faker->text(),
                'price' => 120,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Playera infantil',
                'slug' => Str::slug('Playera infantil'),
                'description' => $faker->text(),
                'price' => 120,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Playera adulto',
                'slug' => Str::slug('Playera adulto'),
                'description' => $faker->text(),
                'price' => 140,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Cojin',
                'slug' => Str::slug('Cojin'),
                'description' => $faker->text(),
                'price' => 120,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Cubrebocas',
                'slug' => Str::slug('Cubrebocas'),
                'description' => $faker->text(),
                'price' => 45,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
        ];

        $textil = CategoryProduct::where('name', 'Textiles')->first();

        foreach($textiles as $producto){
            $producto['category_product_id'] = $textil->id;
            Product::create($producto);
        }

        $impresiones = [
            [
                'name' => 'Lona',
                'slug' => Str::slug('Lona'),
                'description' => $faker->text(),
                'price' => 65,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Volantes',
                'slug' => Str::slug('PVolantes'),
                'description' => $faker->text(),
                'price' => 650,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Tarjetas de presentación',
                'slug' => Str::slug('Tarjetas de presentación'),
                'description' => $faker->text(),
                'price' => 400,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
        ];

        $impresion = CategoryProduct::where('name', 'Impresiones')->first();

        foreach($impresiones as $producto){
            $producto['category_product_id'] = $impresion->id;
            Product::create($producto);
        }

        $otros = [
            [
                'name' => 'Gorra',
                'slug' => Str::slug('Gorra'),
                'description' => $faker->text(),
                'price' => 90,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Llaveros',
                'slug' => Str::slug('PLlaveros'),
                'description' => $faker->text(),
                'price' => 40,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Rompecabezas',
                'slug' => Str::slug('Rompecabezas'),
                'description' => $faker->text(),
                'price' => 200,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Portaretrato',
                'slug' => Str::slug('Portaretrato'),
                'description' => $faker->text(),
                'price' => 130,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Portavasos',
                'slug' => Str::slug('Portavasos'),
                'description' => $faker->text(),
                'price' => 30,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
            [
                'name' => 'Mouse Pad',
                'slug' => Str::slug('Mouse Pad'),
                'description' => $faker->text(),
                'price' => 70,
                'purchase_price' => random_int(10,250),
                'status' => 2,

            ],
        ];

        $otro = CategoryProduct::where('name', 'Otros')->first();

        foreach($otros as $producto){
            $producto['category_product_id'] = $otro->id;
            Product::create($producto);
        }
    }
}
