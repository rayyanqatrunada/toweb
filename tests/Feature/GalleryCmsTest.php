<?php

namespace Tests\Feature;

use App\Models\GalleryAlbum;
use App\Models\GalleryItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GalleryCmsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_gallery_album_can_be_created_and_has_items()
    {
        $album = GalleryAlbum::create([
            'title' => 'Album 1',
            'slug' => 'album-1',
            'status' => 'published',
        ]);

        $item1 = $album->items()->create([
            'file_path' => 'galleries/items/test1.jpg',
            'is_featured' => true,
        ]);

        $item2 = $album->items()->create([
            'file_path' => 'galleries/items/test2.jpg',
            'is_featured' => false,
        ]);

        $this->assertDatabaseHas('gallery_albums', ['title' => 'Album 1']);
        $this->assertCount(2, $album->items);
        $this->assertTrue($item1->is_featured);
    }

    public function test_featured_image_logic()
    {
        $album = GalleryAlbum::create([
            'title' => 'Album 2',
            'slug' => 'album-2',
            'status' => 'draft',
        ]);

        $item1 = $album->items()->create([
            'file_path' => 'galleries/items/feat1.jpg',
            'is_featured' => true,
        ]);

        $item2 = $album->items()->create([
            'file_path' => 'galleries/items/feat2.jpg',
            'is_featured' => true, // Setting this to true should set item1 to false via Model booted event
        ]);

        $this->assertTrue($item2->fresh()->is_featured);
        $this->assertFalse($item1->fresh()->is_featured);
    }

    public function test_published_scope_filters_correctly()
    {
        $draft = GalleryAlbum::create(['title' => 'A', 'slug' => 'a', 'status' => 'draft']);
        $archived = GalleryAlbum::create(['title' => 'B', 'slug' => 'b', 'status' => 'archived']);
        
        $publishedNow = GalleryAlbum::create([
            'title' => 'C', 'slug' => 'c', 
            'status' => 'published',
            'published_at' => now()->subDay()
        ]);
        
        $publishedFuture = GalleryAlbum::create([
            'title' => 'D', 'slug' => 'd', 
            'status' => 'published',
            'published_at' => now()->addDays(5)
        ]);

        $publishedAlbums = GalleryAlbum::published()->get();

        $this->assertTrue($publishedAlbums->contains($publishedNow));
        $this->assertFalse($publishedAlbums->contains($draft));
        $this->assertFalse($publishedAlbums->contains($archived));
        $this->assertFalse($publishedAlbums->contains($publishedFuture));
    }
}
