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
    // return view('welcome');
    return redirect(route('user'));
});
Route::get('user', 'UserController@index')->name('user');
Route::post('user/{id}/delete', 'UserController@destroy')->name('user.delete');
Route::post('user/store', 'UserController@store')->name('user.store');
