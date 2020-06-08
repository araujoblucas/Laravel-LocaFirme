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

Route::get('/index', 'MoviesController@index')->name('home');
Route::post('/login', 'MoviesController@postLogin')->name('user_login');
Route::get('/logout', 'MoviesController@logout')->name('user_logout');
Route::get('/addToCar/{id}', 'MoviesController@addToCar')->name('addToCar');
Route::get('/cart', 'MoviesController@listCart')->name('listCart');
Route::get('/removeCart/{id}', 'MoviesController@removeCart')->name('removeOfCart');
Route::prefix('admin')->group(function () {
    Route::get('/create', 'adminController@createView')->name('createMovieView');
    Route::post('/create', 'adminController@create')->name('createMovie');
    Route::get('/index', 'adminController@indexView')->name('indexMovieView');
    Route::post('/index', 'adminController@index')->name('indexMovie');
    Route::get('/edit/{id}/', 'adminController@updateView')->name('updateMovieView');
    Route::put('/edit/{id}/', 'adminController@update')->name('updateMovie');
});
