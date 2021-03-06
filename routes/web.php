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

Auth::routes();

Route::get('/', 'loginController@create');
Route::post('/', 'loginController@store');

Route::get('/logout', 'loginController@destroy');

Route::get('/home', 'HomeController@create');
Route::get('/home/user', 'HomeController@getUser');

Route::get('/kentekens', 'KentekensController@index');
Route::get('/kentekens', 'KentekenController@index');