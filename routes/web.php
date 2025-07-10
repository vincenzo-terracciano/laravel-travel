<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItineraryStepsController;
use App\Http\Controllers\Admin\PackingItemController;
use App\Http\Controllers\Admin\PhotosController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TravelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'home'])
            ->name('home');

        Route::resource("travels", TravelController::class);
        Route::resource("categories", CategoryController::class);
        Route::resource("tags", TagController::class);
        Route::resource("travels.itinerary_steps", ItineraryStepsController::class)->scoped();
        Route::resource("travels.packing_items", PackingItemController::class);
        Route::resource("travels.places", PlaceController::class);
        Route::resource("travels.photos", PhotosController::class);
    });

require __DIR__ . '/auth.php';
