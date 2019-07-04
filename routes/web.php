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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');


// ROUTES FOR LINKS APPLICATION
Route::get('/link', 'LinkController@index');
Route::post('/link', 'LinkController@store');
Route::put('/link/{id}/mark', 'LinkController@mark');
Route::delete('/link/{id}', 'LinkController@destroy');

// ROUTES FOR TAGS
Route::get('/tags', 'TagController@index');
Route::post('/tags', 'TagController@store');