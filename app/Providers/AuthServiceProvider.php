<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
// use Illuminate\Contracts\Auth\Access\Gate;
// use Illuminate\Contracts\Auth\Access\Authorizable;

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

        // Gate::before(function (User $user) {
        //     if ($user->isSuperAdmin('admin')) {
        //         return true;
        //     }
        //     return false;
        // });

        Gate::define('product', function (User $user, $route) {
            $arr = []; 
            foreach ($user->hasAccess() as $key => $value) {
                $arr[] = $value;
            }  
             return in_array($route,$arr) ? true : false ; 
        });
        Gate::define('assign', function (User $user) {
           
            if($user->id === 2){
                return true; 
            }
           return false;
        });
    }
}
