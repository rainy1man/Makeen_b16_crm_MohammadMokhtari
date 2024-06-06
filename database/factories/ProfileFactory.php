<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Province;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'national_number' => '00' . fake()->randomNumber(8),
            'gender' => fake()->randomElement(['زن', 'مرد']),
            'birth_date' => fake()->date(),
        ];
    }
}
