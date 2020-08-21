<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Auth::routes();

Route::get('', 'HomeController@home')->name('home');


Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/home', 'HomeController@home')->name('home');
});

Route::prefix('kepala-sekolah')->name('kepalasekolah.')->middleware('role:kepalasekolah')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/home', 'HomeController@home')->name('home');

    Route::prefix('rpp')->name('rpp.')->group(function(){
        Route::get('/', 'KepsekController@index')->name('index');
    });
});

Route::prefix('kurikulum')->name('kurikulum.')->middleware('role:kurikulum')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/home', 'HomeController@home')->name('home');

    Route::prefix('jadwal')->name('jadwal.')->group(function(){
        Route::get('/', 'JadwalController@index')->name('index');
    });
    
    Route::prefix('persetujuan')->name('persetujuan.')->group(function(){
        Route::get('/', 'KurikulumController@persetujuan')->name('index');
        Route::get('/disetujui', 'KurikulumController@disetujui')->name('disetujui');
        Route::get('/tidak-disetujui', 'KurikulumController@tidakDisetujui')->name('tidakdisetujui');
        Route::get('/belum-dinilai', 'KurikulumController@belumDinilai')->name('belumdinilai');
        Route::post('/setujui', 'RppController@setujui')->name('setujui');
        Route::post('/tidaksetujui', 'RppController@tidakSetujui')->name('tidaksetujui');
        Route::patch('/', 'RppController@editStatus')->name('edit-status');
    });
});

Route::prefix('guru')->name('guru.')->middleware('role:guru')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/home', 'HomeController@home')->name('home');
    
    Route::prefix('rpp')->name('rpp.')->group(function(){
        Route::get('/', 'GuruController@create')->name('index');
        Route::post('/', 'RppController@store')->name('store');
        Route::patch('/', 'RppController@update')->name('update');
        Route::delete('/{rpp}', 'RppController@destroy')->name('delete');
    });
});

Route::prefix('supervisor')->name('supervisor.')->middleware('role:supervisor')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/home', 'HomeController@home')->name('home');

    Route::prefix('jadwal')->name('jadwal.')->group(function(){
        Route::get('/', 'SupervisorController@jadwal')->name('jadwal');
    });

    Route::prefix('rpp')->name('rpp.')->group(function(){
        Route::get('/', 'SupervisorController@create')->name('menilai');
        Route::post('/', 'SupervisorController@menilai')->name('menilai.post');
        Route::patch('/', 'SupervisorController@editNilai')->name('menilai.edit');
    });
});