<?php

namespace Database\Factories;

use App\Models\Orderlist;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderlistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orderlist::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'qty' => $this->faker->randomNumber(),
            'order_id' => \App\Models\Order::factory(),
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}
