<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('throttle:60,1')->group(
    function () {
        Route::post('/register', [App\Http\Controllers\Api\User\RegisterController::class, '__invoke'])->name('register');
        Route::post('/login', [App\Http\Controllers\Api\User\LoginController::class, '__invoke'])->name('login');
        Route::post('/recovery/password', [App\Http\Controllers\Api\User\RecoveryPasswordController::class, '__invoke'])->name('recovery.password');
        Route::post('/reset/password', [App\Http\Controllers\Api\User\ResetPasswordController::class, '__invoke'])->name('password.reset');
    }
);
