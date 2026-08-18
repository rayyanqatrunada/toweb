<?php

namespace App\Policies;

use App\Models\JobVacancy;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobVacancyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, JobVacancy $record): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        if ('JobVacancy' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function update(User $user, JobVacancy $record): bool
    {
        if ('JobVacancy' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function delete(User $user, JobVacancy $record): bool
    {
        if ('JobVacancy' === 'User') return $user->hasRole('admin');
        return $user->hasRole('admin');
    }

    public function restore(User $user, JobVacancy $record): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, JobVacancy $record): bool
    {
        return $user->hasRole('admin');
    }
}


