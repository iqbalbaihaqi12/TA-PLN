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
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/postlogin','LoginController@postlogin')->name('postlogin');
Route::get('/logout','LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth','ceklevel:admin']],function(){
    Route::get('/admin','AdminController@index');
    //JADWAL
    Route::get('/admin/jadwal','JadwalController@index');
    Route::get('/admin/create-jadwal','JadwalController@create');
    Route::post('/admin/simpan-jadwal','JadwalController@store')->name('simpan-jadwal');
    Route::get('/admin/edit-jadwal/{id}','JadwalController@edit')->name('edit-jadwal');
    Route::post('/admin/update-jadwal/{id}','JadwalController@update')->name('update-jadwal');
    Route::get('/admin/hapus-jadwal/{id}','JadwalController@destroy')->name('hapus-jadwal');
    //Data-Petugas
    Route::get('/admin/datapetugas','DatapetugasController@index');
    Route::get('/admin/create-datapetugas','DatapetugasController@create');
    Route::post('/admin/simpan-datapetugas','DatapetugasController@store')->name('simpan-datapetugas');
    Route::get('/admin/hapus-datapetugas/{id}','DatapetugasController@destroy')->name('hapus-datapetugas');
});

Route::group(['middleware' => ['auth','ceklevel:petugas']],function(){
    Route::get('/petugas','PetugasController@index');
    //HasilTemuan
    Route::get('/petugas/hasiltemuan','HasilTemuanController@index');
    Route::get('/petugas/create-hasiltemuan','HasilTemuanController@create');
    Route::post('/petugas/simpan-hasiltemuan','HasilTemuanController@store')->name('simpan-hasiltemuan');
    Route::get('/petugas/edit-hasiltemuan/{id}','HasilTemuanController@edit')->name('edit-hasiltemuan');
    Route::post('/petugas/update-hasiltemuan/{id}','HasilTemuanController@update')->name('update-hasiltemuan');

    //Sosialisasi
    Route::get('/petugas/sosialisasi','SosialisasiController@index');
    Route::get('/petugas/create-sosialisasi','SosialisasiController@create');
    Route::post('/petugas/simpan-sosialisasi','SosialisasiController@store')->name('simpan-sosialisasi');

    //Upaya
    Route::get('petugas/upaya','UpayaController@index');
    Route::get('petugas/create-upaya','UpayaController@create');
    Route::post('/petugas/simpan-upaya','UpayaController@store')->name('simpan-upaya');


});

Route::group(['middleware' => ['auth','ceklevel:pimpinan']],function(){
    Route::get('/pimpinan','PimpinanController@index');
});
