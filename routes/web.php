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

Route::get('/', 'PagesController@index');

// Rutas de películas
Route::get('/films/create', 'FilmsController@create')->middleware("auth");
Route::post('/films/create', 'FilmsController@store')->middleware("auth");
Route::get('/films/show/{film}', 'FilmsController@show');

Route::get('/users/{user}', 'UsersController@show');
Route::get('/profile','UsersController@profile')->middleware("auth");


Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');
