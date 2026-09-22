<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\SettingsService;
use App\Models\Setting;

class HeroSliderTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    public function test_homepage_renders_slides_from_admin_settings(): void
    {
        $settings = app(SettingsService::class);
        $slides = [
            [
                'image' => 'hero-slides/custom-slide.jpg',
                'eyebrow' => 'KEJURUAN UNGGULAN 2026',
                'title' => 'Inovasi Teknologi Otomotif Masa Depan',
                'desc' => 'Pelatihan intensif berstandar internasional dengan instruktur tersertifikasi.',
                'button_primary_text' => 'Daftar Sekarang',
                'button_primary_url' => '/kontak',
                'button_secondary_text' => 'Detail Kurikulum',
                'button_secondary_url' => '/akademik/program',
            ]
        ];

        $settings->set('hero_slides', json_encode($slides));

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('KEJURUAN UNGGULAN 2026');
        $response->assertSee('Inovasi Teknologi Otomotif Masa Depan');
        $response->assertSee('Pelatihan intensif berstandar internasional');
        $response->assertSee('Daftar Sekarang');
        $response->assertSee('/kontak');
        $response->assertSee('Detail Kurikulum');
        $response->assertSee('/akademik/program');
    }

    public function test_homepage_falls_back_gracefully_when_hero_slides_empty(): void
    {
        $settings = app(SettingsService::class);
        $settings->set('hero_slides', '[]');

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Menyiapkan Generasi Profesional di Dunia Otomotif');
    }
}
