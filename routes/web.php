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

Route::get('/', 'LandingPageController@index')->name('landingPage');

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
    Route::post('forget', 'PasswordResetsController@submitForgetPasswordForm')->name('forget-post');
    Route::get('reset-password/{token}', 'PasswordResetsController@showResetPasswordForm')->name('reset');
    Route::post('reset-password', 'PasswordResetsController@submitResetPasswordForm')->name('reset-post');
});

// Users Start
Route::middleware(['auth:users'])->group(function () {
    Route::permanentRedirect('/home', 'users/dashboard');
    Route::get('users/dashboard', 'PageUserController@userDashboard')->name('userDashboard');
    Route::get('users/order', 'PageUserController@userOrder')->name('userOrder');
    Route::post('/newOrder', 'LandingPageController@newOrder')->name('newOrder');

    // Mempelai Start
    Route::get('users/mempelai', 'PageUserController@userMempelai')->name('userMempelai');
    Route::post('users/uploadmempelai', 'PageUserController@uploadFotoMempelai')->name('uploadFotoMempelai');
    Route::post('users/mempelai/update', 'PageUserController@updateMempelai')->name('updateMempelai');
    // Mempelai End

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
    Route::get('users/getlisttamu', 'PageUserController@getListTamu')->name('getListTamu');
    Route::post('users/listtamu/tambah', 'PageUserController@tambahTamu')->name('tambahTamu');
    Route::post('users/listtamu/importexcel', 'PageUserController@importExcel')->name('importExcel');
    Route::post('users/listtamu/updatekirim', 'PageUserController@updateKirim')->name('updateKirim');
    Route::delete('users/listtamu/hapus', 'PageUserController@hapusTamu')->name('hapusTamu');
    // Tamu End

    Route::get('users/galeri', 'PageUserController@userGaleri')->name('userGaleri');
    Route::post('users/uploadgaleri', 'PageUserController@uploadGaleri')->name('uploadGaleri');
    Route::post('users/hapusgaleri', 'PageUserController@hapusGaleri')->name('hapusGaleri');
    Route::get('users/getgaleri', 'PageUserController@getGaleri')->name('getGaleri');

    Route::get('users/ucapan', 'PageUserController@userUcapan')->name('userUcapan');
    Route::get('users/getucapan', 'PageUserController@getUcapan')->name('getUcapan');
    Route::get('users/logout', 'LoginController@logout')->name('userLogout');
});
// Users End

// Admin Starts
Route::middleware(['auth:admin'])->group(function () {
    Route::permanentRedirect('/home', 'admin/dashboard');
    Route::get('admin/dashboard', 'PageUserController@adminDashboard')->name('adminDashboard');
    Route::get('admin/pesanan', 'PageUserController@adminPesanan')->name('adminPesanan');
    Route::post('admin/pesanan/lunas', 'PageUserController@lunas')->name('adminPesananLunas');
    Route::get('admin/logout', 'LoginController@logout')->name('adminLogout');
});
// Admin End

//testing undngan
// Route::get('/{domain}', 'UndanganController@index');
Route::post('/check-domain', 'LandingPageController@checkDomain')->name('checkDomain');
Route::get('/{domain}/{tamu?}', 'UndanganController@tamu')->name('domainUndangan');
Route::patch('/kehadiran', 'UndanganController@updateKehadiran')->name('updateKehadiran');

Route::post('/savesalam', 'UndanganController@saveSalam')->name('saveSalam');
Route::post('/likesalam', 'UndanganController@likeSalam')->name('likeSalam');
