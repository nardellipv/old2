<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand('1','20'),
            'product_id' => rand('1','5'),
            'price' => rand('100','2000'),
            'payment' => rand('100','2000'),
            'comment' => fake()->sentence(10),
            'invoice' => rand('100','2000'),
            'created_at' => fake()->dateTimeBetween('-3 year', 'now'),
        ];
    }
}
