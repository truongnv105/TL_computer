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
    Route::get('/dashboards', 'admins\DashboardsController@index');

    Route::get('/categories', 'admins\CategoriesController@index');
    Route::get('/categories/create', 'admins\CategoriesController@create');
    Route::post('/categories', 'admins\CategoriesController@store');
    Route::get('/categories/{id}', 'admins\CategoriesController@show');
    Route::get('/categories/{id}/edit', 'admins\CategoriesController@edit');
    Route::put('/categories/{id}', 'admins\CategoriesController@update');

    Route::get('/products', 'admins\ProductsController@index');
    Route::get('/products/create', 'admins\ProductsController@create');
    Route::post('/products', 'admins\ProductsController@store');
    Route::get('/products/{id}', 'admins\ProductsController@show');
    Route::get('/products/{id}/edit', 'admins\ProductsController@edit');
    Route::put('/products/{id}', 'admins\ProductsController@update');
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
