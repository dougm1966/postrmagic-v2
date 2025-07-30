<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// DaisyUI Components Demo Page - Accessible without authentication
Route::get('/daisy-components', function () {
    return view('daisy.components');
})->name('daisy.components');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Resource routes for core entities
    Route::resource('events', App\Http\Controllers\EventController::class);
    Route::resource('media-items', App\Http\Controllers\MediaItemController::class);
    Route::resource('generated-posts', App\Http\Controllers\GeneratedPostController::class);
    Route::resource('tags', App\Http\Controllers\TagController::class);
});
