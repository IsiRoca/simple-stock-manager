<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
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
     * Determine whether the user can update the company.
     */
    public function update(User $user, Company $company): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can store a company.
     */
    public function store(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the company.
     */
    public function delete(User $user, Company $company): bool
    {
        return $user->isAdmin();
    }
}
