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

Route::prefix('admins')->group(function(){
    Route::get('/dashboards', 'admins\DashboardsController@index')->middleware('auth')->name('admin.dashboards');

    Route::get('/categories', 'admins\CategoriesController@index')->middleware('auth')->name('admin.categories');
    Route::get('/categories/create', 'admins\CategoriesController@create')->middleware('auth');
    Route::post('/categories', 'admins\CategoriesController@store')->middleware('auth');
    Route::get('/categories/{id}', 'admins\CategoriesController@show')->middleware('auth');
    Route::get('/categories/{id}/edit', 'admins\CategoriesController@edit')->middleware('auth');
    Route::put('/categories/{id}', 'admins\CategoriesController@update')->middleware('auth');
    Route::delete('/categories/{id}', 'admins\CategoriesController@destroy');

    Route::get('/products', 'admins\ProductsController@index')->middleware('auth')->name('admin.products');
    Route::get('/products/create', 'admins\ProductsController@create')->middleware('auth');
    Route::post('/products', 'admins\ProductsController@store')->middleware('auth');
    Route::get('/products/{id}', 'admins\ProductsController@show');
    Route::get('/products/{id}/edit', 'admins\ProductsController@edit')->middleware('auth');
    Route::put('/products/{id}', 'admins\ProductsController@update')->middleware('auth');
    Route::delete('/products/{id}', 'admins\ProductsController@destroy')->middleware('can:delete, product');

    Route::get('/comments', 'admins\CommentsController@index')->middleware('auth')->name('admin.comments');
    Route::delete('/comments/{id}', 'admins\CommentsController@destroy')->middleware('auth');

    Auth::routes();
});

Route::get('/products/ajax', 'admins\ProductsController@ajax');

Route::get('/', 'FrontendController@getHome');
Route::get('details/{id}/{slug}.html', 'FrontendController@getDetails');
Route::get('category/{id}/{slug}.html', 'FrontendController@getCategory');
Route::post('details/{id}/{slug}.html', 'FrontendController@postComment');
Route::get('search', 'FrontendController@getSearch');

Route::group(['prefix'=>'cart'], function(){
    Route::get('add/{id}', 'CartController@getAddCart');
    Route::get('show', 'CartController@getShowCart');
    Route::post('show', 'CartController@postShowCart');
    Route::get('delete/{id}', 'CartController@getDeleteCart');
    Route::get('update','CartController@getUpdateCart');

});

Route::get('complete','CartController@getComplete');
