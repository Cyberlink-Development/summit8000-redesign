<?php

use App\Http\Controllers\Api\CollectionController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CustomizeTripController;
use App\Http\Controllers\Api\TripController;
use App\Http\Controllers\Api\SlugResolverController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('throttle:60,1')->get('/home', [App\Http\Controllers\Api\HomeController::class, 'index']);
Route::middleware('throttle:60,1')->get('/blog', [App\Http\Controllers\Api\BlogController::class, 'index']);
Route::get('/blog/{slug}', [App\Http\Controllers\Api\BlogController::class, 'show']);
Route::middleware('throttle:60,1')->get('/settings', [SettingsController::class, 'index']);
Route::get('/page', [SlugResolverController::class, 'resolve']);
Route::get('/collection', [CollectionController::class, 'index']);

Route::prefix('book')->group(function () {
    Route::get('/{slug}', [BookingController::class, 'index']);
    Route::post('/', [BookingController::class, 'store']);
});

Route::prefix('plan-expedition')->group(function () {
    Route::get('/', [CustomizeTripController::class, 'index']);
    Route::post('/', [CustomizeTripController::class, 'store']);
});

//Temporary route for vercel to deploy changes
Route::get('/customize-trip', function () {
    return response()->json([
        'status' => 'ok',
        'data' => []
    ]);
});
