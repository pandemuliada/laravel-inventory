<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'CategoryController')->except(['show']);
Route::resource('items', 'ItemController')->except(['show']);
Route::resource('roles', 'RoleController')->except(['destroy']);
Route::resource('users', 'UserController');

Route::prefix('account')->middleware(['auth'])->group(function () {
    Route::get('/', 'AccountController@show')->name('account');
    Route::get('/edit', 'AccountController@edit')->name('account.edit');
    Route::put('/update', 'AccountController@update')->name('account.update');
    Route::post('/change_avatar', 'AccountController@change_avatar')->name('account.change_avatar');
});
