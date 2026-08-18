<?php

namespace Tests\Feature;

use App\Models\Achievement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AchievementCmsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Since we are simulating Filament actions, we need a user
        $this->user = User::factory()->create();
    }

    public function test_achievement_can_be_created()
    {
        $category = Category::factory()->create();

        $achievementData = [
            'title' => 'Juara 1 Lomba Mekanik',
            'slug' => 'juara-1-lomba-mekanik',
            'category_id' => $category->id,
            'level' => 'national',
            'rank' => '1st Place',
            'organizer' => 'Kementerian Pendidikan',
            'date' => '2026-08-15',
            'description' => 'Lomba mekanik nasional',
            'status' => 'draft',
        ];

        $achievement = Achievement::create($achievementData);

        $this->assertDatabaseHas('achievements', [
            'title' => 'Juara 1 Lomba Mekanik',
            'slug' => 'juara-1-lomba-mekanik',
            'level' => 'national',
        ]);
        
        $this->assertEquals('draft', $achievement->status);
    }

}
