<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pharmacontroller;

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
    return view('home');
});

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/pharmacy', 'App\Http\Controllers\Pharmacy@index');

Route::get('/medicines', 'App\Http\Controllers\Pharmacy@list');

Route::get('/covid-essentials', 'App\Http\Controllers\Pharmacy@covidDetails');

Route::get('/test', [pharmacontroller::class, 'index']);