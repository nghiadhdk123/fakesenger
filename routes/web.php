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

Route::get('/login', function() {
    return view('workwise.auth.login');
});

Route::get('/groups', function() {
    return view('workwise.groups.index');
});

Route::group([
    'middleware' => ['auth','PreventBackHistory'],
    'namespace' => "App\Http\Controllers"
],function () {
    Route::get('/message', 'ChatController@index');
    Route::post('/show-friend', 'ChatController@showFriend');
    Route::post('/send-message', 'ChatController@addMessage');

    //Giao diện chính
    Route::group([
        'namespace' => "Client"
    ], function() {
        Route::get('/','DashboardController@index');
    });

    //Đăng xuất tài khoản
    Route::get('/logout','LoginController@logout');
});


Route::get('/form-login', 'App\Http\Controllers\LoginController@formLogin')->name('form-login');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::post('/register', 'App\Http\Controllers\LoginController@register');
Route::get("/verifiablde-email", 'App\Http\Controllers\LoginController@verifiableEmail');
Route::post("/check-verifiablde-email", 'App\Http\Controllers\LoginController@checkVerifiableEmail');
Route::get("/send-again-email", 'App\Http\Controllers\LoginController@sendAgainEmail');
