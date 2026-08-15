<?php

namespace Tests\Feature;

use App\Models\IndustryPartner;
use App\Models\Internship;
use App\Models\InternshipParticipant;
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

    public function test_participant_can_be_added_to_internship()
    {
        $internship = Internship::factory()->create();
        
        $participant = $internship->participants()->create([
            'student_name' => 'Budi Santoso',
            'student_id' => '12345678',
            'role' => 'Mekanik Junior',
            'status' => 'active',
        ]);

        $this->assertDatabaseHas('internship_participants', [
            'student_name' => 'Budi Santoso',
            'internship_id' => $internship->id,
        ]);
        
        $this->assertCount(1, $internship->participants);
    }
}
