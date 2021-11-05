<?php

namespace Database\Seeders;

use App\Models\CategoryDesign;
use Illuminate\Database\Seeder;

class CategoryDesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryDesign::factory(15)->create();
    }
}
