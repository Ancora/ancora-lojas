<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        return [
            'name' => $name,
            'description' => fake()->paragraph(3),
            'slug' => Str::slug($name),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Category $category) {
            $products = Product::factory(30)->make();
            $category->products()->saveMany($products);
        });
    }
}
