<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pharmacontroller;
use App\Http\Controllers\CartController;

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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'App\Http\Controllers\Pharmacy@index');

Route::get('/medicines', 'App\Http\Controllers\Pharmacy@list');

Route::get('/empty', function(){
    Cart::destroy();
});

Route::get('/covid-essentials', 'App\Http\Controllers\Pharmacy@covidDetails');

Route::get('/medicine-list', 'App\Http\Controllers\CartController@index')->name('medicine.index');

Route::post('/medicine-list', 'App\Http\Controllers\CartController@store')->name('list.index');

Route::get('/test', [pharmacontroller::class, 'index']);