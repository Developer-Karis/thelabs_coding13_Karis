<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('membre', function() {
            return Auth::user()->role->role == 'Admin' || Auth::user()->role->role == 'Webmaster';
        });

        Gate::define('redacteur', function() {
            return Auth::user()->role->role == 'Admin' || Auth::user()->role->role == 'Webmaster' || Auth::user()->role->role == 'Redacteur';
        });

        Gate::define('web-admin', function() {
            return Auth::user()->role->role == 'Admin' || Auth::user()->role->role == 'Webmaster';
        });

        // Redacteur -> articles, articles en attente
        // Webmaster -> Tout mais accepter articles, il autorise
    }
}
