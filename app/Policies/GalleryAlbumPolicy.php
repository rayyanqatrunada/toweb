<?php

namespace App\Policies;

use App\Models\GalleryAlbum;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GalleryAlbumPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, GalleryAlbum $record): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        if ('GalleryAlbum' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function update(User $user, GalleryAlbum $record): bool
    {
        if ('GalleryAlbum' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function delete(User $user, GalleryAlbum $record): bool
    {
        if ('GalleryAlbum' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function restore(User $user, GalleryAlbum $record): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, GalleryAlbum $record): bool
    {
        return $user->hasRole('admin');
    }
}


