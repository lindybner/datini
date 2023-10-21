<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Month>
 */
class MonthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'month' => $this->faker->monthName, // Use faker to generate a random month name
            'year' => $this->faker->year, // Use faker to generate a random year
            'user_id' => User::all()->random(), // Grab a random id from User
        ];
    }
}
