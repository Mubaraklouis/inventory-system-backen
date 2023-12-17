<?php

namespace Database\Factories;

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
         'user_id'=>1,
         'sold'=>true,
            'added_cart'=>false,
         'category_id'=>2,
         'name'=>fake()->name(),
         'price'=>fake()->numberBetween(2,10),
         'serial_number'=>fake()->numberBetween(2,30),
         "description" => fake()->text(),
         'quantity'=>fake()->numberBetween(2,30),

        ];
    }
}
