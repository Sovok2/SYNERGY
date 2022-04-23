<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
    return redirect()->route('auth.login-form');
});

Route::group(['middleware' => 'auth:web'], function () {
    Route::group(['controller' => AuthController::class, 'prefix' => 'auth'], function () {
        Route::get('/check-password', 'checkPasswordForm')->name('auth.check-password');
        Route::post('/check-password-proccess', 'checkPassword')->name('auth.check-password-proccess');
        Route::get('/update-password', 'updatePasswordForm')->name('auth.update-password');
        Route::post('/update-password-proccess', 'updatePassword')->name('auth.update-password-proccess');
        Route::get('/logout', 'logout')->name('auth.logout');
    });

    Route::group(['prefix' => 'cabinet', 'controller' => UserController::class], function () {
        Route::get('/index', 'indexForm')->name('cabinet.index-form');
        Route::get('/edit-profile', 'edit')->name('cabinet.edit');
        Route::post('/update_proccess', 'update')->name('cabinet.update');
        Route::resource('/posts', PostController::class);
    });
});

Route::group(['middleware' => 'guest:web'], function () {
    Route::group(['controller' => AuthController::class, 'prefix' => 'auth'], function () {
        Route::get('/register', 'registerForm')->name('auth.register-form');
        Route::post('/register_proccess', 'register')->name('auth.register');
        Route::get('/login', 'loginForm')->name('auth.login-form');
        Route::post('/login_proccess', 'login')->name('auth.login');
    });
});
