<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// use Illuminate\Support\Facades\View; for using view::share
use Illuminate\Support\Facades\View;

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
        // send data to all views
        // view()->share(['name' => 'sara', 'age' => 20]);
        view::share(['name' => 'sara', 'age' => 20]);
    }
}
