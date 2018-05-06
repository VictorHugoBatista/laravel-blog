<?php

namespace App\Providers;

use App\Post;
use App\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('sidebars.archive', function ($view) {
            $view->with('archive', Post::archive());
        });

        view()->composer('sidebars.tags', function ($view) {
            $view->with('tags', Tag::getSidebarTags());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
