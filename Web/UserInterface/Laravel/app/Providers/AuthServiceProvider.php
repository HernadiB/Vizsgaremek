<?php

namespace App\Providers;

use App\Models\User;
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

        Gate::define('userIsBelowEighteen', function (User $user){
            return date_diff(date_create($user->birthdate), date_create('now'))->y < 18;
        });
        Gate::define('hasReceivedRequests', function (User $user){
            return count($user->ReceivedRequests) != 0;
        });
        Gate::define('hasRemainingTasks', function (User $user){
            return count($user->RemainingTasks) != 0;
        });
        Gate::define('hasTeam', function (User $user){
            return $user->Team != null;
        });
        Gate::define('isAdmin', function (User $user){
            return $user->role == "admin";
        });
        Gate::define('viewWeather', function (User $user){
            return $user->UserSettings->weather;
        });
    }
}
