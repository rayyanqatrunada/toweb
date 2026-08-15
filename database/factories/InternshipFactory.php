<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Internship>
 */
class InternshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-1 year', '+1 year');
        $endDate = (clone $startDate)->modify('+' . rand(1, 6) . ' months');
        
        return [
            'industry_partner_id' => \App\Models\IndustryPartner::factory(),
            'partnership_id' => null,
            'title' => 'PKL ' . fake()->year(),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
            'status' => fake()->randomElement(['planned', 'ongoing', 'completed', 'cancelled']),
            'description' => fake()->paragraph(),
        ];
    }
}
