<?php

namespace Tests\Feature;

use App\Models\Download;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DownloadAnalyticsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
        Storage::fake('public');
    }

    public function test_public_document_can_be_downloaded_and_count_increments()
    {
        Storage::disk('public')->put('test.pdf', 'dummy content');

        $download = Download::create([
            'title' => 'Test Doc',
            'slug' => 'test-doc',
            'file_path' => 'test.pdf',
            'status' => 'published',
            'is_public' => true,
            'download_count' => 0,
        ]);

        $response = $this->get("/download/{$download->slug}/file");

        $response->assertStatus(200);
        
        $this->assertEquals(1, $download->fresh()->download_count);
    }

    public function test_private_document_cannot_be_downloaded()
    {
        Storage::disk('public')->put('private.pdf', 'dummy content');

        $download = Download::create([
            'title' => 'Private Doc',
            'slug' => 'private-doc',
            'file_path' => 'private.pdf',
            'status' => 'published',
            'is_public' => false,
            'download_count' => 0,
        ]);

        $response = $this->get("/download/{$download->slug}/file");

        $response->assertStatus(404);
        $this->assertEquals(0, $download->fresh()->download_count);
    }

    public function test_draft_document_cannot_be_downloaded()
    {
        Storage::disk('public')->put('draft.pdf', 'dummy content');

        $download = Download::create([
            'title' => 'Draft Doc',
            'slug' => 'draft-doc',
            'file_path' => 'draft.pdf',
            'status' => 'draft',
            'is_public' => true,
            'download_count' => 0,
        ]);

        $response = $this->get("/download/{$download->slug}/file");

        $response->assertStatus(404);
        $this->assertEquals(0, $download->fresh()->download_count);
    }

    public function test_missing_file_returns_404_and_does_not_increment_count()
    {
        $download = Download::create([
            'title' => 'Missing Doc',
            'slug' => 'missing-doc',
            'file_path' => 'nonexistent.pdf',
            'status' => 'published',
            'is_public' => true,
            'download_count' => 0,
        ]);

        $response = $this->get("/download/{$download->slug}/file");

        $response->assertStatus(404);
        $this->assertEquals(0, $download->fresh()->download_count);
    }
}
