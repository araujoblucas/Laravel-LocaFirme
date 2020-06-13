<?php

use Illuminate\Support\Facades\Route;

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


        // ROTAS DO USUÁRIO
    Route::prefix('user')->group(function () {
        Route::get('/login', 'userController@login')->name('userLogin');
        Route::get('/register', 'userController@register')->name('userRegister');
        Route::post('/register', 'userController@registerPost')->name('userRegisterPost');
        Route::post('/update/{id}', 'userController@userUpdate')->name('userUpdate');
        Route::get('/profile', 'userController@profile')->name('userProfile');
        Route::get('/logout', 'userController@logout')->name('user_logout');
    });


Route::get('/', 'MoviesController@index')->name('home');
Route::get('/moreLikes', 'MoviesController@moreLikesPage')->name('moreLikesPage');
Route::get('/comedyMovies', 'MoviesController@comedyMoviesPage')->name('comedyMoviesPage');
Route::get('/horrorMovies', 'MoviesController@horrorMoviesPage')->name('horrorMoviesPage');
Route::get('/suspenseMovies', 'MoviesController@suspenseMoviesPage')->name('suspenseMoviesPage');
Route::post('/login', 'MoviesController@postLogin')->name('user_login');
//Route::get('/logout', 'MoviesController@logout')->name('user_logout');
Route::get('/addToCar/{id}', 'MoviesController@addToCar')->name('addToCar');
Route::get('/cart', 'MoviesController@listCart')->name('listCart');
Route::get('/removeCart/{id}', 'MoviesController@removeCart')->name('removeOfCart');
Route::get('/forgetCart', 'MoviesController@forgetCart')->name('forgetCart');
Route::get('/buy_cart', 'MoviesController@buy_cart')->middleware('userAuth')->name('buy_cart');
Route::get('/login/like/{id}', 'MoviesController@giveLike')->middleware('userAuth')->name('giveLike');
Route::get('/login/removeLike/{id}', 'MoviesController@removeLike')->middleware('userAuth')->name('removeLike');
Route::get('/admin/login', 'adminController@adminLogin')->name('adminLogin');
Route::post('/admin/login', 'adminController@adminLoginPost')->name('adminLoginPost');
Route::get('/rent/', 'rentController@rent')->name('rent');
Route::get('/returnMovie/{id}', 'rentController@returnMovie')->name('returnMovie');


Route::prefix('admin')->middleware('adminAuth')->group(function () {
    Route::get('/index', 'adminController@indexView')->name('indexMovieView');
    Route::post('/index', 'adminController@index')->name('indexMovie');
    Route::get('/create', 'adminController@createView')->name('createMovieView');
    Route::post('/create', 'adminController@create')->name('createMovie');
    Route::get('/edit/{id}/', 'adminController@updateView')->name('updateMovieView');
    Route::post('/edit/{id}/', 'adminController@update')->name('updateMovie');
    Route::get('/delete/{id}/', 'adminController@delete')->name('deleteMovie');
    Route::get('/listLikes/', 'adminController@listLikes')->name('listLikes');
    Route::get('/listUsers/', 'adminController@listUsers')->name('listUsers');
    Route::get('/editUser/{id}', 'adminController@editUserView')->name('editUserView');
    Route::post('/editUser/{id}', 'adminController@updateUser')->name('updateUser');
    Route::get('/deleteUser/{id}', 'adminController@deleteUser')->name('deleteUser');
});

