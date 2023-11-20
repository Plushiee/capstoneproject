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

// Admin Start
Route::get('admin/dashboard', 'PageController@adminDashboard')->name('adminDashboard');
// Admin End

// User Start
Route::get('user/dashboard', 'PageUserController@userDashboard')->name('userDashboard');
// User End