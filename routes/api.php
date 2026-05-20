<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\TripController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('throttle:60,1')->get('/home', [App\Http\Controllers\Api\HomeController::class, 'index']);
Route::middleware('throttle:60,1')->get('/blog', [App\Http\Controllers\Api\BlogController::class, 'index']);
Route::get('/blog/{slug}', [App\Http\Controllers\Api\BlogController::class, 'show']);
Route::middleware('throttle:60,1')->get('/team', [App\Http\Controllers\Api\TeamController::class, 'index']);
Route::get('/team/{slug}', [App\Http\Controllers\Api\TeamController::class, 'show']);
Route::middleware('throttle:60,1')->get('/settings', [SettingsController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/trip/{slug}', [TripController::class, 'detail']);
Route::get('/trips/{parent}', [TripController::class, 'index']);
Route::get('/trip-category/{slug}', [TripController::class, 'category']);


