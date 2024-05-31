<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'cart_id' => fake()->text(5),
            'product_id' => Arr::random([1, 2, 3, 4, 5, 6, 7, 8, 9]),
            'quantity' => Arr::random([1, 2, 3, 4, 5, 6, 7, 8]),
        ];
    }
}
