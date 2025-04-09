<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;

// Route::middleware('jwt.auth')->group(function () {
// });
Route::prefix('restaurant')->group(function () {
    Route::get('/', [RestaurantController::class, 'index']);
    Route::post('create', [RestaurantController::class, 'create']);
    Route::get('view/{id}', [RestaurantController::class, 'view']);
});
