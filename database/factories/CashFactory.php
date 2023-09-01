<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cash>
 */
class CashFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'mount' => rand('100','2000'),
            'comment' => fake()->sentence($nbWords = 3, $variableNbWords = true),
            'payment_id' => rand('1','5'),
            'invoice_id' => rand('1','5'),
            'move' => fake()->randomElement(['I','E']),
            'branch_id' => rand('1','3'),
        ];
    }
}
