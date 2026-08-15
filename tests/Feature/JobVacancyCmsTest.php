<?php

namespace Tests\Feature;

use App\Models\IndustryPartner;
use App\Models\JobVacancy;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class JobVacancyCmsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_job_vacancy_can_be_created()
    {
        $partner = IndustryPartner::factory()->create();

        $vacancy = JobVacancy::create([
            'industry_partner_id' => $partner->id,
            'title' => 'Senior Mechanic',
            'slug' => 'senior-mechanic',
            'position' => 'Senior Mechanic',
            'description' => 'We are looking for a senior mechanic.',
            'requirements' => '5 years of experience.',
            'employment_type' => 'full_time',
            'status' => 'draft',
        ]);

        $this->assertDatabaseHas('job_vacancies', [
            'title' => 'Senior Mechanic',
            'slug' => 'senior-mechanic',
            'industry_partner_id' => $partner->id,
        ]);
        
        $this->assertEquals('draft', $vacancy->status);
    }

    public function test_published_scope_works_correctly()
    {
        $draft = JobVacancy::factory()->create(['status' => 'draft']);
        $archived = JobVacancy::factory()->create(['status' => 'archived']);
        
        $publishedNow = JobVacancy::factory()->create([
            'status' => 'published',
            'published_at' => now()->subDay()
        ]);
        
        $publishedFuture = JobVacancy::factory()->create([
            'status' => 'published',
            'published_at' => now()->addDays(5)
        ]);

        $publishedVacancies = JobVacancy::published()->get();

        $this->assertTrue($publishedVacancies->contains($publishedNow));
        $this->assertFalse($publishedVacancies->contains($draft));
        $this->assertFalse($publishedVacancies->contains($archived));
        $this->assertFalse($publishedVacancies->contains($publishedFuture));
    }
}
