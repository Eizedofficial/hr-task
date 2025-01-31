<?php

use App\Http\Controllers\Account\AccountReplenishmentController;
use App\Http\Controllers\Account\AccountWriteOffController;
use App\Http\Controllers\User\UserController;

Route::apiResource('users', UserController::class)->only('store', 'show');

Route::prefix('users')->group(function() {
    Route::post('/{user}/replenish_account', AccountReplenishmentController::class);
    Route::post('/{user}/write_off_from_account', AccountWriteOffController::class);
});
