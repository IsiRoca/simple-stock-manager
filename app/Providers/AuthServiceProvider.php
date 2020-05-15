<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Comment' => 'App\Policies\CommentPolicy',
        'App\Models\Product' => 'App\Policies\ProductPolicy',
        'App\Models\LocationCountry' => 'App\Policies\LocationCountryPolicy',
        'App\Models\LocationCity' => 'App\Policies\LocationCityPolicy',
        'App\Models\Company' => 'App\Policies\CompanyPolicy',
        'App\Models\ProductType' => 'App\Policies\ProductTypePolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Media' => 'App\Policies\MediaPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
