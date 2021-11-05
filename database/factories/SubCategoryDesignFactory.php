<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\CategoryDesign;
use App\Models\SubCategoryDesign;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryDesignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubCategoryDesign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word();
        $categories = CategoryDesign::all()->pluck('id');

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'category_design_id' => $categories->random()
        ];
    }
}
