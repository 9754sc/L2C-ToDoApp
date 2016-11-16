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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'TodoController@index');
Route::post('/', 'TodoController@store');

Route::get('edit/{id}', 'TodoController@edit')
    ->name('id');
Route::post('edit/{id}', 'TodoController@update')
    ->name('id');

Route::get('remove/{id}', 'TodoController@destroy')
    ->name('id');

Route::get('404', function () {
    return view('errors/404');
});

