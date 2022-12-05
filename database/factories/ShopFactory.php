<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //protected $model = Shop::class;

    public function definition()
    {
        $name = $this->faker->sentence(2);
        return [
            'user_id' => User::factory(),
            'name' => $name,
            'description' => fake()->paragraph(3),
            'slug' => Str::slug($name),
        ];
    }
}
