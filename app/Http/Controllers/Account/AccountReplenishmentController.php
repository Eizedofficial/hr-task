<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountOperationRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\Account\AccountOperationService;

class AccountReplenishmentController extends Controller
{
    public function __invoke(
        User $user,
        AccountOperationRequest $request,
        AccountOperationService $service
    ): UserResource
    {
        return $service->execute($user, (object)$request->validated());
    }
}
