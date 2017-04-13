<?php

namespace Laralum\Dashboard;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/Translations', 'laralum_dashboard');

        $this->loadViewsFrom(__DIR__.'/Views', 'laralum_dashboard');

        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Routes/web.php';
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
