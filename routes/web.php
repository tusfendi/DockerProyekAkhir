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


Route::resource('/', 'PresensiController');
Route::get('/presensi-pegawai', 'PresensiController@pegawai')->name('presensi-pegawai');
Route::get('/presensi-pekerjaan', 'PresensiController@pekerjaan')->name('presensi-pekerjaan');

Auth::routes();
Route::get('/home', 'Front\HomeController@index')->name('home');

Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
})->name("register");

Route::group(['middleware'=>['auth','checkRole:admin,manajer,hrd']],function(){
    Route::resource('home', 'HomeController');
    Route::get('/cari', 'HomeController@cari')->name('cari');

    // Ajax
    Route::get('pekerjaan/{id_pekerjaan}/meta', 'PekerjaanController@getMeta');
    Route::get('proyek-total', 'ProyekController@total')->name('proyek-total');
    Route::any('pegawai-terlambat', 'RiwayatPresensiController@terlambat')->name('pegawai-terlambat');
    Route::get('akumulasi-presensi', 'RiwayatPresensiController@akumulasi')->name('akumulasi-presensi');

});

Route::group(['middleware'=>['auth','checkRole:admin,manajer']],function(){
    Route::resource('jabatan', 'JabatanController');
    Route::resource('jam-kerja', 'JamKerjaController');
    Route::resource('kelompok_pegawai', 'KelompokPegawaiController');
    Route::resource('pegawai', 'PegawaiController');
    Route::resource('pekerjaan', 'PekerjaanController');
    Route::resource('pekerjaan-meta', 'PekerjaanMetaController');
    Route::resource('proyek', 'ProyekController');
    Route::resource('presensi-proyek', 'PresensiProyekController');
    Route::any('presensi-proyek/laporan', 'PresensiProyekController@laporan');
    Route::resource('riwayat-pekerjaan', 'RiwayatPekerjaanController');

    // Ajax
    Route::any('laporan-harian', 'PresensiProyekController@laporan')->name('laporan-harian');
    Route::any('pegawai-absen', 'RiwayatPresensiController@absen')->name('pegawai-absen');
    Route::get('riwayat-pegawai', 'HomeController@pegawai')->name('riwayat-pegawai');
    Route::any('pegawai-cari', 'PegawaiController@cari');
    Route::get('pekerjaan/{id_proyek}/metaKerja', 'PekerjaanController@getMetaKerja');
    Route::get('pekerjaan/{id_proyek}/{id_pekerjaan}/metaPresen', 'PekerjaanController@getMetaPresen');

});



