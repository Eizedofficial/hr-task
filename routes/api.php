<?php

use App\Http\Controllers\User\UserAccountReplenishmentController;
use App\Http\Controllers\User\UserAccountWriteOffController;
use App\Http\Controllers\User\UserController;

Route::apiResource('users', UserController::class)->only('store', 'show');

Route::prefix('users')->group(function() {
    Route::post('/{user}/replenish_account', UserAccountReplenishmentController::class);
    Route::post('/{user}/write_off_from_account', UserAccountWriteOffController::class);
});
