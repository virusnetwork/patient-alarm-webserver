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

//php -S localhost:8000 -t public/ used to get server on local network

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('ward/{id}','App\Http\Controllers\WardController@show');

Route::get('/index','App\Http\Controllers\WardController@show2');

require __DIR__.'/auth.php';
