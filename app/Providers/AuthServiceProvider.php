<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 運営に許可
        Gate::define('admin-higher', function ($user) {
            return ($user->role == 1);
        });
        // メンター以上（メンターと運営）に許可
        Gate::define('user-higher', function ($user) {
            return ($user->role == 0);
        });
    }
}
