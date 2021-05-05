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
})->name('anasayfa');
Route::get('/profil', function () {
    return view('profil');
})->name('profil');
Route::get('page2','App\Http\Controllers\Backend\Page2@hello');

//kitap yazar isimlerini çektiğimiz kontroller
Route::post('filterBook/','App\Http\Controllers\ProfilController@filter')->name('filterbook');

Route::post('bookStatusRead/','App\Http\Controllers\ProfilController@bookStatusRead')->name('bookStatusRead');

Route::post('bookStatusReading/','App\Http\Controllers\ProfilController@bookStatusReading')->name('bookStatusReading');

Route::post('bookStatusToBeRead/','App\Http\Controllers\ProfilController@bookStatusToBeRead')->name('bookStatusToBeRead');

Route::post('getProduct/','App\Http\Controllers\ProfilController@getProduct')->name('getProduct');

//github çalışıyormu
//ahmet github çalışıyormu 