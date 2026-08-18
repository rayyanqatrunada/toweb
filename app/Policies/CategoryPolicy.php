<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, Category $record): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        if ('Category' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function update(User $user, Category $record): bool
    {
        if ('Category' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function delete(User $user, Category $record): bool
    {
        if ('Category' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function restore(User $user, Category $record): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Category $record): bool
    {
        return $user->hasRole('admin');
    }
}


