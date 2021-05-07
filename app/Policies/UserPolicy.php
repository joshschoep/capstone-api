<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return $user;
    }

    public function view(User $user, User $model)
    {
        return $user;
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, User $model)
    {
        return $user->isAdmin() || $user === $model;
    }

    public function delete(User $user, User $model)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, User $model)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, User $model)
    {
        return $user->isAdmin();
    }
}
