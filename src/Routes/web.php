<?php

Route::group(['middleware' => ['web', 'laralum.base', 'laralum.auth'], 'prefix' => config('laralum.base_url'), 'namespace' => 'Laralum\Dashboard\Controllers', 'as' => 'Laralum::'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
});
