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
            'App\BlogPost' => 'App\Policy\BlogPostPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('home_secret', function ($user){
            return $user->is_admin;
        });

        Gate::before(function ($user, $ability){
            if($user->is_admin && $ability === 'update'){
                return true;
            }
        });

    }
}
