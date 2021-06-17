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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('pengguna')->group(function () {

    Route::get('/senarai',['as'=>'/senarai/pengguna','uses'=>'Penggunacontroller@index']);
    Route::get('/tambah',['as'=>'/tambah/pengguna','uses'=>'Penggunacontroller@add']);
    Route::post('/store',['as'=>'/tambah/pengguna','uses'=>'Penggunacontroller@store']);
    Route::get('/show/{id}',['as'=>'/maklumat','uses'=>'Penggunacontroller@show']);
    Route::get('/edit/{id}',['as'=>'/maklumat','uses'=>'Penggunacontroller@edit']);
    Route::post('edit/update/{id}',['as'=>'/kemaskini','uses'=>'Penggunacontroller@update']);
    Route::get('/padam/{id}',['as'=>'/maklumat','uses'=>'Penggunacontroller@destroy']);
    Route::get('/search',['as'=>'/search/pengguna','uses'=>'Penggunacontroller@search']);
    Route::get('/senaraipadam',['as'=>'/senaraipadam/pengguna','uses'=>'Penggunacontroller@indexdelete']);
    Route::get('/restore/{id}',['as'=>'/maklumat','uses'=>'Penggunacontroller@restore']);
    Route::get('/delete/{id}',['as'=>'/maklumat','uses'=>'Penggunacontroller@permenantdelete']);

});

Route::prefix('/failkes')->group(function () {

    Route::get('/senarai',['as'=>'/senarai/failkes','uses'=>'Failkescontroller@index']);
    Route::get('/tambah',['as'=>'/tambah/failkes','uses'=>'Failkescontroller@add']);
    Route::post('/store',['as'=>'/tambah/failkes','uses'=>'Failkescontroller@store']);
    Route::get('/show/{id}',['as'=>'/maklumat','uses'=>'Failkescontroller@show']);
    Route::post('show/setbookmark', 'Bookmarkcontroller@setbookmark');
    Route::post('show/setremovebookmark', 'Bookmarkcontroller@removebookmark');
    Route::get('/edit/{id}',['as'=>'/maklumat','uses'=>'Failkescontroller@edit']);
    Route::post('edit/update/{id}',['as'=>'/kemaskini','uses'=>'Failkescontroller@update']);
    Route::get('/padam/{id}',['as'=>'/maklumat','uses'=>'Failkescontroller@destroy']);
    Route::get('/senaraipadam',['as'=>'/senaraipadam/failkes','uses'=>'Failkescontroller@indexdelete']);
    Route::get('/restore/{id}',['as'=>'/maklumat','uses'=>'Failkescontroller@restore']);
    Route::get('/delete/{id}',['as'=>'/maklumat','uses'=>'Failkescontroller@permenantdelete']);
    Route::get('/search',['as'=>'/tambah/failkes','uses'=>'Failkescontroller@search']);
    
});

Route::prefix('/access')->group(function () {

    Route::get('/senarai',['as'=>'/senarai/akses','uses'=>'Accesscontroller@index']);
});

Route::prefix('/lokasi')->group(function () {

    Route::get('/senarai',['as'=>'/senarai/lokasi','uses'=>'Lokasicontroller@index']);
    Route::get('/tambah',['as'=>'/tambah/lokasi','uses'=>'Lokasicontroller@add']);
    Route::post('/store',['as'=>'/tambah/pengguna','uses'=>'Lokasicontroller@store']);
    Route::get('/show/{id}',['as'=>'/maklumat','uses'=>'Lokasicontroller@show']);
    Route::get('/edit/{id}',['as'=>'/maklumat','uses'=>'Lokasicontroller@edit']);
    Route::post('edit/update/{id}',['as'=>'/kemaskini','uses'=>'Lokasicontroller@update']);
    Route::get('/padam/{id}',['as'=>'/maklumat','uses'=>'Lokasicontroller@destroy']);
    Route::get('/search',['as'=>'/tambah/lokasi','uses'=>'Lokasicontroller@search']);
    Route::get('/senaraipadam',['as'=>'/senaraipadam/lokasi','uses'=>'Lokasicontroller@indexdelete']);
    Route::get('/restore/{id}',['as'=>'/maklumat','uses'=>'Lokasicontroller@restore']);
    Route::get('/delete/{id}',['as'=>'/maklumat','uses'=>'Lokasicontroller@permenantdelete']);
});
