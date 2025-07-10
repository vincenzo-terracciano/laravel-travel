<?php

use App\Http\Controllers\Api\TravelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */


Route::get('travels', [TravelController::class, 'index']);

Route::get('/travels/{travel}', [TravelController::class, 'show']);
