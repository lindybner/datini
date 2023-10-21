<?php

namespace Database\Factories;

use App\Models\Month;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Balance>
 */
class BalanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'asset' => $this->faker->randomFloat(2, 1000, 100000), // Generate a random asset amount with 2 decimal places
            'liability' => $this->faker->randomFloat(2, 500, 50000), // Generate a random liability amount with 2 decimal places
            'user_id' => User::all()->random(), // Grab a random id from User
            'month_id' => Month::all()->random(), // Grab a random id from Month
        ];
    }
}
