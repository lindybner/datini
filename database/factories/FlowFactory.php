<?php

namespace Database\Factories;

use App\Models\Month;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flow>
 */
class FlowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray(); // Get an array of all user IDs
        $monthIds = Month::pluck('id')->toArray(); // Get an array of all month IDs

        return [
            'inflow' => $this->faker->randomFloat(2, 1000, 100000), // Generate a random inflow amount with 2 decimal places
            'outflow' => $this->faker->randomFloat(2, 500, 50000), // Generate a random outflow amount with 2 decimal places
            'user_id' => $this->faker->randomElement($userIds), // Grab a random user ID from the created users
            'month_id' => $this->faker->randomElement($monthIds), // Grab a random month ID from the created months
        ];
    }
}
