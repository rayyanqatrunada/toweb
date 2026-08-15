<?php

namespace Tests\Feature;

use App\Models\Alumni;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlumniCmsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_alumni_can_be_created()
    {
        $alumni = Alumni::create([
            'name' => 'Budi Santoso',
            'slug' => 'budi-santoso',
            'student_id' => '20230001',
            'graduation_year' => 2023,
            'is_public' => false,
            'status' => 'draft',
        ]);

        $this->assertDatabaseHas('alumni', [
            'name' => 'Budi Santoso',
            'slug' => 'budi-santoso',
            'is_public' => false,
        ]);
        
        $this->assertEquals('draft', $alumni->status);
    }

    public function test_public_scope_filters_correctly()
    {
        $publishedPublic = Alumni::factory()->create([
            'status' => 'published',
            'is_public' => true,
            'published_at' => now()->subDay(),
        ]);
        
        $publishedPrivate = Alumni::factory()->create([
            'status' => 'published',
            'is_public' => false,
            'published_at' => now()->subDay(),
        ]);
        
        $draftPublic = Alumni::factory()->create([
            'status' => 'draft',
            'is_public' => true,
        ]);
        
        $archivedPublic = Alumni::factory()->create([
            'status' => 'archived',
            'is_public' => true,
        ]);
        
        $publishedFuture = Alumni::factory()->create([
            'status' => 'published',
            'is_public' => true,
            'published_at' => now()->addDays(5),
        ]);

        $publicAlumnis = Alumni::public()->get();

        $this->assertTrue($publicAlumnis->contains($publishedPublic));
        $this->assertFalse($publicAlumnis->contains($publishedPrivate));
        $this->assertFalse($publicAlumnis->contains($draftPublic));
        $this->assertFalse($publicAlumnis->contains($archivedPublic));
        $this->assertFalse($publicAlumnis->contains($publishedFuture));
    }
}
