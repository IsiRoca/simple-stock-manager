<?php

namespace App\Policies;

use App\Models\ProductType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user is admin for all authorization.
     */
    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the type.
     */
    public function update(User $user, ProductType $type): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can store a type.
     */
    public function store(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the type.
     */
    public function delete(User $user, ProductType $type): bool
    {
        return $user->isAdmin();
    }
}
