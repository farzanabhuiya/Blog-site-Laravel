<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrapFive();
        
        //view()->composer()hole sudu oi layouts kaj korbe baki kothay ay gulo moddha kaj korbe nah.

        view()->composer('layouts/frontendlayouts',function($view){
            $view->with('categories',Category::with('subcatagories')->latest()->get());
        });
    }
}
