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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('keuangan/pembayaran', function () {
    return view('keuangan/pembayaran/index');
});
Route::get('keuangan/aturanPembayaran', function () {
    return view('keuangan/aturanPembayaran/index');
});

Route::get('buktiPembayaranPdf/{kategori}/{id}','PdfController@pdfview');