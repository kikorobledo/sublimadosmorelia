<?php

namespace Database\Factories;

use App\Models\Design;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\SubCategoryDesign;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Design::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);

        $subCategoryDesign = SubCategoryDesign::all()->random();

        $product = Product::all()->random();

        return [
            'name' => $name,
            'slug' => $this->faker->slug,
            'sub_category_design_id' => $subCategoryDesign->id,
            'product_id' => $product->id
        ];
    }
}
