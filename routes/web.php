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
    return view('welcome');
});

Route::get('/installer', 'SetupController@showInstaller');
Route::post('/installer', 'SetupController@install');


Auth::routes();

Route::get('/awd', function(){
    return response()->file(database_path('amb.txt'));

})->name('home');
