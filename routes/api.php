<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('details', 'API\UserController@details');
});

Route::get('keuangan/mahasiswa','API\MahasiswaController@index');
Route::get('keuangan/mahasiswa/{cari}','API\MahasiswaController@mahasiswaSearch');
Route::get('keuangan/mahasiswaKategori/{cari}','API\MahasiswaController@mahasiswaKategori');
Route::get('keuangan/mahasiswa/biayaDaftarUlang/{nim}','API\MahasiswaController@biayaDaftarUlang');
Route::get('keuangan/mahasiswa/biayaOspek/{nim}','API\MahasiswaController@biayaOspek');
Route::get('keuangan/mahasiswa/biayaPembangunan/{nim}','API\MahasiswaController@biayaPembangunan');
Route::get('keuangan/mahasiswa/biayaSpp/{nim}','API\MahasiswaController@biayaSpp');
Route::get('keuangan/mahasiswa/profil/{nim}','API\MahasiswaController@mahasiswaProfil');
Route::get('keuangan/mahasiswa/sppTerakhir/{nim}','API\MahasiswaController@pembayaranSppTerakhir');
Route::get('keuangan/mahasiswa/pembangunanTerakhir/{nim}','API\MahasiswaController@pembayaranPembangunanTerakhir');
Route::get('keuangan/mahasiswa/ospekTerakhir/{nim}','API\MahasiswaController@pembayaranOspekTerakhir');
Route::get('keuangan/mahasiswa/daftarUlangTerakhir/{nim}','API\MahasiswaController@pembayaranDaftarUlangTerakhir');
Route::post('keuangan/mahasiswa/pembayaranSpp/{nim}','API\MahasiswaController@pembayaranSpp');
Route::post('keuangan/mahasiswa/pembayaranPembangunan/{nim}','API\MahasiswaController@pembayaranPembangunan');
Route::post('keuangan/mahasiswa/pembayaranOspek/{nim}','API\MahasiswaController@pembayaranOspek');
Route::post('keuangan/mahasiswa/pembayaranDaftarUlang/{nim}','API\MahasiswaController@pembayaranDaftarUlang');

Route::get('keuangan/aturan','API\PembayaranController@aturanPembayaran');
Route::get('keuangan/aturan/{keterangan}','API\PembayaranController@aturanPembayaranKategori');
Route::post('keuangan/aturan','API\PembayaranController@aturanBaru');