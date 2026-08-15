<?php

namespace App\Policies;

use App\Models\IndustryPartner;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IndustryPartnerPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function view(User $user, IndustryPartner $record): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function create(User $user): bool
    {
        if ('IndustryPartner' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function update(User $user, IndustryPartner $record): bool
    {
        if ('IndustryPartner' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function delete(User $user, IndustryPartner $record): bool
    {
        if ('IndustryPartner' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan']);
    }

    public function restore(User $user, IndustryPartner $record): bool
    {
        return $user->hasRole('Super Admin');
    }

    public function forceDelete(User $user, IndustryPartner $record): bool
    {
        return $user->hasRole('Super Admin');
    }
}