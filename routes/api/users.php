<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;

Route::prefix('users')->group(function () {
    Route::post('create', [UsersController::class, 'create']);
    Route::middleware('auth:api')->get('me', [UsersController::class, 'me']);
});