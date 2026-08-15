<?php

namespace Database\Factories;

use App\Models\JobVacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JobVacancy>
 */
class JobVacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = 'Lowongan ' . fake()->jobTitle();
        return [
            'industry_partner_id' => \App\Models\IndustryPartner::factory(),
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title . '-' . fake()->unique()->numerify('####')),
            'position' => fake()->jobTitle(),
            'description' => fake()->paragraphs(3, true),
            'requirements' => fake()->paragraphs(2, true),
            'location' => fake()->city(),
            'work_type' => fake()->randomElement(['onsite', 'hybrid', 'remote']),
            'employment_type' => fake()->randomElement(['full_time', 'contract', 'freelance']),
            'salary_min' => 4000000,
            'salary_max' => 8000000,
            'application_email' => fake()->companyEmail(),
            'application_deadline' => fake()->dateTimeBetween('now', '+2 months')->format('Y-m-d'),
            'status' => fake()->randomElement(['draft', 'published', 'archived', 'expired']),
            'published_at' => fake()->optional()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
