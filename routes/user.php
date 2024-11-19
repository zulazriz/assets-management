<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MySchedule\ScheduleController;
use App\Http\Controllers\ProfileUser\UserController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.index.show');
    Route::prefix('support')->group(function () {
        Route::get('/', [SupportController::class, 'showSupport'])->name('support.index.show');
    });

    // User Profile
    Route::get('/user-profile', [UserController::class, 'showProfile'])->name('profileUser.index.show');
    Route::put('/user-profile/update', [UserController::class, 'updateProfile'])->name('profileUser.update');

    // My Schedule
    Route::get('/my-schedule/index', [ScheduleController::class, 'showMySchedule'])->name('mySchedule.index.show');
});
