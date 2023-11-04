<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Month;
use App\Models\Balance;
use App\Models\Flow;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::truncate();
        Month::truncate();
        Balance::truncate();
        Flow::truncate();

        User::factory()->count(3)->create();
        Month::factory()->count(5)->create();
        Balance::factory()->count(5)->create();
        Flow::factory()->count(5)->create();
    }
}
