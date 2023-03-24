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

Route::get('/', 'App\Http\Controllers\LoginController@index')->name('login.index');
Route::get('/register', 'App\Http\Controllers\RegisterController@index')->name('register.index');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home.index');
