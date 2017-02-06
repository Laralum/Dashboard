<?php

namespace Laralum\Dashboard;

use Illuminate\Support\ServiceProvider;
use Laralum\Laralum\Menu;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/Translations', 'dashboard');

        $this->loadViewsFrom(__DIR__.'/Views', 'dashboard');

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
