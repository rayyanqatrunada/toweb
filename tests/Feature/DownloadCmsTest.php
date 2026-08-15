<?php

namespace Tests\Feature;

use App\Models\Download;
use App\Models\DownloadCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DownloadCmsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_download_document_can_be_created()
    {
        $category = DownloadCategory::create(['name' => 'Module', 'slug' => 'module']);

        $download = Download::create([
            'title' => 'Test Doc',
            'slug' => 'test-doc',
            'file_path' => 'documents/test.pdf',
            'download_category_id' => $category->id,
            'status' => 'published',
            'is_public' => true,
        ]);

        $this->assertDatabaseHas('downloads', ['title' => 'Test Doc']);
        $this->assertEquals($category->id, $download->category->id);
    }

    public function test_public_and_published_scopes()
    {
        $draftPublic = Download::create(['title' => 'A', 'slug' => 'a', 'file_path' => 'a.pdf', 'status' => 'draft', 'is_public' => true]);
        $publishedPrivate = Download::create(['title' => 'B', 'slug' => 'b', 'file_path' => 'b.pdf', 'status' => 'published', 'is_public' => false]);
        $archivedPublic = Download::create(['title' => 'C', 'slug' => 'c', 'file_path' => 'c.pdf', 'status' => 'archived', 'is_public' => true]);
        
        $publishedPublicNow = Download::create([
            'title' => 'D', 'slug' => 'd', 'file_path' => 'd.pdf',
            'status' => 'published',
            'is_public' => true,
            'published_at' => now()->subDay()
        ]);
        
        $publishedPublicFuture = Download::create([
            'title' => 'E', 'slug' => 'e', 'file_path' => 'e.pdf',
            'status' => 'published',
            'is_public' => true,
            'published_at' => now()->addDays(5)
        ]);

        $publicDocs = Download::public()->get();

        $this->assertTrue($publicDocs->contains($publishedPublicNow));
        $this->assertFalse($publicDocs->contains($draftPublic));
        $this->assertFalse($publicDocs->contains($publishedPrivate));
        $this->assertFalse($publicDocs->contains($archivedPublic));
        $this->assertFalse($publicDocs->contains($publishedPublicFuture));
    }
}
