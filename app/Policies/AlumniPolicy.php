<?php

namespace App\Policies;

use App\Models\Alumni;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlumniPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function view(User $user, Alumni $record): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function create(User $user): bool
    {
        if ('Alumni' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function update(User $user, Alumni $record): bool
    {
        if ('Alumni' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function delete(User $user, Alumni $record): bool
    {
        if ('Alumni' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan']);
    }

    public function restore(User $user, Alumni $record): bool
    {
        return $user->hasRole('Super Admin');
    }

    public function forceDelete(User $user, Alumni $record): bool
    {
        return $user->hasRole('Super Admin');
    }
}