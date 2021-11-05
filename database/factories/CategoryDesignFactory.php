<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\CategoryDesign;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryDesignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryDesign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word();

        return [
            'name' => $name,
            'slug' => Str::slug($name)
        ];
    }
}
