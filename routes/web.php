<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'goLogin']);
Route::get('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('register', [\App\Http\Controllers\AuthController::class, 'goRegister'])->name('register.goRegister');;

Route::prefix('/voyages')->name('voyage.')->controller(\App\Http\Controllers\TripController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    
    Route::middleware('auth')->group(function() {
        Route::get('/new', 'create')->name('create');
        Route::post('/new', 'store');
        Route::get('/{trip:slug}/edit', 'edit')->name('edit');
        Route::post('/{trip:slug}/edit', 'update');
        Route::get('/{trip:slug}', 'show')->name('show');
        Route::delete('/{trip:slug}', 'destroy')->name('destroy');
    });
});

Route::prefix('/etapes')->name('etape.')->controller(\App\Http\Controllers\StepsController::class)->group(function() {
    Route::middleware('auth')->group(function() {
        Route::get('/new', 'create')->name('create');
        Route::post('/new', 'store');
        Route::get('/{step:id}/edit', 'edit')->name('edit');
        Route::post('/{step:id}/edit', 'update');
        Route::delete('/{step:id}', 'destroy')->name('destroy');
    });
});
