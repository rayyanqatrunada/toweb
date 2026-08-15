<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Spatie\Activitylog\Models\Activity;

class ActivityLogTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_creation_logs_activity()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::create(['name' => 'News', 'slug' => 'news']);

        $post = Post::create([
            'title' => 'Test Activity Log',
            'slug' => 'test-activity-log',
            'content' => 'Test content',
            'status' => 'draft',
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $activity = Activity::where('subject_type', Post::class)
            ->where('subject_id', $post->id)
            ->first();

        $this->assertNotNull($activity);
        $this->assertEquals('created', $activity->description);
    }
}
