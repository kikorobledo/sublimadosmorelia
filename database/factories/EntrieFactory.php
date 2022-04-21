<?php

namespace Database\Factories;

use App\Models\Entrie;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntrieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entrie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'number' => $this->faker->unique()->numberBetween(1, 200),
            'price' => $this->faker->randomDigit,
            'quantity' => $this->faker->randomDigit,
        ];
    }
}
