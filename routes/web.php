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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Admin routes
Route::name('admin.')->prefix('admin')->namespace('Admin')->group(function () {

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');


});

// another way to define Admin routes
/*Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
});*/


