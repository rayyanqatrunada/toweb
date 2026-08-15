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
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function view(User $user, GalleryItem $record): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function create(User $user): bool
    {
        if ('GalleryItem' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function update(User $user, GalleryItem $record): bool
    {
        if ('GalleryItem' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function delete(User $user, GalleryItem $record): bool
    {
        if ('GalleryItem' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan']);
    }

    public function restore(User $user, GalleryItem $record): bool
    {
        return $user->hasRole('Super Admin');
    }

    public function forceDelete(User $user, GalleryItem $record): bool
    {
        return $user->hasRole('Super Admin');
    }
}