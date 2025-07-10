<?php

use App\Http\Controllers\Api\ItineraryStepController;
use App\Http\Controllers\Api\PackingItemController;
use App\Http\Controllers\Api\TravelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */


Route::get('travels', [TravelController::class, 'index']);

Route::get('/travels/{travel}', [TravelController::class, 'show']);

Route::get('/travels/{travel}/itinerary-steps', [ItineraryStepController::class, 'index']);

Route::get('/travels/{travel}/packing-items', [PackingItemController::class, 'index']);
