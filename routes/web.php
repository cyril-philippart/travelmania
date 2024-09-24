<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/voyages')->name('voyage.')->controller(\App\Http\Controllers\TripController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{trip:slug}/edit', 'edit')->name('edit');
    Route::post('/{trip:slug}/edit', 'update');
    Route::get('/{trip:slug}', 'show')->name('show');
});

Route::prefix('/etapes')->name('etape.')->controller(\App\Http\Controllers\StepsController::class)->group(function() {
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{step:id}/edit', 'edit')->name('edit');
    Route::post('/{step:id}/edit', 'update');
});




Route::get('/dashboard')->uses([\App\Http\Controllers\DashboardController::class, 'index']);
