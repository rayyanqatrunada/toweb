<?php

namespace Tests\Feature;

use App\Models\IndustryPartner;
use App\Models\Internship;
// Removed InternshipParticipant import
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InternshipCmsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Create an admin user for potential Filament tests or authorization checks
        $this->user = User::factory()->create();
    }

    public function test_internship_program_can_be_created()
    {
        $partner = IndustryPartner::factory()->create();

        $internship = Internship::create([
            'industry_partner_id' => $partner->id,
            'title' => 'Program PKL 2026',
            'start_date' => '2026-01-01',
            'end_date' => '2026-06-30',
            'status' => 'planned',
        ]);

        $this->assertDatabaseHas('internships', [
            'title' => 'Program PKL 2026',
            'industry_partner_id' => $partner->id,
        ]);
        
        $this->assertEquals('planned', $internship->status);
    }

}
