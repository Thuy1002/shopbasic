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

 
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getlogout']);
Route::get('/signup', ['as' => 'signup', 'uses' => 'Auth\LoginController@getSignup']);
Route::post('/signup', ['as' => 'signup', 'uses' => 'Auth\LoginController@postSignup']);
