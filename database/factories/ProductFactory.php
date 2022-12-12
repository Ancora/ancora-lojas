<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = $this->faker->sentence(3);
        return [
            'shop_id' => Shop::factory(),
            'code' => fake()->word(6),
            'name' => $name,
            'description' => fake()->paragraph(3),
            'price' => fake()->randomFloat(2, 10, 200),
            'stock' => fake()->numberBetween(0, 20),
            'width' => fake()->randomFloat(2, 3, 20),
            'height' => fake()->randomFloat(2, 3, 20),
            'length' => fake()->randomFloat(2, 3, 20),
            'slug' => Str::slug($name),
        ];
    }
}
