<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Alumni;
use App\Models\JobVacancy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FrontendPublicTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    public function test_public_pages_load_correctly()
    {
        \App\Models\IndustryPartner::create(['name' => 'Yamaha', 'slug' => 'yamaha', 'status' => 'published', 'is_active' => true]);
        $this->get('/')->assertStatus(200);
        $this->get('/tentang')->assertStatus(200);
        $this->get('/berita')->assertStatus(200);
        $this->get('/pengumuman')->assertStatus(200);
        $this->get('/akademik/program')->assertStatus(200);
        $this->get('/akademik/guru')->assertStatus(200);
        $this->get('/akademik/fasilitas')->assertStatus(200);
        $this->get('/prestasi')->assertStatus(200);
        $this->get('/galeri')->assertStatus(200);
        $this->get('/mitra-industri')->assertStatus(200);
        $this->get('/pkl')->assertStatus(200);
        $this->get('/lowongan')->assertStatus(200);
        $this->get('/alumni')->assertStatus(200);
        $this->get('/unduhan')->assertStatus(200);
    }

    public function test_draft_post_is_not_visible()
    {
        $user = \App\Models\User::factory()->create();
        $category = \App\Models\Category::create(['name' => 'News', 'slug' => 'news']);
        $post = Post::create([
            'title' => 'Test Draft',
            'slug' => 'test-draft',
            'content' => 'Test content',
            'status' => 'draft',
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $this->get('/berita')->assertDontSee($post->title);
        $this->get('/berita/test-draft')->assertStatus(404);
    }

    public function test_private_alumni_is_not_visible()
    {
        $alumni = Alumni::create([
            'name' => 'John Doe Private',
            'slug' => 'john-doe-private',
            'student_id' => '12345',
            'status' => 'published',
            'is_public' => false,
            'graduation_year' => 2020
        ]);

        $this->get('/alumni')->assertDontSee('John Doe Private');
        $this->get('/alumni/john-doe-private')->assertStatus(404);
    }

    public function test_unpublished_job_is_not_visible()
    {
        $partner = \App\Models\IndustryPartner::create(['name' => 'Test Partner', 'slug' => 'test-partner']);
        $job = JobVacancy::create([
            'title' => 'Secret Job',
            'slug' => 'secret-job',
            'description' => 'Test desc',
            'status' => 'draft',
            'industry_partner_id' => $partner->id,
        ]);

        $this->get('/lowongan')->assertDontSee('Secret Job');
        $this->get('/lowongan/secret-job')->assertStatus(404);
    }
}
