<?php

namespace App\Policies;

use App\Models\LocationCity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LocationCityPolicy
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
     * Determine whether the user can update the city.
     */
    public function update(User $user, LocationCity $city): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can store a city.
     */
    public function store(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the city.
     */
    public function delete(User $user, LocationCity $city): bool
    {
        return $user->isAdmin();
    }
}
