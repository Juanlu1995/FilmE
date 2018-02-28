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
Route::group(['prefix' => 'films'], function () {
    Route::get('create', 'FilmsController@create')->middleware("auth");
    Route::post('create', 'FilmsController@store')->middleware("auth");
    Route::get('show/{film}', 'FilmsController@show');
});
//Ruta AJAX paginacion de palículas
Route::get('/givemefilms/', 'PagesController@giveMeFilms'); //AJAX


// Rutas usuario
Route::get('/users/{username}', 'UsersController@show');
Route::get('/profile', 'UsersController@profile')->middleware("auth");

//Ruta contributes
Route::group(['prefix' => 'contributes'], function () {
    Route::get('', 'ContributesController@index');
    Route::get('show/{slug}', 'ContributesController@show');
    Route::get('autocomplete','ContributesController@autocompleteAJAX'); //AJAX
});

//Rutas reviews
Route::group(['prefix' => 'reviews'], function () {
    Route::get("", 'ReviewsController@index');
    Route::get('show/{review}/', 'ReviewsController@show');
    Route::get('show/user/{username}/', 'ReviewsController@showUserReviews');
    Route::get('show/film/{film}/', 'ReviewsController@showFilmReviews');
});
//Ruta AJAX paginacion de reviews
Route::get('/givemereviews/', 'ReviewsController@giveMeReviews'); //AJAX


//Ruta AJAX para gráfica de visitas de una película
Route::get('/views/film/', 'ViewsController@getFilmViews'); //AJAX

// Ruta AJAX validación registro de usuario
Route::post('/register/validate', 'Auth\RegisterController@validateAJAX')->middleware('guest'); //AJAX

Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');
