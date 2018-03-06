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
    Route::group([ 'middleware' => 'auth'], function (){
        Route::get('create', 'FilmsController@create')->middleware("auth");
        Route::post('create', 'FilmsController@store')->middleware("auth");
    });
    Route::get('show/{film}', 'FilmsController@show');
});
//Ruta AJAX paginacion de palículas
Route::get('/givemefilms/', 'PagesController@giveMeFilms'); //AJAX


// Rutas usuario
Route::get('/users/show/{username}', 'UsersController@show');
Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function (){
    Route::get("","UsersController@profile");
    Route::get('edit', 'UsersController@edit')->name('profile.data');
    Route::get('edit/data', 'UsersController@edit')->name('profile.data');
    Route::get('edit/password', 'UsersController@edit')->name('profile.password');
    Route::get('edit/about', 'UsersController@edit')->name('profile.about');
    Route::patch('', 'UsersController@update');
    Route::delete('', 'UsersController@destroy');
});

//Ruta contributes
Route::group(['prefix' => 'contributes'], function () {
    Route::get('', 'ContributesController@index');
    Route::get('show/{slug}', 'ContributesController@show');
    Route::get('autocomplete', 'ContributesController@autocompleteAJAX'); //AJAX
});

//Rutas reviews
Route::group(['prefix' => 'reviews'], function () {
    Route::get("", 'ReviewsController@index');
    Route::get("create/{film}", 'ReviewsController@create');
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
