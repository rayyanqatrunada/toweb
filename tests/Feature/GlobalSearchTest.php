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

    public function test_search_route_is_disabled_and_returns_404()
    {
        $response = $this->get('/search');
        $response->assertStatus(404);
    }

    public function test_navbar_does_not_render_search_triggers()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertDontSee('Cari Informasi');
        $response->assertDontSee('open-search');
        $response->assertDontSee('x-global-search-modal');
    }

    public function test_404_page_does_not_render_search_form()
    {
        $response = $this->get('/non-existent-page-url');
        $response->assertStatus(404);
        $response->assertDontSee('Cari berita, prestasi, guru, fasilitas...');
    }
}
