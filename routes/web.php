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

Route::get('/medicines', 'App\Http\Controllers\Pharmacy@list')->name('medicines');

Route::get('/empty', function(){
    Cart::destroy();
});



Route::get('/medicines/{medicine}', 'App\Http\Controllers\Pharmacy@show')->name('medicine.show');

Route::get('/covid-essentials', 'App\Http\Controllers\Pharmacy@covidDetails');

Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index')->name('checkout')->middleware('auth');

Route::get('/guest-checkout', 'App\Http\Controllers\CheckoutController@index')->name('guestCheckout.index');

Route::post('/checkout', 'App\Http\Controllers\CheckoutController@store')->name('checkout.store');

Route::get('/medicine-list', 'App\Http\Controllers\CartController@index')->name('medicine.index');

Route::post('/medicine-list', 'App\Http\Controllers\CartController@store')->name('list.index');

Route::get('/search', 'App\Http\Controllers\Pharmacy@search')->name('search');

Route::get('/my-profile', 'App\Http\Controllers\UsersController@edit')->name('users.edit')->middleware('auth');

Route::get('/my-orders', 'App\Http\Controllers\OrdersController@index')->name('orders.index')->middleware('auth');

Route::patch('/my-profile', 'App\Http\Controllers\UsersController@update')->name('users.update')->middleware('auth');

Route::patch('/medicine-list/{medicine}', 'App\Http\Controllers\CartController@update')->name('list.update');

Route::delete('/medicine-list/{medicine}', 'App\Http\Controllers\CartController@destroy')->name('list.destroy');

Route::get('/test', [pharmacontroller::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

