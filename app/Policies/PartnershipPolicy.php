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
        return $user->hasRole('admin');
    }

    public function view(User $user, Partnership $record): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        if ('Partnership' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function update(User $user, Partnership $record): bool
    {
        if ('Partnership' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function delete(User $user, Partnership $record): bool
    {
        if ('Partnership' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function restore(User $user, Partnership $record): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Partnership $record): bool
    {
        return $user->hasRole('admin');
    }
}


