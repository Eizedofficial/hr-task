<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserAccountOperationRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\User\UserAccountWriteOffService;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserAccountWriteOffController
{
    /**
     * @throws HttpException
     */
    public function __invoke(
        User $user,
        UserAccountOperationRequest $request,
        UserAccountWriteOffService $service
    ): UserResource
    {
        return $service->execute($user, (object)$request->validated());
    }
}
