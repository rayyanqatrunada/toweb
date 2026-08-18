<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ensure cache is cleared
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Create the new 'admin' role if it doesn't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // 2. Identify all users with legacy roles
        $legacyRoleNames = ['Super Admin', 'Admin Jurusan', 'Editor', 'Guru'];
        
        $usersToMigrate = User::whereHas('roles', function($q) use ($legacyRoleNames) {
            $q->whereIn('name', $legacyRoleNames);
        })->get();

        // 3. Re-assign all of them to 'admin' and remove legacy roles
        foreach ($usersToMigrate as $user) {
            $user->assignRole('admin');
            foreach ($legacyRoleNames as $legacyRole) {
                if ($user->hasRole($legacyRole)) {
                    $user->removeRole($legacyRole);
                }
            }
        }

        // 4. Delete the legacy roles from database
        foreach ($legacyRoleNames as $legacyRole) {
            $role = Role::where('name', $legacyRole)->first();
            if ($role) {
                $role->delete();
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Re-create the legacy roles
        $legacyRoleNames = ['Super Admin', 'Admin Jurusan', 'Editor', 'Guru'];
        foreach ($legacyRoleNames as $legacyRole) {
            Role::firstOrCreate(['name' => $legacyRole]);
        }

        // We cannot reliably determine which admin had which role originally,
        // so we default to giving 'Super Admin' to all admins.
        $admins = User::role('admin')->get();
        foreach ($admins as $user) {
            $user->assignRole('Super Admin');
            $user->removeRole('admin');
        }

        // Finally delete the admin role
        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole) {
            $adminRole->delete();
        }
    }
};
