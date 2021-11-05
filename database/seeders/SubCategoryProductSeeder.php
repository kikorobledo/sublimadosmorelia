<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use App\Models\SubCategoryProduct;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SubCategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ceramicas = [
            [
                'name' => 'Taza blanca',
                'slug' => Str::slug('Taza blanca'),
                'color' => false,
                'size' => true
            ],
            [
                'name' => 'Taza con interior y asa de color',
                'slug' => Str::slug('Taza con interior y asa de color'),
                'color' => true,
                'size' => true
            ],
            [
                'name' => 'Tequileros de cerámica',
                'slug' => Str::slug('Tequileros de cerámica'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Taza blanca con asa de corazón',
                'slug' => Str::slug('Taza blanca con asa de corazón'),
                'color' => false,
                'size' => false
            ],
            [
                'name' => 'Cenicero',
                'slug' => Str::slug('Cenicero'),
                'color' => false,
                'size' => false
            ],
            [
                'name' => 'Alcancía',
                'slug' => Str::slug('Alcancía'),
                'color' => false,
                'size' => false
            ],
            [
                'name' => 'Taza 11 oz con ventana',
                'slug' => Str::slug('Taza 11 oz con ventana'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Taza mágica',
                'slug' => Str::slug('Taza mágica'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Taza mágica con interior de color',
                'slug' => Str::slug('Taza mágica con interior de color'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Taza mágica glitter',
                'slug' => Str::slug('Taza mágica glitter'),
                'color' => false,
                'size' => false
            ],
            [
                'name' => 'Taza mágica asa de corazón',
                'slug' => Str::slug('Taza mágica asa de corazón'),
                'color' => false,
                'size' => false
            ],
        ];

        $ceramica = CategoryProduct::where('name', 'Cerámica')->first();

        foreach($ceramicas as $producto){
            $producto['category_product_id'] = $ceramica->id;
            SubCategoryProduct::create($producto);
        }

        $aluminios = [
            [
                'name' => 'Lata de aluminio 350ml',
                'slug' => Str::slug('Lata de aluminio 350ml'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Botella deportiva de 750ml',
                'slug' => Str::slug('Botella deportiva de 750ml'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Botella deportiva de 600ml',
                'slug' => Str::slug('Botella deportiva de 600ml'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Botellas con tapa de rosca 750ml',
                'slug' => Str::slug('Botellas con tapa de rosca 750ml'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Botella con boton presionable 750ml',
                'slug' => Str::slug('Botella con boton presionable 750ml'),
                'color' => false,
                'size' => false
            ],
            [
                'name' => 'Botella blanca con popote 650ml',
                'slug' => Str::slug('Botella blanca con popote 650ml'),
                'color' => false,
                'size' => false
            ],
            [
                'name' => 'Botella deportiva para niños',
                'slug' => Str::slug('Botella deportiva para niños'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Taza de peltre 10oz',
                'slug' => Str::slug('Taza de peltre 10oz'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Taza de peltre mágica 10oz',
                'slug' => Str::slug('Taza de peltre mágica 10oz'),
                'color' => true,
                'size' => false
            ],
        ];

        $aluminio = CategoryProduct::where('name', 'Aluminios')->first();

        foreach($aluminios as $producto){
            $producto['category_product_id'] = $aluminio->id;
            SubCategoryProduct::create($producto);
        }

        $aceros = [
            [
                'name' => 'Lata de acero con popote 500ml',
                'slug' => Str::slug('Lata de acero con popote 500ml'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Botella de acero 500ml',
                'slug' => Str::slug('Botella de acero 500ml'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Jarra de acero 16 oz',
                'slug' => Str::slug('Jarra de acero 16 oz'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Botella lechera 500ml',
                'slug' => Str::slug('Botella lechera 500ml'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Vaso de acero 450ml',
                'slug' => Str::slug('Vaso de acero 450ml'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Vaso viajero 20oz',
                'slug' => Str::slug('Vaso viajero 20oz'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Botella deportiva para niños',
                'slug' => Str::slug('Botella deportiva para niños'),
                'color' => true,
                'size' => false
            ],
        ];

        $acero = CategoryProduct::where('name', 'Aceros')->first();

        foreach($aceros as $producto){
            $producto['category_product_id'] = $acero->id;
            SubCategoryProduct::create($producto);
        }

        $vidrios = [
            [
                'name' => 'Tequilero de vidrio',
                'slug' => Str::slug('Tequilero de vidrio'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Taza de vidrio glaseado 11oz',
                'slug' => Str::slug('Taza de vidrio glaseado 11oz'),
                'color' => false,
                'size' => false
            ],
            [
                'name' => 'Tarro de vidrio 16oz',
                'slug' => Str::slug('Tarro de vidrio 16oz'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Tarro de vidrio satinado de color 16oz',
                'slug' => Str::slug('Tarro de vidrio satinado de color 16oz'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Taza de vidrio satinado de color 11oz',
                'slug' => Str::slug('Taza de vidrio satinatrue color 11oz'),
                'color' => true,
                'size' => false
            ],
        ];

        $vidrio = CategoryProduct::where('name', 'Vidrios')->first();

        foreach($vidrios as $producto){
            $producto['category_product_id'] = $vidrio->id;
            SubCategoryProduct::create($producto);
        }

        $textiles = [
            [
                'name' => 'Pañalero',
                'slug' => Str::slug('Pañalero'),
                'color' => false,
                'size' => true
            ],
            [
                'name' => 'Playera infantil',
                'slug' => Str::slug('Playera infantil'),
                'color' => false,
                'size' => true
            ],
            [
                'name' => 'Playera adulto',
                'slug' => Str::slug('Playera adulto'),
                'color' => false,
                'size' => true
            ],
            [
                'name' => 'Cojin',
                'slug' => Str::slug('Cojin'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Cubrebocas',
                'slug' => Str::slug('Cubrebocas'),
                'color' => false,
                'size' => true
            ],
        ];

        $textil = CategoryProduct::where('name', 'Textiles')->first();

        foreach($textiles as $producto){
            $producto['category_product_id'] = $textil->id;
            SubCategoryProduct::create($producto);
        }

        $impresiones = [
            [
                'name' => 'Lona',
                'slug' => Str::slug('Lona'),
                'color' => false,
                'size' => false
            ],
            [
                'name' => 'Volantes',
                'slug' => Str::slug('PVolantes'),
                'color' => false,
                'size' => false
            ],
            [
                'name' => 'Tarjetas de presentación',
                'slug' => Str::slug('Tarjetas de presentación'),
                'color' => false,
                'size' => false
            ],
        ];

        $impresion = CategoryProduct::where('name', 'Impresiones')->first();

        foreach($impresiones as $producto){
            $producto['category_product_id'] = $impresion->id;
            SubCategoryProduct::create($producto);
        }

        $otros = [
            [
                'name' => 'Gorra',
                'slug' => Str::slug('Gorra'),
                'color' => true,
                'size' => false
            ],
            [
                'name' => 'Llaveros',
                'slug' => Str::slug('PLlaveros'),
                'color' => false,
                'size' => true
            ],
            [
                'name' => 'Rompecabezas',
                'slug' => Str::slug('Rompecabezas'),
                'color' => false,
                'size' => true
            ],
            [
                'name' => 'Portaretrato',
                'slug' => Str::slug('Portaretrato'),
                'color' => false,
                'size' => true
            ],
            [
                'name' => 'Portavasos',
                'slug' => Str::slug('Portavasos'),
                'color' => false,
                'size' => false
            ],
            [
                'name' => 'Mouse Pad',
                'slug' => Str::slug('Mouse Pad'),
                'color' => false,
                'size' => false
            ],
        ];

        $otro = CategoryProduct::where('name', 'Impresiones')->first();

        foreach($otros as $producto){
            $producto['category_product_id'] = $otro->id;
            SubCategoryProduct::create($producto);
        }
    }
}
