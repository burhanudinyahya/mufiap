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

Route::get('/', 'HomeController@index')->name('home.index');

Route::prefix('/movies')->group(function () {
    Route::get('/', 'MoviesController@index')->name('movies.index');
    Route::get('/popular', 'MoviesController@popular')->name('movies.popular');
    Route::get('/now-paying', 'MoviesController@nowPlaying')->name('movies.now_playing');
    Route::get('/upcoming', 'MoviesController@upcoming')->name('movies.upcoming');
    Route::get('/top-rated', 'MoviesController@topRated')->name('movies.top_rated');
    Route::get('/{movie}', 'MoviesController@show')->name('movies.show');

});
