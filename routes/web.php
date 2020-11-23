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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/login','LoginController@index')->name('login-page')->middleware('guest');
Route::post('/logout', 'LoginController@logout')->name('logout');

Route::get('/verification/{u_id}/{v_code}','RegisterController@verification')->name('verification-page');

Route::get('/welcome','RegisterController@welcome')->name('welcome');


Route::post('/login','LoginController@login')->name('login');
Route::post('/register','RegisterController@register')->name('register');
Route::post('/verify','RegisterController@verify')->name('verify');



//authentication routes
Route::middleware('auth')->group(function () {
    Route::get('/users','AuthController@viewusers')->name('view-users');
    Route::get('/search','AuthController@search')->name('search-users');
});
