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

Route::get('/', 'HomeController@home')->name('home');
Route::get('/home', 'HomeController@home')->name('home');


Route::prefix('admin')->name('admin')->middleware('role:admin')->group(function(){
    
});

Route::prefix('kepala-sekolah')->name('kepala-sekolah')->middleware('role:kepalasekolah')->group(function(){
    
});

Route::prefix('kurikulum')->name('kurikulum')->middleware('role:kurikulum')->group(function(){
    
});

Route::prefix('guru')->name('guru')->middleware('role:guru')->group(function(){
    
});

Route::prefix('supervisor')->name('supervisor')->middleware('role:supervisor')->group(function(){
    Route::get('/', 'HomeController@supervisor')->name('.dashboard');
});