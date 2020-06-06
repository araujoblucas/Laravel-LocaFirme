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
Route::prefix('admin')->group(function () {
    Route::get('/create', 'adminController@createView')->name('createMovieView');
    Route::post('/create', 'adminController@create')->name('createMovie');
    Route::get('/index', 'adminController@indexView')->name('indexMovieView');
    Route::post('/index', 'adminController@index')->name('indexMovie');
    Route::get('/edit/{id}/', 'adminController@updateView')->name('updateMovieView');
    Route::put('/edit/{id}/', 'adminController@update')->name('updateMovie');
});

Route::get('/', function () {
    return view('welcome');
});
