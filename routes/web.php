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

Route::prefix('admin')
    ->name('admin.')
    ->namespace('Admin')
    ->group(function () {

        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        Route::get('login','LoginController@loginForm')->name('login.form');
        Route::post('login','LoginController@login')->name('login.submit');
        Route::get('logout','LoginController@logout')->name('logout');

        Route::middleware(['auth'])->group(function () {
            Route::get('dashboard', 'DashboardController@index')->name('dashboard');
            Route::get('categories', 'CategoriesController@index')->name('categories.index');
            Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
            Route::get('categories/edit/{intCatID}', 'CategoriesController@edit')->name('categories.edit');

            Route::get('homepage-reviews', 'HomepageReviewsController@index')->name('homepage-reviews.index');
            Route::get('homepage-reviews/create', 'HomepageReviewsController@create')->name('homepage-reviews.create');
            Route::get('homepage-reviews/edit/{intReviewID}', 'HomepageReviewsController@edit')->name('homepage-reviews.edit');

            Route::get('categories/list','Api\\CategoriesController@listOfCategories')->name('categories.list');
            Route::get('categories/find/{intCatID}','Api\\CategoriesController@find')->name('categories.find');
            Route::post('categories/save-sort','Api\\CategoriesController@saveSort')->name('categories.sort');
            Route::delete('categories/delete/{intCatID}','Api\\CategoriesController@delete')->name('categories.delete');
            Route::post('categories/store','Api\\CategoriesController@store')->name('categories.store');
            Route::put('categories/update/{intCatID}','Api\\CategoriesController@update')->name('categories.update');

            Route::get('homepage-reviews/list','Api\\HomepageReviewsController@listOfReviews')->name('homepage-reviews.list');
            Route::get('homepage-reviews/find/{intReviewID}','Api\\HomepageReviewsController@find')->name('homepage-reviews.find');
            Route::post('homepage-reviews/save-sort','Api\\HomepageReviewsController@saveSort')->name('homepage-reviews.sort');
            Route::delete('homepage-reviews/delete/{intReviewID}','Api\\HomepageReviewsController@delete')->name('homepage-reviews.delete');
            Route::post('homepage-reviews/store','Api\\HomepageReviewsController@store')->name('homepage-reviews.store');
            Route::put('homepage-reviews/update/{intReviewID}','Api\\HomepageReviewsController@update')->name('homepage-reviews.update');

            Route::post('images/upload','Api\\ImagesController@upload')->name('images.upload');
        });
    })
;

Route::get('/{page}', function (string $page) {
    return view(str_replace('-','.', $page));
});
