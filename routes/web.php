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

Route::middleware(['guest:users', 'guest:admin'])->group(function () {
    Route::get('login', 'PageController@login')->name('login');
    Route::post('login', 'LoginController@login')->name('loginSave');
    Route::get('register', 'PageController@register')->name('register');
    Route::post('register', 'RegisterController@register')->name('registerSave');
    Route::get('forget', 'PageController@forget')->name('forget');
});

// Users Start
Route::middleware(['auth:users'])->group(function () {
    Route::permanentRedirect('/home', 'users/dashboard');
    Route::get('users/dashboard', 'PageUserController@userDashboard')->name('userDashboard');
    Route::get('users/order', 'PageUserController@userOrder')->name('userOrder');
    Route::get('users/mempelai', 'PageUserController@userMempelai')->name('userMempelai');

    // Cerita Start
    Route::get('users/cerita', 'PageUserController@userCerita')->name('userCerita');
    Route::post('users/cerita/tambah', 'PageUserController@tambahCerita')->name('tambahCerita');
    Route::post('users/cerita/update', 'PageUserController@updateCerita')->name('updateCerita');
    Route::post('users/cerita/hapus', 'PageUserController@hapusCerita')->name('hapusCerita');
    // Cerita End

    // Acara Start
    Route::get('users/acara', 'PageUserController@userAcara')->name('userAcara');
    Route::post('users/acara/tambah', 'PageUserController@tambahAcara')->name('tambahAcara');
    Route::post('users/acara/updateCountdown', 'PageUserController@updateCountdown')->name('updateCountdown');
    Route::post('users/acara/update', 'PageUserController@updateAcara')->name('updateAcara');
    Route::post('users/acara/hapus', 'PageUserController@hapusAcara')->name('hapusAcara');

    // Acara End

    // Tamu Start
    Route::get('users/listtamu', 'PageUserController@userListTamu')->name('userListTamu');
    Route::post('users/listtamu/tambah', 'PageUserController@tambahTamu')->name('tambahTamu');
    Route::post('users/listtamu/importexcel', 'PageUserController@importExcel')->name('importExcel');
    Route::delete('users/listtamu/hapus', 'PageUserController@hapusTamu')->name('hapusTamu');
    // Tamu End

    Route::get('users/galeri', 'PageUserController@userGaleri')->name('userGaleri');
    Route::get('users/ucapan', 'PageUserController@userUcapan')->name('userUcapan');
    Route::post('users/logout', 'LoginController@logout')->name('userLogout');
});
// Users End

//testing undngan
// Route::get('/{domain}', 'UndanganController@index');
Route::get('/{domain}/{tamu?}', 'UndanganController@tamu')->name('domainUndangan');
