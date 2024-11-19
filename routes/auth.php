<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'showLogin'])->name('auth.login.show');
        Route::post('login', [LoginController::class, 'postLogin'])->name('auth.login.post');

        Route::get('/register', [RegisterController::class, 'showRegister'])->name('auth.register.show');
        Route::post('/register', [RegisterController::class, 'postRegister'])->name('auth.register.post');

        Route::get('forgot-password', [LoginController::class, 'postLogin'])->name('auth.forgot-password.show');
    });

    Route::middleware('user')->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');
    });
});
