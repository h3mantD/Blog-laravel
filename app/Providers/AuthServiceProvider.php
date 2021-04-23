<?php

namespace App\Providers;

use App\Policies\BlogPostPolicy;
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

        Gate::define('update-post', function($user, $post) {
            //dd($user->id);
            return $user->id == $post->user_id;
        });

        Gate::define('delete-post', function($user, $post) {
            //dd($user->id);
            return $user->id == $post->user_id;
        });

        //restrictions using policies
        /* 
           Gate::define('update-post','App\Policies\BlogPostPolicy@update');

        */


        //bypassing the gate check for admin
        Gate::before(function ($user, $ability) {
            
            // bypassing all gates
            if( $user->is_admin)
                return true; 
            
            // bypassing perticular gates only
            /* 
            if( $user->is_admin && in_array($ability, ['update-post', 'delete-post']))
                return true; 
            */
        });
    }
}
