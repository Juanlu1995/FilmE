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
Route::get('/films/create', 'FilmsController@create');
Route::post('/films/create', 'FilmsController@store');
Route::get('/films/show/{idFilm}', 'FilmsController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
