<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\Account\AccountTransactionRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\Account\AccountWriteOffService;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AccountWriteOffController
{
    /**
     * @throws HttpException
     */
    public function __invoke(
        User $user,
        AccountTransactionRequest $request,
        AccountWriteOffService $service
    ): UserResource
    {
        return $service->execute($user, (object)$request->validated());
    }
}
