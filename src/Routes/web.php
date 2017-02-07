<?php

Route::group([
        'middleware' => ['web', 'laralum.base', 'laralum.auth'],
        'prefix' => config('laralum.settings.base_url'),
        'namespace' => 'Laralum\Dashboard\Controllers',
        'as' => 'laralum::'
    ], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
