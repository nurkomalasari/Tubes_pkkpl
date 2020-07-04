<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/bendahara', 'Auth\LoginController@showBendaharaLoginForm');
Route::get('/login/sekertaris', 'Auth\LoginController@showSekertarisLoginForm');
Route::get('/login/user', 'Auth\LoginController@showUserLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/bendahara', 'Auth\RegisterController@showBendaharaRegisterForm');
Route::get('/register/sekertaris', 'Auth\RegisterController@showSekertarisRegisterForm');
Route::get('/register/user', 'Auth\RegisterController@showUserRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/bendahara', 'Auth\LoginController@BendaharaLogin');
Route::post('/login/sekertaris', 'Auth\LoginController@SekertarisLogin');
Route::post('/login/user', 'Auth\LoginController@UserLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/bendahara', 'Auth\RegisterController@createBendahara');
Route::post('/register/sekertaris', 'Auth\RegisterController@createSekertaris');
Route::post('/register/user', 'Auth\RegisterController@createUser');


Route::view('/home', 'user1.master')->middleware('auth');
Route::view('/admin', 'admin.master');
Route::view('/bendahara', 'bendahara.master');
Route::view('/sekertaris', 'sekertaris.master');
// Route::view('/user', 'user.master');

Route::get('/bendahara/laporan', 'KeuanganController@index');
Route::get('/bendahara/laporan/export-excel', 'KeuanganController@exportExcel');

//crud pemasukan
Route::get('/pemasukan', 'pemasukanController@index');
Route::get('/pemasukanCreate', 'pemasukanController@create');
Route::post('/pemasukanAdd', 'pemasukanController@store');
Route::get('/pemasukan/edit/{id}', 'pemasukanController@edit');
Route::put('/pemasukan/update/{id}', 'pemasukanController@update');
Route::get('/pemasukan/delete/{id}', 'pemasukanController@destroy');

//crud pengeluaran
Route::get('/pengeluaran', 'PengeluaranController@index');
Route::get('/pengeluaranCreate', 'PengeluaranController@create');
Route::post('/pengeluaranAdd', 'PengeluaranController@store');
Route::get('/pengeluaran/edit/{id}', 'PengeluaranController@edit');
Route::put('/pengeluaran/update/{id}', 'PengeluaranController@update');
Route::get('/pengeluaran/delete/{id}', 'PengeluaranController@destroy');

//crud pengeluaran
Route::get('/pengarsipan', 'ArsipController@index');
Route::get('/pengarsipanCreate', 'ArsipController@create');
Route::post('/pengarsipanAdd', 'ArsipController@store');
Route::get('/pengarsipan/edit/{id}', 'ArsipController@edit');
Route::put('/pengarsipan/update/{id}', 'ArsipController@update');
Route::get('/pengarsipan/delete/{id}', 'ArsipController@destroy');
