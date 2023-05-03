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

// Route::get('/test', function() {
//     return view('admin.home.dashboard');
// });

Route::group([
    'namespace' => "Admin",
    'prefix' => 'admin',
    'middleware' => 'localization'
], function () {
    Route::get('/', 'DashboardController@index');

    // Thay đổi ngôn ngữ
    Route::get('/change-language/{language}', 'LangController@changeLanguage')->name('change-language');
});

Route::group([
    'namespace' => "Client\Auth\Social",
    'prefix' => '/',
], function() {

    Route::get('login', 'LoginController@formLogin')->name('form-login');
    Route::post('/login', 'LoginController@login')->name('login');

    Route::post('/register', 'LoginController@register');

    Route::prefix('auth')->group(function () {
        Route::get('/facebook', 'LoginController@redirectToFacebook')->name('redirect-to-facebook');
        Route::get('/facebook/callback', 'LoginController@handleFacebookCallback');

        Route::get('/google', 'LoginController@redirectToGoogle')->name('redirect-to-google');
        Route::get('/google/callback', 'LoginController@handleGoogleCallback');

        Route::get('/logout', 'LogoutController@logout')->name('logout');
    });
});

Route::get('/groups', function() {
    return view('workwise.groups.profle-group');
});

Route::group([
    'middleware' => ['auth','PreventBackHistory'],
],function () {
    Route::get('/message', 'ChatController@index');
    Route::post('/show-friend', 'ChatController@showFriend');
    Route::post('/send-message', 'ChatController@addMessage');

    //Giao diện chính
    Route::group([
        'namespace' => "Client"
    ], function() {
        Route::get('/','DashboardController@index')->name('home');
    });

    //Đăng xuất tài khoản
    Route::get('/logout','LoginController@logout');
});


Route::get('/messenger/form-login', 'LoginController@formLogin');
Route::post('/messenger/login', 'App\Http\Controllers\LoginController@login');
Route::post('/messenger/register', 'App\Http\Controllers\LoginController@register');
Route::get("/verifiablde-email", 'App\Http\Controllers\LoginController@verifiableEmail');
Route::post("/check-verifiablde-email", 'App\Http\Controllers\LoginController@checkVerifiableEmail');
Route::get("/send-again-email", 'App\Http\Controllers\LoginController@sendAgainEmail');
