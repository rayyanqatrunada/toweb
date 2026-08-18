<?php

namespace App\Policies;

use App\Models\DownloadCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DownloadCategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, DownloadCategory $record): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        if ('DownloadCategory' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function update(User $user, DownloadCategory $record): bool
    {
        if ('DownloadCategory' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function delete(User $user, DownloadCategory $record): bool
    {
        if ('DownloadCategory' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function restore(User $user, DownloadCategory $record): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, DownloadCategory $record): bool
    {
        return $user->hasRole('admin');
    }
}


