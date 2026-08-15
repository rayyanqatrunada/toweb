<?php

namespace App\Policies;

use App\Models\Competency;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompetencyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function view(User $user, Competency $record): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function create(User $user): bool
    {
        if ('Competency' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function update(User $user, Competency $record): bool
    {
        if ('Competency' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function delete(User $user, Competency $record): bool
    {
        if ('Competency' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan']);
    }

    public function restore(User $user, Competency $record): bool
    {
        return $user->hasRole('Super Admin');
    }

    public function forceDelete(User $user, Competency $record): bool
    {
        return $user->hasRole('Super Admin');
    }
}