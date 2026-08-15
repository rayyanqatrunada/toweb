<?php

namespace Database\Factories;

use App\Models\Alumni;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Alumni>
 */
class AlumniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        return [
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name . '-' . fake()->unique()->numerify('####')),
            'student_id' => fake()->unique()->numerify('1####'),
            'graduation_year' => fake()->numberBetween(2010, date('Y')),
            'city' => fake()->city(),
            'education' => fake()->randomElement([null, 'Universitas Indonesia', 'Institut Teknologi Bandung']),
            'current_occupation' => fake()->jobTitle(),
            'current_company' => fake()->company(),
            'bio' => fake()->paragraph(),
            'is_public' => fake()->boolean(),
            'status' => fake()->randomElement(['draft', 'published', 'archived']),
            'published_at' => fake()->optional()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
