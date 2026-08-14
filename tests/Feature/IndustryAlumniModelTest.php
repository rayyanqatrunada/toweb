<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\IndustryPartner;
use App\Models\JobVacancy;
use App\Models\Alumni;

class IndustryAlumniModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_industry_partner_and_job_vacancy()
    {
        $partner = IndustryPartner::create([
            'name' => 'PT. Astra Honda Motor',
            'slug' => 'astra-honda-motor',
            'address' => 'Jakarta'
        ]);

        $vacancy = JobVacancy::create([
            'industry_partner_id' => $partner->id,
            'title' => 'Teknisi Junior',
            'slug' => 'teknisi-junior',
            'description' => 'Membuka lowongan teknisi',
            'status' => 'open'
        ]);

        $this->assertDatabaseHas('industry_partners', ['slug' => 'astra-honda-motor']);
        $this->assertDatabaseHas('job_vacancies', ['slug' => 'teknisi-junior']);
        $this->assertEquals($vacancy->industryPartner->name, 'PT. Astra Honda Motor');
    }

    public function test_can_create_alumni()
    {
        $alumni = Alumni::create([
            'name' => 'Budi Santoso',
            'student_id' => '1234567890',
            'graduation_year' => 2025,
            'current_status' => 'working'
        ]);

        $this->assertDatabaseHas('alumni', ['student_id' => '1234567890', 'graduation_year' => 2025]);
    }
}
