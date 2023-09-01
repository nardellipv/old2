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
            'client_id' => rand('1','20'),
            'product_id' => rand('1','5'),
            'payment_id' => rand('1','5'),
            'branch_id' => rand('1','3'),
            'employee_id' => rand('1','3'),
            'price' => rand('100','2000'),
            'quantity' => rand('1','4'),
            'commission_pay' => rand('100','2000'),
            'invoice' => rand('100','2000'),
            'pending_pay' => rand('1','0'),
            'created_at' => fake()->dateTimeBetween('-1 months', 'now'),
        ];
    }
}
