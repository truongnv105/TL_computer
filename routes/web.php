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
    return view('welcome');
});

Route::prefix('admins')->group(function(){
    Route::get('/dashboards', 'admins\DashboardsController@index');

    Route::get('/categories', 'admins\CategoriesController@index');
    Route::get('/categories/create', 'admins\CategoriesController@create');
    Route::post('/categories', 'admins\CategoriesController@store');
    Route::get('/categories/{id}', 'admins\CategoriesController@show');
    Route::get('/categories/{id}/edit', 'admins\CategoriesController@edit');
    Route::put('/categories/{id}', 'admins\CategoriesController@update');
});
