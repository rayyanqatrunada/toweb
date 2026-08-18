<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SecurityHardeningTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Seed roles
        $this->artisan('db:seed', ['--class' => 'RoleAndUserSeeder']);
    }

    public function test_non_admin_cannot_delete_users()
    {
        $nonAdmin = User::factory()->create();

        $userToDelete = User::factory()->create();

        $this->actingAs($nonAdmin);

        // Non-admin shouldn't be able to view user list or delete user
        // We can test Policy directly
        $policy = new \App\Policies\UserPolicy();
        
        $this->assertFalse($policy->delete($nonAdmin, $userToDelete));
    }

    public function test_super_admin_can_delete_users()
    {
        $admin = User::where('email', 'admin@toweb.test')->first();
        $userToDelete = User::factory()->create();
        
        $policy = new \App\Policies\UserPolicy();
        
        $this->assertTrue($policy->delete($admin, $userToDelete));
    }
}
