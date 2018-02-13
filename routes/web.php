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

// Rutas usuario
Route::get('/users/{username}', 'UsersController@show');
Route::get('/profile','UsersController@profile')->middleware("auth");

//Ruta AJAX paginacion de palículas
Route::get('/givemefilms/','PagesController@giveMeFilms'); //AJAX

//Rutas reviews
Route::get('/reviews/show/{username}/','ReviewsController@showUserReviews');
Route::get('/reviews/show/film/{film}/','ReviewsController@showFilmReviews');

//Ruta AJAX para gráfica de visitas de una película
Route::get('/views/film/', 'ViewsController@getFilmViews');

// Ruta AJAX validación registro de usuario
Route::post('/register/validate','Auth\RegisterController@validateAJAX')->middleware('guest');
Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');
