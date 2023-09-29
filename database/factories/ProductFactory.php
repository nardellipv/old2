<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence($nbWords = 3, $variableNbWords = true),
            'price' => fake()->numberBetween($min = 100, $max = 2000),
            'offer' => fake()->numberBetween($min = 100, $max = 2000),
            'point' => fake()->numberBetween($min = 100, $max = 1000),
            'point_changed' => fake()->numberBetween($min = 1000, $max = 3000),
            'show' => fake()->randomElement(['Y','N']),
            'exchange' => fake()->randomElement(['Y','N']),
            'commission' => fake()->randomElement(['Y','N']),
            'branch_id' => rand('1','3'),
            'status' => fake()->randomElement(['1','0']),
        ];
    }
}
