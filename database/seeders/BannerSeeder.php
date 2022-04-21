<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'name' => 'Principal header Desktop',
        ]);

        Banner::create([
            'name' => 'Principal header Mobile',
        ]);

        Banner::create([
            'name' => 'Principal banner 1 Desktop',
        ]);

        Banner::create([
            'name' => 'Principal banner 1 Mobile',
        ]);

        Banner::create([
            'name' => 'Principal banner 2 Desktop',
        ]);

        Banner::create([
            'name' => 'Principal banner 2 Mobile',
        ]);

        Banner::create([
            'name' => 'Catálogo Desktop',
        ]);

        Banner::create([
            'name' => 'Catálogo Mobile',
        ]);

        Banner::create([
            'name' => 'Categoría Desktop',
        ]);

        Banner::create([
            'name' => 'Categoría Mobile',
        ]);

        Banner::create([
            'name' => 'Search Desktop',
        ]);

        Banner::create([
            'name' => 'Search Mobile',
        ]);

    }
}
