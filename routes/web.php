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

Route::get('/majikan/login', 'Auth\MajikanLoginController@showLoginForm')->name('majikan.login');
Route::post('/majikan/login', 'Auth\MajikanLoginController@login')->name('majikan.login.submit');
Route::get('/majikan/register', 'Auth\MajikanRegisterController@showRegistrationForm')->name('majikan.register');
Route::post('/majikan/register', 'Auth\MajikanRegisterController@register')->name('majikan.register.submit');
Route::get('/majikan', 'MajikanController@index')->name('majikan.dashboard');

Route::get('/pekerja/login', 'Auth\PekerjaLoginController@showLoginForm')->name('pekerja.login');
Route::get('/pekerja/register', 'Auth\PekerjaRegisterController@showRegistrationForm')->name('pekerja.register');
Route::post('/pekerja/login', 'Auth\PekerjaLoginController@login')->name('pekerja.login.submit');
Route::post('/pekerja/register', 'Auth\PekerjaRegisterController@register')->name('pekerja.register.submit');
Route::get('/pekerja', 'PekerjaController@index')->name('pekerja.dashboard');
Route::get('{path}', 'HomeController@index')->where( 'path' , '([A-z\d\-\/_.]+)?' );



