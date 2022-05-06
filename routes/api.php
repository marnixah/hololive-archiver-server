<?php

use App\Http\Controllers\DownloadAttemptController;
use App\Http\Controllers\DownloadRequestController;
use App\Http\Controllers\DownloadJobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('download-requests', DownloadRequestController::class);
// Pop a job
Route::delete('download-jobs/{platform}', [DownloadJobController::class, 'pop']);
// Update an attempt
Route::put('download-attempts/{downloadAttempt}', [DownloadAttemptController::class, 'update']);
Route::patch('download-attempts/{downloadAttempt}', [DownloadAttemptController::class, 'update']);
Route::get('download-attempts/{downloadAttempt}', [DownloadAttemptController::class, 'show']);