<?php

namespace App\Policies;

use App\Models\Competency;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompetencyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, Competency $record): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        if ('Competency' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function update(User $user, Competency $record): bool
    {
        if ('Competency' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function delete(User $user, Competency $record): bool
    {
        if ('Competency' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function restore(User $user, Competency $record): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Competency $record): bool
    {
        return $user->hasRole('admin');
    }
}


