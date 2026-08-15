<?php

namespace App\Policies;

use App\Models\Partnership;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartnershipPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function view(User $user, Partnership $record): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function create(User $user): bool
    {
        if ('Partnership' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function update(User $user, Partnership $record): bool
    {
        if ('Partnership' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function delete(User $user, Partnership $record): bool
    {
        if ('Partnership' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan']);
    }

    public function restore(User $user, Partnership $record): bool
    {
        return $user->hasRole('Super Admin');
    }

    public function forceDelete(User $user, Partnership $record): bool
    {
        return $user->hasRole('Super Admin');
    }
}