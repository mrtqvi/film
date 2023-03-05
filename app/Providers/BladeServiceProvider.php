<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Route;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::if('active', function ($routeName) {
            return str_contains(Route::currentRouteName(), $routeName);
        });

        Blade::if('request', function ($param) {
            return request($param);
        });
    }
}
