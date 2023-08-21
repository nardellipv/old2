<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'birthday' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'phone' => fake()->numberBetween($min = 100, $max = 9999999),
            'branch_id' => fake()->numberBetween('1','3'),
            'total_points' => fake()->numberBetween($min = 100, $max = 1000),
        ];
    }
}
