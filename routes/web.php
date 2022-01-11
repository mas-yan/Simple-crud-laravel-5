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
Route::get('/addMhs', 'HomeController@create');
Route::post('/addMhs', 'HomeController@store')->name('addMhs');
Route::get('/editMhs/{id}', 'HomeController@edit')->name('editMhs');
Route::get('/deleteMhs/{id}', 'HomeController@destroy')->name('deleteMhs');
Route::put('/updateMhs/{id}', 'HomeController@update')->name('updateMhs');
Route::get('/lihatMhs/{id}', 'HomeController@show')->name('lihatMhs');
Route::middleware(['auth'])->group(function () {
    Route::get('/addprodi', 'ProdiController@create');
    Route::get('/deleteprodi/{id}', 'ProdiController@destroy')->name('deleteProdi');
    Route::get('/editprodi/{id}', 'ProdiController@edit')->name('editProdi');
    Route::post('/addprodi', 'ProdiController@store')->name('addProdi');
    Route::put('/updateprodi/{id}', 'ProdiController@update')->name('updateProdi');
    Route::get('/prodi', 'ProdiController@index')->name('prodi');
});
