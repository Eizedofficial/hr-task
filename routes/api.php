<?php

use App\Http\Controllers\Account\AccountReplenishmentController;
use App\Http\Controllers\Account\AccountWriteOffController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserTransactionsController;

Route::apiResource('users', UserController::class)->only('store', 'show');

Route::prefix('users/{user}/')->group(function() {
    Route::post('account/replenish', AccountReplenishmentController::class);
    Route::post('account/write_off', AccountWriteOffController::class);

    Route::get('transactions', UserTransactionsController::class);
});
