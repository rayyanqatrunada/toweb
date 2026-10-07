<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FrontendRouteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    public function test_home_page_returns_a_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_about_page_returns_a_successful_response(): void
    {
        $response = $this->get('/tentang');
        $response->assertStatus(200);
    }

    public function test_news_index_page_returns_a_successful_response(): void
    {
        $response = $this->get('/berita');
        $response->assertStatus(200);
    }

    public function test_gallery_page_returns_a_successful_response(): void
    {
        $response = $this->get('/galeri');
        $response->assertStatus(200);
    }

    public function test_partnership_page_returns_a_successful_response(): void
    {
        \App\Models\IndustryPartner::create(['name' => 'Yamaha', 'slug' => 'yamaha', 'status' => 'published', 'is_active' => true]);
        $response = $this->get('/mitra-industri');
        $response->assertStatus(200);
    }

    public function test_download_page_is_disabled_and_redirects_to_home(): void
    {
        $response = $this->get('/unduhan');
        $response->assertRedirect('/');
    }

    public function test_alumni_page_is_temporarily_disabled_and_redirects_to_home(): void
    {
        $response = $this->get('/alumni');
        $response->assertRedirect('/');
    }
}
