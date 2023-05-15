<?php

use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\OpinionController;
use App\Http\Middleware\UnauthorizedJsonResponse;
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

Route::middleware(UnauthorizedJsonResponse::class)->group(function () {
    Route::get('/applications', [ApplicationController::class, 'index'])->name('api.app');
    Route::get('/opinions', [OpinionController::class, 'index'])->name('api.opinion');
});


