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

Route::get('users/dashboard',  'PageUserController@userDashboard')->name('userDashboard');

// Route::get('/dashboard', function () {
//     return view('users.dashboard');
// })->name('dashboard');

// Route::get('/mempelai', function () {
//     return view('users.mempelai');
// })->name('mempelai');

// Route::get('/cerita', function () {
//     return view('users.cerita');
// })->name('cerita');

// Route::get('/acara', function () {
//     return view('users.acara');
// })->name('acara');


Route::get('users/order',  'PageUserController@userOrder')->name('userOrder');
Route::get('users/mempelai',  'PageUserController@userMempelai')->name('userMempelai');
Route::get('users/cerita',  'PageUserController@userCerita')->name('userCerita');
Route::get('users/acara',  'PageUserController@userOrder')->name('userAcara');
Route::get('users/listtamu',  'PageUserController@userListTamu')->name('userListTamu');
Route::get('users/galeri',  'PageUserController@userGaleri')->name('userGaleri');
Route::get('users/ucapan',  'PageUserController@userUcapan')->name('userUcapan');


//testing undngan
Route::get('/{domain}',  'UndanganController@index');
Route::get('/{domain}/{tamu}',  'UndanganController@tamu');
