<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'totall_amount' => fake()->numberBetween(1000, 50000),
            'payment_method' => 1,
            'address' => fake()->address(),
            'description' => fake()->text(50),
            'status' => 1,
        ];
    }
}
