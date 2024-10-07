<?php

namespace Database\Factories;

use App\Models\Cart;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'qty' => $this->faker->randomNumber(0),
            'price' => $this->faker->randomNumber(2),
            'product_id' => \App\Models\Product::factory(),
            'user_id' => \App\Models\User::factory(),
            'order_id' => \App\Models\Order::factory(),
        ];
    }
}
