<?php

namespace App\Policies;

use App\Models\GalleryItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GalleryItemPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, GalleryItem $record): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        if ('GalleryItem' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function update(User $user, GalleryItem $record): bool
    {
        if ('GalleryItem' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function delete(User $user, GalleryItem $record): bool
    {
        if ('GalleryItem' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function restore(User $user, GalleryItem $record): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, GalleryItem $record): bool
    {
        return $user->hasRole('admin');
    }
}


