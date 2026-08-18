<?php

namespace App\Policies;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnnouncementPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, Announcement $record): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        if ('Announcement' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function update(User $user, Announcement $record): bool
    {
        if ('Announcement' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function delete(User $user, Announcement $record): bool
    {
        if ('Announcement' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function restore(User $user, Announcement $record): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Announcement $record): bool
    {
        return $user->hasRole('admin');
    }
}


