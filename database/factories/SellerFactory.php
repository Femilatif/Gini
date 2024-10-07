<?php

namespace Database\Factories;

use App\Models\Seller;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seller::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->name(255),
            'email' => $this->faker->email(255),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'shop_name' => $this->faker->sentence(3),
            'password' => \Hash::make('password'),
            'remember_token' => Str::random(10),
            'shop_address' => $this->faker->address(255),
            'shop_number' => $this->faker->numberBetween(100,1000),
            'status' => $this->faker->randomElement(['Pending','Verified']),
            'allow_inter' => $this->faker->randomElement([0, 1]),
        ];
    }
}
