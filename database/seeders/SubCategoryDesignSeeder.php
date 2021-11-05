<?php

namespace Database\Seeders;

use App\Models\CategoryDesign;
use Illuminate\Database\Seeder;
use App\Models\SubCategoryDesign;

class SubCategoryDesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategoryDesign::factory(50)->create();

    }
}
