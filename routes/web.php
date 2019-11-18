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
// welcome page
Route::get('/', 'AppController@welcome')->name('welcome');
// profile page
Route::get('/about', 'AppController@about')->name('about');
// service page
Route::get('/features', 'AppController@feature')->name('feature');
// program page
Route::get('/programs', 'AppController@program')->name('program');
// autentication
Auth::routes();
// route group with aut middleware
Route::group(['middleware' => ['auth']], function () {
    // home page
    Route::get('/home', 'HomeController@index')->name('home');
});
