<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;
use App\Models\Post;

class HomepageCacheTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    /**
     * Test that the homepage loads properly and populates cache.
     */
    public function test_homepage_loads_and_populates_cache(): void
    {
        Cache::forget('homepage:news');

        $response = $this->get('/');

        $response->assertStatus(200);

        // Cache key terisi setelah response (mungkin empty collection, tapi key ada)
        // Di array driver, Cache::has() return true bahkan untuk empty collection
        $this->assertTrue(Cache::has('homepage:news'));
    }

    /**
     * Test that draft content does not leak into cache.
     */
    public function test_draft_post_is_not_cached_on_homepage(): void
    {
        Cache::forget('homepage:news');

        $userId = \Illuminate\Support\Facades\DB::table('users')->insertGetId([
            'name' => 'Test User',
            'email' => 'test'.rand().'@test.com',
            'password' => bcrypt('password')
        ]);
        
        $catId = \Illuminate\Support\Facades\DB::table('categories')->insertGetId([
            'name' => 'News',
            'slug' => 'news-'.rand()
        ]);

        // Buat satu post draft secara manual
        Post::create([
            'title' => 'DRAFT SECRET',
            'slug' => 'draft-secret',
            'content' => 'Content secret',
            'status' => 'draft',
            'published_at' => null,
            'user_id' => $userId,
            'category_id' => $catId
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertDontSee('DRAFT SECRET');

        // Cache terbentuk tapi isinya tidak boleh ada draft
        $cachedNews = Cache::get('homepage:news');
        $this->assertCount(0, $cachedNews);
    }

    /**
     * Test cache invalidation works when model is saved.
     * Memverifikasi bahwa: (1) cache ter-bust setelah Post disimpan,
     * (2) GET homepage berikutnya menampilkan post baru.
     */
    public function test_cache_is_invalidated_when_model_is_saved(): void
    {
        $userId = \Illuminate\Support\Facades\DB::table('users')->insertGetId([
            'name' => 'Test User 2',
            'email' => 'test2'.rand().'@test.com',
            'password' => bcrypt('password')
        ]);
        
        $catId = \Illuminate\Support\Facades\DB::table('categories')->insertGetId([
            'name' => 'News 2',
            'slug' => 'news-2-'.rand()
        ]);

        // Panggil homepage untuk mengisi cache (cache homepage:news = empty collection)
        $this->get('/');

        // Buat post baru — booted() di Post harus forget('homepage:news')
        Post::create([
            'title' => 'BERITA BARU',
            'slug' => 'berita-baru',
            'content' => 'Content berita baru',
            'status' => 'published',
            'published_at' => now()->subDay(),
            'user_id' => $userId,
            'category_id' => $catId
        ]);

        // Cache harus otomatis hilang karena booted event di Model Post
        $this->assertFalse(Cache::has('homepage:news'));

        // Panggil ulang — cache terisi ulang dengan berita baru
        $response = $this->get('/');
        $response->assertStatus(200);

        $cachedNews = Cache::get('homepage:news');
        // Cache sekarang berisi 1 post dengan judul BERITA BARU
        $this->assertNotNull($cachedNews);
        $this->assertCount(1, $cachedNews);
        $this->assertEquals('BERITA BARU', $cachedNews->first()->title);
    }
}
