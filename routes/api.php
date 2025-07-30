<?php

use App\Http\Controllers\API\EventController;
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

// User authentication route (existing)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API v1 Routes
Route::prefix('v1')->group(function () {
    // Event routes
    Route::apiResource('events', EventController::class);
    
    // Additional event routes for specific operations
    Route::get('events/{event}/media', [EventController::class, 'getEventMedia']);
    Route::get('events/{event}/posts', [EventController::class, 'getEventPosts']);
    Route::post('events/{event}/tags', [EventController::class, 'syncTags']);
});
