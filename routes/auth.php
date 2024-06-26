<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('/')->name('auth.')->controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::get('logout', 'logout')->name('logout');
    Route::post('handel', 'handleLogin')->name('handleLogin');
    Route::match(['get', 'post'], 'singup', 'singup')->name('singup');
});
