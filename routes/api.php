<?php

use App\Http\Controllers\Assets\AssetsController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    // Dashboard
    Route::get('/dashboard/get-details-dashboard', [DashboardController::class, 'getDetailsDashboard']);

    // Assets
    Route::post('/assets/add-assets', [AssetsController::class, 'addAssets']);
    Route::get('/assets/get-assets-details/{assets_id}', [AssetsController::class, 'getAssetsDetails']);
    Route::post('/assets/edit-assets-details/{assets_id}', [AssetsController::class, 'editAssetsDetails']);
    Route::delete('/assets/delete-assets/{assets_id}', [AssetsController::class, 'deleteAssets']);
});
