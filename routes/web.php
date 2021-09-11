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
    return view('frontend.home');
});

//Customer

Route::get('customer/login', 'App\Http\Controllers\customers\LoginController@index')->name('customer_login');
Route::get('customer/signup', 'App\Http\Controllers\customers\SignupController@index')->name('customer_signup');
Route::get('customer/dashboard', 'App\Http\Controllers\customers\DashboardController@index')->name('customer_dashboard');

// Doctor
Route::get('doctor/login', 'App\Http\Controllers\doctors\LoginController@index')->name('doctor_login');
Route::get('doctor/signup', 'App\Http\Controllers\doctors\SignupController@index')->name('doctor_signup');

// Route::get('/customer/login', function () {
//     return View('customers.login');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
