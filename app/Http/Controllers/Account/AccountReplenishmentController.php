<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountTransactionRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\Account\AccountTransactionService;

class AccountReplenishmentController extends Controller
{
    public function __invoke(
        User $user,
        AccountTransactionRequest $request,
        AccountTransactionService $service
    ): UserResource
    {
        return $service->execute($user, (object)$request->validated());
    }
}
