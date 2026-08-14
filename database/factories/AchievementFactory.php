<?php

namespace Database\Factories;

use App\Models\Achievement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Achievement>
 */
class AchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->unique()->slug(),
            'level' => fake()->randomElement(['school', 'district', 'city', 'province', 'national', 'international']),
            'date' => fake()->date(),
            'status' => fake()->randomElement(['draft', 'published', 'archived']),
        ];
    }
}
