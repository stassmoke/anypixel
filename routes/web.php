<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/{page}', function (string $page) {
    return view(str_replace('-','.', $page));
});

Route::prefix('admin')
    ->name('admin.')
    ->namespace('Admin')
    ->group(function () {

        Route::get('login','LoginController@loginForm')->name('login.form');
        Route::post('login','LoginController@login')->name('login.submit');
        Route::get('logout','LoginController@logout')->name('logout');

        Route::middleware(['auth'])->group(function () {
            Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        });
    })
;
