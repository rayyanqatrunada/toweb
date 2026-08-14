<?php

namespace Database\Factories;

use App\Models\Partnership;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Partnership>
 */
class PartnershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-1 year', 'now');
        $endDate = fake()->dateTimeBetween($startDate, '+2 years');

        return [
            'industry_partner_id' => \App\Models\IndustryPartner::factory(),
            'type' => fake()->randomElement(['mou', 'internship', 'recruitment']),
            'title' => fake()->sentence(3),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['active', 'expired', 'terminated']),
        ];
    }
}
