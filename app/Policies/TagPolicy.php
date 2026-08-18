<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, Tag $record): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        if ('Tag' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function update(User $user, Tag $record): bool
    {
        if ('Tag' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function delete(User $user, Tag $record): bool
    {
        if ('Tag' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function restore(User $user, Tag $record): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Tag $record): bool
    {
        return $user->hasRole('admin');
    }
}


