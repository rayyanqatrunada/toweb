<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_has_seo_tags()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('<meta name="description"', false);
        $response->assertSee('<link rel="canonical"', false);
    }

    public function test_robots_txt_is_accessible()
    {
        $response = $this->get('/robots.txt');

        $response->assertStatus(200);
        $response->assertSee('User-agent: *');
        $response->assertSee('Disallow: /admin');
        $response->assertSee('Sitemap:');
    }

    public function test_sitemap_xml_is_accessible_and_valid()
    {
        $user = \App\Models\User::factory()->create();
        $category = \App\Models\Category::create(['name' => 'News', 'slug' => 'news']);

        $post = new Post([
            'title' => 'Berita Publik',
            'slug' => 'berita-publik',
            'content' => 'Test',
            'status' => 'published',
            'published_at' => now(),
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);
        $post->save();

        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/xml; charset=UTF-8');
        $response->assertSee('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">', false);
        $response->assertSee($post->slug, false);
    }

    public function test_sitemap_xml_does_not_contain_drafts()
    {
        $user = \App\Models\User::factory()->create();
        $category = \App\Models\Category::create(['name' => 'Drafts', 'slug' => 'drafts']);

        $post = new Post([
            'title' => 'Berita Rahasia',
            'slug' => 'berita-rahasia',
            'content' => 'Test',
            'status' => 'draft',
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);
        $post->save();

        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertDontSee($post->slug);
    }

    public function test_search_results_are_noindex()
    {
        $response = $this->get('/search?q=test');
        $response->assertStatus(200);
        $response->assertSee('<meta name="robots" content="noindex, follow">', false);
    }
}
