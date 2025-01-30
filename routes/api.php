<?php

use App\Http\Controllers\UserController;

Route::resource('user', UserController::class)->only('store');
