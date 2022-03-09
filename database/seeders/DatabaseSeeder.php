<?php

namespace Database\Seeders;

use App\Models\Design;
use App\Models\Product;
use App\Models\CategoryDesign;
use App\Models\CategoryProduct;
use Illuminate\Database\Seeder;
use Database\Seeders\SizeSeeder;
use Database\Seeders\ColorSeeder;
use Database\Seeders\DesignSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategoryDesignSeeder;
use Database\Seeders\CategoryProductSeeder;
use Database\Seeders\SubCategoryDesignSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(CategoryProductSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(CategoryDesignSeeder::class);
        $this->call(SubCategoryDesignSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(DesignSeeder::class);
        $this->call(UserSeeder::class);

        cache()->put('categoriesProduct', CategoryProduct::all());
        cache()->put('categoriesDesign', CategoryDesign::with('subcategories')->get());
        cache()->put('latestDesigns', Design::with('product')->orderBy('created_at')->take(20)->get()->toArray());
        cache()->put('latestDesignsTextil', CategoryProduct::where('name', 'Textiles')->first()->designs()->with('product')->orderBy('created_at')->take(20)->get()->toArray());
        cache()->put('latestDesignsAluminium', CategoryProduct::where('name', 'Aluminios')->first()->designs()->with('product')->orderBy('created_at')->take(10)->get()->toArray());
        cache()->put('latestDesignsIron', CategoryProduct::where('name', 'Aceros')->first()->designs()->with('product')->orderBy('created_at')->take(10)->get()->toArray());

    }
}
