<?php

namespace App\Policies;

use App\Models\LocationCountry;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LocationCountryPolicy
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
     * Determine whether the user can update the country.
     */
    public function update(User $user, LocationCountry $country): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can store a country.
     */
    public function store(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the country.
     */
    public function delete(User $user, LocationCountry $country): bool
    {
        return $user->isAdmin();
    }
}
