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
        \Illuminate\Support\Facades\Storage::fake('public');

        $role = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $this->user = User::factory()->create();
        $this->user->assignRole($role);

        $this->actingAs($this->user);
        \Filament\Facades\Filament::setCurrentPanel(\Filament\Facades\Filament::getPanel('admin'));
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

    public function test_admin_can_create_album_with_gallery_photos_via_filament()
    {
        $thumbnail = \Illuminate\Http\UploadedFile::fake()->image('cover.jpg', 600, 400);
        $photo1 = \Illuminate\Http\UploadedFile::fake()->image('photo1.jpg', 800, 600);
        $photo2 = \Illuminate\Http\UploadedFile::fake()->image('photo2.jpg', 800, 600);

        \Livewire\Livewire::test(\App\Filament\Resources\GalleryAlbums\Pages\CreateGalleryAlbum::class)
            ->fillForm([
                'title' => 'Dokumentasi Uji Kompetensi',
                'slug' => 'dokumentasi-uji-kompetensi',
                'status' => 'published',
            ])
            ->set('data.thumbnail', $thumbnail)
            ->set('data.gallery_photos', [$photo1, $photo2])
            ->call('create')
            ->assertHasNoFormErrors();

        $album = GalleryAlbum::where('slug', 'dokumentasi-uji-kompetensi')->first();
        $this->assertNotNull($album);
        $this->assertNotNull($album->thumbnail);
        $this->assertCount(2, $album->items);
        $this->assertNotEmpty($album->items->first()->file_path);
    }

    public function test_admin_fallback_thumbnail_as_gallery_item_if_no_photos()
    {
        $thumbnail = \Illuminate\Http\UploadedFile::fake()->image('single-cover.jpg', 600, 400);

        \Livewire\Livewire::test(\App\Filament\Resources\GalleryAlbums\Pages\CreateGalleryAlbum::class)
            ->fillForm([
                'title' => 'Kegiatan Tanpa Detail',
                'slug' => 'kegiatan-tanpa-detail',
                'status' => 'published',
            ])
            ->set('data.thumbnail', $thumbnail)
            ->set('data.gallery_photos', [])
            ->call('create')
            ->assertHasNoFormErrors();

        $album = GalleryAlbum::where('slug', 'kegiatan-tanpa-detail')->first();
        $this->assertNotNull($album);
        $this->assertNotNull($album->thumbnail);
        $this->assertCount(1, $album->items);
        $this->assertEquals($album->thumbnail, $album->items->first()->file_path);
    }

    public function test_editing_album_preserves_existing_photos()
    {
        $album = GalleryAlbum::create([
            'title' => 'Album Lama',
            'slug' => 'album-lama',
            'status' => 'published',
        ]);

        $item1 = $album->items()->create([
            'file_path' => 'galleries/items/old-photo-1.jpg',
            'sort_order' => 1,
        ]);
        $item2 = $album->items()->create([
            'file_path' => 'galleries/items/old-photo-2.jpg',
            'sort_order' => 2,
        ]);

        $newPhoto = \Illuminate\Http\UploadedFile::fake()->image('new-photo.jpg', 800, 600);

        \Livewire\Livewire::test(\App\Filament\Resources\GalleryAlbums\Pages\EditGalleryAlbum::class, [
            'record' => $album->getKey(),
        ])
            ->set('data.gallery_photos', [$newPhoto])
            ->call('save')
            ->assertHasNoFormErrors();

        $album->refresh();
        // The original 2 items must STILL exist, plus the 1 new item = 3 total!
        $this->assertCount(3, $album->items);
        $this->assertDatabaseHas('gallery_items', ['id' => $item1->id]);
        $this->assertDatabaseHas('gallery_items', ['id' => $item2->id]);
    }

    public function test_gallery_frontend_aggregates_assets_from_achievements_facilities_and_posts()
    {
        $album = GalleryAlbum::create([
            'title' => 'Kegiatan Otomotif',
            'slug' => 'kegiatan-otomotif',
            'status' => 'published',
            'published_at' => now(),
        ]);
        $album->items()->create([
            'file_path' => 'galleries/items/kegiatan.jpg',
            'title' => 'Foto Kegiatan',
            'sort_order' => 1,
        ]);

        \App\Models\Achievement::create([
            'title' => 'Juara 1 LKS Otomotif',
            'slug' => 'juara-1-lks-otomotif',
            'rank' => 'Juara 1',
            'level' => 'Provinsi',
            'photo' => 'achievements/lks.jpg',
            'status' => 'published',
            'date' => now(),
        ]);

        \App\Models\Facility::create([
            'name' => 'Bengkel Service AHASS',
            'slug' => 'bengkel-service-ahass',
            'photo' => 'facilities/bengkel.jpg',
            'status' => 'available',
        ]);

        \App\Models\Post::create([
            'title' => 'Kunjungan Industri Honda',
            'slug' => 'kunjungan-industri-honda',
            'content' => 'Liputan dokumentasi kunjungan industri.',
            'thumbnail' => 'posts/kunjungan.jpg',
            'status' => 'published',
            'published_at' => now(),
            'user_id' => $this->user->id,
        ]);

        $response = $this->get(route('gallery.index'));
        $response->assertStatus(200);
        $response->assertSee('Foto Kegiatan');
        $response->assertSee('Juara 1 LKS Otomotif');
        $response->assertSee('Bengkel Service AHASS');
        $response->assertSee('Kunjungan Industri Honda');
    }
}

