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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{varSlug}', 'ProductController@index')->name('product');
Route::get('/catalog/', 'CatalogController@index')->name('catalog');
Route::get('/catalog/{varLink}', 'CatalogController@category')->name('category');

Route::prefix('admin')
    ->name('admin.')
    ->namespace('Admin')
    ->group(function () {

        Route::get('', function () {
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

            Route::get('products', 'ProductController@index')->name('products.index');
            Route::get('products/create', 'ProductController@create')->name('products.create');
            Route::get('products/edit/{intProductID}', 'ProductController@edit')->name('products.edit');

            Route::get('counters', 'CountersController@index')->name('counters.index');

            Route::get('subscribers', 'SubscribersController@index')->name('subscribers.index');

            Route::get('categories/list','Api\\CategoriesController@listOfCategories')->name('categories.list');
            Route::get('categories/find/{intCatID}','Api\\CategoriesController@find')->name('categories.find');
            Route::get('categories/options','Api\\CategoriesController@getForOptions')->name('categories.options');
            Route::post('categories/save-sort','Api\\CategoriesController@saveSort')->name('categories.sort');
            Route::post('categories/store','Api\\CategoriesController@store')->name('categories.store');
            Route::put('categories/update/{intCatID}','Api\\CategoriesController@update')->name('categories.update');
            Route::delete('categories/delete/{intCatID}','Api\\CategoriesController@delete')->name('categories.delete');

            Route::get('homepage-reviews/list','Api\\HomepageReviewsController@listOfReviews')->name('homepage-reviews.list');
            Route::get('homepage-reviews/find/{intReviewID}','Api\\HomepageReviewsController@find')->name('homepage-reviews.find');
            Route::post('homepage-reviews/save-sort','Api\\HomepageReviewsController@saveSort')->name('homepage-reviews.sort');
            Route::post('homepage-reviews/store','Api\\HomepageReviewsController@store')->name('homepage-reviews.store');
            Route::put('homepage-reviews/update/{intReviewID}','Api\\HomepageReviewsController@update')->name('homepage-reviews.update');
            Route::delete('homepage-reviews/delete/{intReviewID}','Api\\HomepageReviewsController@delete')->name('homepage-reviews.delete');

            Route::get('products/list','Api\\ProductsController@listOfProducts')->name('products.list');
            Route::get('products/find/{intProductID}','Api\\ProductsController@find')->name('products.find');
            Route::post('products/store','Api\\ProductsController@store')->name('products.store');
            Route::put('products/update/{intProductID}','Api\\ProductsController@update')->name('products.update');
            Route::delete('products/delete/{intProductID}','Api\\ProductsController@delete')->name('products.delete');

            Route::post('product-reviews/store','Api\\ProductReviewsController@store')->name('product.reviews.store');
            Route::put('product-reviews/update/{intReviewID}','Api\\ProductReviewsController@update')->name('product.reviews.update');
            Route::delete('product-reviews/delete/{intReviewID}','Api\\ProductReviewsController@delete')->name('product.reviews.delete');

            Route::get('counters/list', 'Api\\CountersController@getAll')->name('counters.list');
            Route::post('counters/update/{alias}', 'Api\\CountersController@update')->name('counters.update');

            Route::get('subscribers/list', 'Api\\SubscribersController@getList')->name('subscribers.list');
            Route::delete('subscribers/delete/{intSubscriberID}','Api\\SubscribersController@delete')->name('subscribers.delete');

            Route::post('images/upload','Api\\ImagesController@upload')->name('images.upload');
        });
    })
;

Route::get('/{page}', function (string $page) {
    return view(str_replace('-','.', $page));
});
