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
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function view(User $user, Category $record): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor', 'Guru']);
    }

    public function create(User $user): bool
    {
        if ('Category' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function update(User $user, Category $record): bool
    {
        if ('Category' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan', 'Editor']);
    }

    public function delete(User $user, Category $record): bool
    {
        if ('Category' === 'User') return $user->hasRole('Super Admin');
        return $user->hasAnyRole(['Super Admin', 'Admin Jurusan']);
    }

    public function restore(User $user, Category $record): bool
    {
        return $user->hasRole('Super Admin');
    }

    public function forceDelete(User $user, Category $record): bool
    {
        return $user->hasRole('Super Admin');
    }
}