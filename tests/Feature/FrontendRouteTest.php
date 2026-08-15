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
        $response = $this->get('/mitra-industri');
        $response->assertStatus(200);
    }

    public function test_download_page_returns_a_successful_response(): void
    {
        $response = $this->get('/unduhan');
        $response->assertStatus(200);
    }
}
