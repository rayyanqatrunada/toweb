<?php

namespace Tests\Feature;

use App\Models\IndustryPartner;
use App\Models\Partnership;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndustryPartnershipCmsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Create an admin user for potential Filament tests or authorization checks
        $this->user = User::factory()->create();
    }

    public function test_industry_partner_can_be_created()
    {
        $partnerData = [
            'name' => 'PT Astra Honda Motor',
            'slug' => 'pt-astra-honda-motor',
            'industry_type' => 'Automotive Manufacturing',
            'status' => 'published',
        ];

        $partner = IndustryPartner::create($partnerData);

        $this->assertDatabaseHas('industry_partners', [
            'name' => 'PT Astra Honda Motor',
            'slug' => 'pt-astra-honda-motor',
        ]);
        
        $this->assertEquals('published', $partner->status);
    }

    public function test_partnership_can_be_created_for_industry_partner()
    {
        $partner = IndustryPartner::factory()->create();
        
        $partnership = $partner->partnerships()->create([
            'type' => 'mou',
            'title' => 'MoU Kelas Industri',
            'start_date' => '2026-08-01',
            'end_date' => '2028-08-01',
            'status' => 'active',
        ]);

        $this->assertDatabaseHas('partnerships', [
            'title' => 'MoU Kelas Industri',
            'industry_partner_id' => $partner->id,
            'type' => 'mou',
        ]);
        
        $this->assertCount(1, $partner->partnerships);
    }
}
