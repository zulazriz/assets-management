<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MySchedule\ScheduleController;
use App\Http\Controllers\ProfileUser\UserController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.index.show');
});
