<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'middleware' => ['auth','PreventBackHistory'],
],function () {
    Route::get('/', 'App\Http\Controllers\ChatController@index');
    Route::post('/show-friend', 'App\Http\Controllers\ChatController@showFriend');
    Route::post('/send-message', 'App\Http\Controllers\ChatController@addMessage');


    //Đăng xuất tài khoản
    Route::get('/logout','App\Http\Controllers\LoginController@logout');
});


Route::get('/form-login', 'App\Http\Controllers\LoginController@formLogin')->name('form-login');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::post('/register', 'App\Http\Controllers\LoginController@register');
Route::get("/verifiablde-email", 'App\Http\Controllers\LoginController@verifiableEmail');
Route::post("/check-verifiablde-email", 'App\Http\Controllers\LoginController@checkVerifiableEmail');
