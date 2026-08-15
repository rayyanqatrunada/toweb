<?php

namespace Database\Factories;

use App\Models\InternshipParticipant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<InternshipParticipant>
 */
class InternshipParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'internship_id' => \App\Models\Internship::factory(),
            'student_name' => fake()->name(),
            'student_id' => fake()->numerify('1####'),
            'role' => 'Mechanic',
            'status' => fake()->randomElement(['planned', 'active', 'completed', 'cancelled']),
        ];
    }
}
