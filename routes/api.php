<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('customer/signup', 'App\Http\Controllers\customers\SignupController@register');
Route::post('customer/login', 'App\Http\Controllers\customers\LoginController@login');
Route::post('doctor/signup', 'App\Http\Controllers\doctors\SignupController@register');
Route::post('doctor/login', 'App\Http\Controllers\doctors\LoginController@login');
