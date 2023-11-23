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

Route::get('/dashboard',  'PageUserController@userDashboard')->name('userDashboard');

// Route::get('/dashboard', function () {
//     return view('users.dashboard');
// })->name('dashboard');

Route::get('/order', function () {
    return view('users.order');
})->name('order');

Route::get('/mempelai', function () {
    return view('users.mempelai');
})->name('mempelai');

Route::get('/cerita', function () {
    return view('users.cerita');
})->name('cerita');

Route::get('/acara', function () {
    return view('users.acara');
})->name('acara');
