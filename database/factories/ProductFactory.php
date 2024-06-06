<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
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
    public function definition(): array
    {
        return [
            'product_name' => fake()->word(),
            'brand_id' => Brand::all()->random(),
            'category_id' => Category::all()->random(),
            'price' => round(fake()->numberBetween(500000, 32000000), -4),
            'description' => fake()->text(50),
        ];
    }
}
