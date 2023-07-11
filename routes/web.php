<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'toRegister')->name('showRegister');
    Route::post('/register', 'register')->name('register');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'toLogin')->name('showLogin');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/client', 'index')->name('client')->middleware('is_client');
        Route::get('/edit', 'edit')->name('edit-profile')->middleware('is_client');
        Route::put('/edit', 'update')->name('update-profile')->middleware('is_client');
        Route::get('/change-password', 'toChangePassword')->name('showChangePass')->middleware('is_client');
        Route::post('/change-password', 'changePassword')->name('update-password')->middleware('is_client');
    });
    Route::middleware(['auth'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admin', 'index')->name('client')->middleware('is_admin');
            Route::get('/disable/{id}', 'lockUser')->name('disable')->middleware('is_admin');
        });
    });
});

