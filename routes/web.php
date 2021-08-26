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
    return redirect('/index');
});


Route::get('layouts/layout', 'AdminController@layout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'IndexController@index');
Route::get('/tentang', 'TentangController@tentang');
Route::get('/lokasi', 'TentangController@index');
Route::get('/visi', 'TentangController@visi');

Route::group(['middleware' => 'auth'], function () {

    // Masyarakat
    Route::get('/profile', 'ProfileController@profile');
    Route::get('/pengajuan', 'PengajuanController@index');
    Route::get('/pengajuan_lihat/{kode}', 'PengajuanController@lihat');
    Route::get('/pengajuan_edit/{kode}', 'PengajuanController@edit');
    Route::post('/pengajuan_update', 'PengajuanController@update');
    Route::post('/pengajuan_updatefoto', 'PengajuanController@updatefoto');
    Route::get('/pengajuan_hapus/{kode}', 'PengajuanController@hapus');
    Route::get('/pengajuan_print/{kode}', 'PengajuanController@print');

    Route::get('/laporan_pengajuan', 'PengaduanController@pengajuan');
    Route::post('/cetak_laporan_pengajuan', 'PengaduanController@cetak_laporan_pengajuan');

    Route::get('/laporan_aspirasi', 'PengaduanController@aspirasi');
    Route::post('/cetak_laporan_aspirasi', 'PengaduanController@cetak_laporan_aspirasi');


    Route::get('/aspirasi', 'AspirasiController@index');
    Route::get('/aspirasi_lihat/{kode}', 'AspirasiController@lihat');
    Route::get('/aspirasi_edit/{kode}', 'AspirasiController@edit');
    Route::post('/aspirasi_update', 'AspirasiController@update');
    Route::get('/aspirasi_hapus/{kode}', 'AspirasiController@hapus');



    Route::get('/lapor', 'LaporController@lapor');
    Route::post('/lapor_store', 'LaporController@store');
    Route::post('/lapor_edit_store', 'LaporController@lapor_edit_store');

    Route::get('/data_laporan', 'LaporController@data_laporan');
    Route::get('/data_laporan_edit/{kode}', 'LaporController@edit');
    Route::get('/data_laporan_lihat/{kode}', 'LaporController@lihat');
    Route::get('/data_laporan_hapus/{kode}', 'LaporController@hapus');
    Route::get('/data_laporan_print/{kode}', 'LaporController@print');
    Route::get('/profil', 'ProfilController@profil');
    Route::post('/profil_foto_ubah', 'ProfilController@profil_foto_ubah');
    Route::get('/profil_foto_hapus/{id}', 'ProfilController@profil_foto_hapus');
    Route::post('/profil_ubah_data', 'ProfilController@profil_ubah_data');

    Route::post('/ubah_password', 'ProfilController@ubah_password');

    Route::get('/register', 'LaporController@data_laporan');



    // Admin
    Route::get('/admin', 'AdminController@index');
    Route::get('/dashboard_petugas', 'DashboardPetugasController@index');



    // petugas
    Route::get('/petugas', 'PetugasController@index');
    Route::get('/petugas_lihat/{id}', 'PetugasController@lihat');
    Route::get('/petugas_edit/{id}', 'PetugasController@edit');
    Route::post('/petugas_update', 'PetugasController@update');
    Route::post('/petugas_store', 'PetugasController@store');
    Route::get('/petugas_hapus/{id}', 'PetugasController@hapus');


    // masyarakat
    Route::get('/masyarakat', 'PenggunaController@index');
    Route::get('/masyarakat_lihat/{id}', 'PenggunaController@lihat');
    Route::get('/masyarakat_edit/{id}', 'PenggunaController@edit');
    Route::post('/masyarakat_update', 'PenggunaController@update');
    Route::post('/masyarakat_store', 'PenggunaController@store');
    Route::get('/masyarakat_hapus/{id}', 'PenggunaController@hapus');

    Route::get('/masyarakat', 'PenggunaController@index');

    Route::post('/settings_update', 'SettingsController@update');

    Route::get('change-password', 'ChangePasswordController@index');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
    Route::get('/notifikasi', 'NotifikasiController@index');
    Route::post('/komentar/store', 'KomentarController@store');
});


Route::get('/daftar', 'DaftarController@index');
Route::post('/daftar_post', 'DaftarController@store');
Route::resource('ajax-crud', 'AjaxCrudController');

Route::post('ajax-crud/update', 'AjaxCrudController@update')->name('ajax-crud.update');

Route::get('ajax-crud/destroy/{id}', 'AjaxCrudController@destroy');


// Akhir Dashboard Admin

Route::get('/relasi_pengguna', 'RelasiController@pengguna');
Route::get('/relasi_telepon', 'RelasiController@telepon');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/admin', 'IndexController@login');
