<?php

namespace Tests\Feature;

use App\Models\Download;
use App\Models\User;
use App\Jobs\RecordDownloadAnalytics;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class DownloadQueueTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
        Storage::fake('public');
    }

    public function test_public_document_dispatches_analytics_job()
    {
        Queue::fake();

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
        
        Queue::assertPushed(RecordDownloadAnalytics::class, function ($job) use ($download) {
            // Using reflection because $downloadId is protected
            $reflection = new \ReflectionClass($job);
            $property = $reflection->getProperty('downloadId');
            $property->setAccessible(true);
            return $property->getValue($job) === $download->id;
        });
    }

    public function test_private_document_does_not_dispatch_job()
    {
        Queue::fake();

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
        
        Queue::assertNotPushed(RecordDownloadAnalytics::class);
    }

    public function test_missing_file_does_not_dispatch_job()
    {
        Queue::fake();

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
        
        Queue::assertNotPushed(RecordDownloadAnalytics::class);
    }

    public function test_record_download_analytics_job_increments_count()
    {
        $download = Download::create([
            'title' => 'Test Job Doc',
            'slug' => 'test-job-doc',
            'file_path' => 'test-job.pdf',
            'status' => 'published',
            'is_public' => true,
            'download_count' => 0,
        ]);

        $job = new RecordDownloadAnalytics($download->id);
        $job->handle();

        $this->assertEquals(1, $download->fresh()->download_count);
    }

    public function test_record_download_analytics_job_safely_ignores_deleted_record()
    {
        // Should not throw any exception even if ID doesn't exist
        $job = new RecordDownloadAnalytics(99999);
        $job->handle();
        
        $this->assertTrue(true); // Reaching here means no exception was thrown
    }
}
