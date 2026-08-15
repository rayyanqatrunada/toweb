<?php

namespace App\Policies;

use App\Models\Achievement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AchievementPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function view(User $user, Achievement $record): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function create(User $user): bool
    {
        if ('Achievement' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function update(User $user, Achievement $record): bool
    {
        if ('Achievement' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function delete(User $user, Achievement $record): bool
    {
        if ('Achievement' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan']);
    }

    public function restore(User $user, Achievement $record): bool
    {
        return $user->hasRole('Super Admin');
    }

    public function forceDelete(User $user, Achievement $record): bool
    {
        return $user->hasRole('Super Admin');
    }
}