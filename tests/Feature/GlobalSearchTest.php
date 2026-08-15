<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class GlobalSearchTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    public function test_empty_search_query_returns_ok_state()
    {
        $response = $this->get('/search');
        $response->assertStatus(200);
        $response->assertSee('Mulai Pencarian');
    }

    public function test_search_shows_public_post_and_hides_draft()
    {
        $user = User::factory()->create();
        
        $category = Category::factory()->create([
            'name' => 'News',
            'slug' => 'news'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => 'Berita Juara Olimpiade',
            'slug' => 'berita-juara-olimpiade',
            'excerpt' => 'Excerpt',
            'content' => 'Content',
            'status' => 'published',
            'published_at' => now(),
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => 'Berita Rahasia Sekolah',
            'slug' => 'berita-rahasia-sekolah',
            'excerpt' => 'Excerpt',
            'content' => 'Content',
            'status' => 'draft',
            'published_at' => null,
        ]);

        $response = $this->get('/search?q=Berita');
        $response->assertStatus(200);
        
        $response->assertSee('Berita Juara Olimpiade');
        $response->assertDontSee('Berita Rahasia Sekolah');
    }

    public function test_search_malicious_input_is_handled_safely()
    {
        $response = $this->get('/search?q=\' OR 1=1; --');
        $response->assertStatus(200);
        $response->assertSee('Pencarian tidak menemukan hasil');
    }

    public function test_long_input_is_truncated()
    {
        $longQuery = str_repeat('A', 150);
        $response = $this->get('/search?q=' . $longQuery);
        $response->assertStatus(200);
        $response->assertSee(str_repeat('A', 100));
        $response->assertDontSee(str_repeat('A', 150));
    }
}
