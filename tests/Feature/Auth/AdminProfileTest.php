<?php

namespace Tests\Feature\Auth;

use App\Filament\Pages\Auth\EditProfile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AdminProfileTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::firstOrCreate(['name' => 'admin']);
    }

    public function test_guest_cannot_access_profile_page(): void
    {
        $response = $this->get('/admin/profile');

        $response->assertRedirect('/admin/login');
    }

    public function test_non_admin_cannot_access_profile_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin/profile');

        $response->assertForbidden();
    }

    public function test_admin_can_access_profile_page(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $response = $this->actingAs($admin)->get('/admin/profile');

        $response->assertSuccessful();
        $response->assertSee('Profil Admin');
        $response->assertSee('Pengaturan Profil Admin');
    }

    public function test_admin_can_update_name(): void
    {
        $admin = User::factory()->create([
            'name' => 'Nama Lama',
            'email' => 'admin@toweb.test',
            'password' => 'oldpassword123',
        ]);
        $admin->assignRole('admin');

        Livewire::actingAs($admin)
            ->test(EditProfile::class)
            ->assertFormSet([
                'name' => 'Nama Lama',
                'email' => 'admin@toweb.test',
            ])
            ->fillForm([
                'name' => 'Nama Admin Baru',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertEquals('Nama Admin Baru', $admin->fresh()->name);
    }

    public function test_admin_can_update_password(): void
    {
        $admin = User::factory()->create([
            'password' => 'secret12345',
        ]);
        $admin->assignRole('admin');

        Livewire::actingAs($admin)
            ->test(EditProfile::class)
            ->fillForm([
                'currentPassword' => 'secret12345',
                'password' => 'newpassword123',
                'passwordConfirmation' => 'newpassword123',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertTrue(Hash::check('newpassword123', $admin->fresh()->password));
    }

    public function test_admin_cannot_update_password_with_wrong_current_password(): void
    {
        $admin = User::factory()->create([
            'password' => 'secret12345',
        ]);
        $admin->assignRole('admin');

        Livewire::actingAs($admin)
            ->test(EditProfile::class)
            ->fillForm([
                'currentPassword' => 'wrongpassword',
                'password' => 'newpassword123',
                'passwordConfirmation' => 'newpassword123',
            ])
            ->call('save')
            ->assertHasFormErrors(['currentPassword']);

        $this->assertTrue(Hash::check('secret12345', $admin->fresh()->password));
    }

    public function test_admin_cannot_update_password_with_mismatched_confirmation(): void
    {
        $admin = User::factory()->create([
            'password' => 'secret12345',
        ]);
        $admin->assignRole('admin');

        Livewire::actingAs($admin)
            ->test(EditProfile::class)
            ->fillForm([
                'currentPassword' => 'secret12345',
                'password' => 'newpassword123',
                'passwordConfirmation' => 'differentpassword',
            ])
            ->call('save')
            ->assertHasFormErrors(['password']);
    }

    public function test_name_is_required(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        Livewire::actingAs($admin)
            ->test(EditProfile::class)
            ->fillForm([
                'name' => '',
            ])
            ->call('save')
            ->assertHasFormErrors(['name' => ['required']]);
    }
}
