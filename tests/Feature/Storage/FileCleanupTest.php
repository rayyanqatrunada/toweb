<?php

namespace Tests\Feature\Storage;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Teacher;

class FileCleanupTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    public function test_post_thumbnail_is_deleted_when_post_is_deleted()
    {
        $file = UploadedFile::fake()->image('thumbnail.jpg');
        $path = $file->store('posts', 'public');

        $user = User::factory()->create();
        $category = Category::create(['name' => 'News', 'slug' => 'news']);

        $post = Post::create([
            'title' => 'Test Post',
            'slug' => 'test-post',
            'content' => 'Test content',
            'thumbnail' => $path,
            'status' => 'draft',
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);

        Storage::disk('public')->assertExists($path);

        $post->delete();

        Storage::disk('public')->assertMissing($path);
    }

    public function test_teacher_photo_is_deleted_when_teacher_is_deleted()
    {
        $file = UploadedFile::fake()->image('photo.jpg');
        $path = $file->store('teachers', 'public');

        $user = User::factory()->create();

        $teacher = Teacher::create([
            'user_id' => $user->id,
            'name' => 'John Doe',
            'nip' => '123456',
            'position' => 'Teacher',
            'photo' => $path,
            'is_head_of_department' => false,
            'is_active' => true,
        ]);

        Storage::disk('public')->assertExists($path);

        $teacher->delete();

        Storage::disk('public')->assertMissing($path);
    }

    public function test_post_thumbnail_is_deleted_when_replaced()
    {
        $file1 = UploadedFile::fake()->image('thumbnail1.jpg');
        $path1 = $file1->store('posts', 'public');

        $user = User::factory()->create();
        $category = Category::create(['name' => 'News', 'slug' => 'news']);

        $post = Post::create([
            'title' => 'Test Post',
            'slug' => 'test-post',
            'content' => 'Test content',
            'thumbnail' => $path1,
            'status' => 'draft',
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);

        Storage::disk('public')->assertExists($path1);

        $file2 = UploadedFile::fake()->image('thumbnail2.jpg');
        $path2 = $file2->store('posts', 'public');

        $post->update(['thumbnail' => $path2]);

        Storage::disk('public')->assertMissing($path1);
        Storage::disk('public')->assertExists($path2);
    }
}
