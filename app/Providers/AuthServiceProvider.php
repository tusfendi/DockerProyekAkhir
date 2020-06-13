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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-role', function($user){
            return $user->role == "admin";
        });

        Gate::define('manajer-role', function($user){
            return $user->role == "manajer";
        });

        Gate::define('hrd-role', function($user){
            return $user->role == "hrd";
        });
        
    }
}
