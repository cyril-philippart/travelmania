<?php

use App\Models\Trip;
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

Route::prefix('/voyages')->name('voyage.')->group(function() {
    Route::get('/', function () {
        return Trip::all();
    })->name('index');
    
    Route::get('/{slug}', function (string $slug) {
        $trip = Trip::where('title', $slug)->first();
        return $trip;
    })->name('show');
});




Route::get('/dashboard')->uses([\App\Http\Controllers\DashboardController::class, 'index']);
