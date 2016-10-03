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

        if (! $this->app->routesAreCached()) {
            require __DIR__.'/Routes/web.php';
        }

        Menu::add([
            'header' => trans('dashboard::general.dashboard'),
            'items' => [
                [
                    'text' => trans('dashboard::general.my_dashboard'),
                    'route' => "Laralum::dashboard",
                ],
            ],
        ]);
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
