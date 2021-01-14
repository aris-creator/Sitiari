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

// Route::apiResources(['admin' => 'API\AdminController']);

//index
Route::get('admin','API\AdminController@index');

//admin store
Route::post('admin','API\AdminController@store');

//admin update
Route::put('admin{id}','API\AdminController@update');

//admin destroy
Route::delete('admin{id}','API\AdminController@destroy');

//admin search
Route::get('admin/findAdmin','API\AdminController@findAdmin');

//admin show pekerja 
Route::get('admin/showPekerja','API\AdminController@showPekerja');

//admin add pekerja
Route::post('admin/addPekerja','API\AdminController@addPekerja');

//admin edit pekerja
Route::put('admin/editPekerja/{id}','API\AdminController@editPekerja');

//admin hapus pekerja
Route::delete('admin/hapusPekerja/{id}','API\AdminController@hapusPekerja');

//admin pekerja search
Route::get('admin/findPekerja','API\AdminController@findPekerja');

//admin show majikan 
Route::get('admin/showMajikan','API\AdminController@showMajikan');

//admin add majikan
Route::post('admin/addMajikan','API\AdminController@addMajikan');

//admin edit majikan
Route::put('admin/editMajikan/{id}','API\AdminController@editMajikan');

//admin hapus majikan
Route::delete('admin/hapusMajikan/{id}','API\AdminController@hapusMajikan');

//admin majikan search
Route::get('admin/findMajikan','API\AdminController@findMajikan');

//admin get jumlah pekerja 
Route::get('admin/getJumlahPekerja','API\AdminController@getJumlahPekerja');

//admin get jumlah pendaftar
Route::get('admin/getJumlahPendaftar','API\AdminController@getJumlahPendaftar');

//admin get jumlah majikan 
Route::get('admin/getJumlahMajikan','API\AdminController@getJumlahMajikan');

//admin show pendaftar
Route::get('admin/showPendaftar','API\AdminController@showPendaftar');

//admin search pendaftar
Route::get('admin/findPendaftar','API\AdminController@findPendaftar');

//admin konfirmasi pendaftar
Route::put('admin/konfirmasiPendaftar/{id}','API\AdminController@konfirmasiPendaftar');

//majikan show pembantu 
Route::get('majikan/showPembantu','API\MajikanController@showPembantu');

//majikan show babysitter
Route::get('majikan/showBabysitter','API\MajikanController@showBabysitter');

//majikan show perawat 
Route::get('majikan/showPerawat','API\MajikanController@showPerawat');