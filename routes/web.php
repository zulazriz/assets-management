<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('/pages/auth/login');
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(trim(parse_url(config('app.url'), PHP_URL_PATH), '/') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(trim(parse_url(config('app.url'), PHP_URL_PATH), '/') . '/assets/vendor/livewire/livewire.js', $handle);
});

// Add this route for user registration
Route::get('auth/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register']);

include 'auth.php';
include 'user.php';
include 'admin.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
