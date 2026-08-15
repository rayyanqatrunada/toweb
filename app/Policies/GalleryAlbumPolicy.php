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
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function view(User $user, GalleryAlbum $record): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function create(User $user): bool
    {
        if ('GalleryAlbum' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function update(User $user, GalleryAlbum $record): bool
    {
        if ('GalleryAlbum' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function delete(User $user, GalleryAlbum $record): bool
    {
        if ('GalleryAlbum' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan']);
    }

    public function restore(User $user, GalleryAlbum $record): bool
    {
        return $user->hasRole('Super Admin');
    }

    public function forceDelete(User $user, GalleryAlbum $record): bool
    {
        return $user->hasRole('Super Admin');
    }
}