<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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
    return view('index');
})->name('anasayfa')->middleware('isLogged');
Route::get('profil/','App\Http\Controllers\ProfilController@profile')->name('profil')->middleware('isLogged');
Route::get('page2','App\Http\Controllers\Backend\Page2@hello');

//kitap yazar isimlerini çektiğimiz kontroller
Route::post('filterBook/','App\Http\Controllers\ProfilController@filter')->name('filterbook');

Route::post('bookStatusRead/','App\Http\Controllers\ProfilController@bookStatusRead')->name('bookStatusRead');

Route::post('bookStatusReading/','App\Http\Controllers\ProfilController@bookStatusReading')->name('bookStatusReading');

Route::post('bookStatusToBeRead/','App\Http\Controllers\ProfilController@bookStatusToBeRead')->name('bookStatusToBeRead');

Route::post('getProduct/','App\Http\Controllers\ProfilController@getProduct')->name('getProduct');

Route::post('staticsMounth','App\Http\Controllers\ProfilController@staticsMounth')->name('staticsMounth');

Route::post('staticsYear','App\Http\Controllers\ProfilController@staticsYear')->name('staticsYear');

Route::post('staticsPageYear','App\Http\Controllers\ProfilController@staticsPageYear')->name('staticsPageYear');

Route::post('staticsPageMounth','App\Http\Controllers\ProfilController@staticsPageMounth')->name('staticsPageMounth');

Route::post('updateReading','App\Http\Controllers\ProfilController@updateReading')->name('updateReading');

Route::post('updateToBeRead','App\Http\Controllers\ProfilController@updateToBeRead')->name('updateToBeRead');

Route::get('/kayitol', function () {
    return view('kayit');
})->name('kayitol')->middleware('AlreadyLoggedIn');
Route::post('registerControl','App\Http\Controllers\RegisterController@register')->name('registerControl');

Route::post('login','App\Http\Controllers\RegisterController@login')->name('loginControl');

Route::get('logout','App\Http\Controllers\RegisterController@logout')->name('logout');

Route::get('aktivasyon/{code?}','App\Http\Controllers\RegisterController@activasion')->name('aktivasyon');

Route::post('resim','App\Http\Controllers\ProfilSettingsController@imageUpdate')->name('resimUpdate');

Route::post('userSearch','App\Http\Controllers\UserSearchController@search')->name('userSearch');
//github çalışıyormu
//ahmet github çalışıyormu 