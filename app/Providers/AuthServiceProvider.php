<?php

namespace App\Providers;

use App\User;
use App\Policies\MyPosts;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        User::class => MyPosts::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('posts.update', 'App\Policies\MyPosts@update');
        Gate::define('posts.delete', 'App\Policies\MyPosts@delete');
    }
}
