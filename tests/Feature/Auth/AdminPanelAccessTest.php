<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Spatie\Permission\Models\Role;

class AdminPanelAccessTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Clear cached permissions before each test to ensure fresh state
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'Guru']);
    }

    public function test_guest_cannot_access_admin_panel()
    {
        $response = $this->get('/admin');
        
        // Guests should be redirected to the login page
        $response->assertRedirect('/admin/login');
    }

    public function test_user_without_role_cannot_access_admin_panel()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/admin');
        
        // Filament returns 403 Forbidden if canAccessPanel() returns false
        $response->assertForbidden();
    }

    public function test_super_admin_can_access_admin_panel()
    {
        $user = User::factory()->create();
        $user->assignRole('admin');
        
        $response = $this->actingAs($user)->get('/admin');
        
        // An authorized user should see the dashboard
        $response->assertSuccessful();
    }
}

