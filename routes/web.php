<?php

Route::post('/editReviewAJAX/{id}', 'ReviewsController@updateAJAX'); //AJAX
Route::get('/reviewAJAX/{id}', 'ReviewsController@reviewAJAX'); //AJAX
Route::post('/deleteReview/{id}', 'ReviewsController@deleteAJAX'); //AJAX

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
//    Route::group(['middleware' => 'auth'], function () {
        Route::get('create', 'FilmsController@create');
        Route::post('', 'FilmsController@store')->name('film.edit');
        Route::get('edit/{film}', 'FilmsController@edit');
        Route::patch('{film}', 'FilmsController@update');
        Route::delete('{film}', 'FilmsController@destroy');
//    });
    Route::get('show/{film}', 'FilmsController@show');
});
//Ruta AJAX paginacion de palículas
Route::get('/givemefilms/', 'PagesController@giveMeFilms'); //AJAX


// Rutas usuario
Route::get('/users/show/{username}', 'UsersController@show');
Route::group([
        'prefix' => 'profile',
//        'middleware' => 'auth'
    ], function () {
    Route::get("", "UsersController@profile");
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
    Route::get('film/show/{film}','ContributesController@showFilmContributes');
    Route::get('show/{slug}', 'ContributesController@show');
    Route::get('autocomplete', 'ContributesController@autocompleteAJAX'); //AJAX
});

//Rutas reviews
Route::group(['prefix' => 'reviews'], function () {
    Route::get("", 'ReviewsController@index');
    Route::get('{review}/', 'ReviewsController@show');
    Route::get('user/{username}/', 'ReviewsController@showUserReviews');
    Route::get('film/{film}/', 'ReviewsController@showFilmReviews');
//    Route::group(['middleware' => 'auth'], function () {
        Route::get("create/{film}", 'ReviewsController@create')->name('reviews.create');
        Route::post("", 'ReviewsController@store');
        Route::patch('{review}','ReviewsController@update');
        Route::get("{review}/edit", 'ReviewsController@edit')->name('reviews.edit');
//    });
});
//Ruta de edicion AJAX
//Ruta AJAX paginacion de reviews
Route::get('/givemereviews/', 'ReviewsController@giveMeReviews'); //AJAX


//Ruta AJAX para gráfica de visitas de una película
Route::get('/views/film/', 'ViewsController@getFilmViews'); //AJAX

// Ruta AJAX validación registro de usuario
Route::post('/register/validate', 'Auth\RegisterController@validateAJAX')->middleware('guest'); //AJAX

Route::group([
    'prefix' => 'users-see',
//    'middleware' => 'auth'
], function (){
    Route::post('{film}', 'UsersController@userSee');
    Route::delete('{film}', 'UsersController@userNotSee');
});


Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');
