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
        return $user->hasRole('admin');
    }

    public function view(User $user, IndustryPartner $record): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        if ('IndustryPartner' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function update(User $user, IndustryPartner $record): bool
    {
        if ('IndustryPartner' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function delete(User $user, IndustryPartner $record): bool
    {
        if ('IndustryPartner' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function restore(User $user, IndustryPartner $record): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, IndustryPartner $record): bool
    {
        return $user->hasRole('admin');
    }
}


