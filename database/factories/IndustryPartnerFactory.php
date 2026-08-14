<?php

namespace Database\Factories;

use App\Models\IndustryPartner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<IndustryPartner>
 */
class IndustryPartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'slug' => fake()->unique()->slug(),
            'industry_type' => fake()->randomElement(['Manufacturing', 'Dealership', 'Service']),
            'description' => fake()->sentence(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->companyEmail(),
            'website' => fake()->url(),
            'status' => fake()->randomElement(['draft', 'published', 'archived']),
        ];
    }
}
