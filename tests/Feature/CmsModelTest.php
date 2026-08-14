<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CmsModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_category_and_post()
    {
        $user = \App\Models\User::factory()->create();

        $category = \App\Models\Category::create([
            'name' => 'Tech News',
            'slug' => 'tech-news',
            'description' => 'Latest technology news'
        ]);

        $post = \App\Models\Post::create([
            'title' => 'Laravel 11 Released',
            'slug' => 'laravel-11-released',
            'excerpt' => 'A short summary',
            'content' => 'Full article content here',
            'status' => 'published',
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);

        $this->assertDatabaseHas('categories', ['slug' => 'tech-news']);
        $this->assertDatabaseHas('posts', [
            'slug' => 'laravel-11-released',
            'status' => 'published',
            'category_id' => $category->id,
        ]);
        
        $this->assertEquals($post->category->name, 'Tech News');
        $this->assertEquals($post->user->id, $user->id);
    }
}
