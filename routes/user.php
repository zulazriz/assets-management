<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // Old Cosec
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.index.show');
    Route::prefix('support')->group(function () {
        Route::get('/', [SupportController::class, 'showSupport'])->name('support.index.show');
    });
});
