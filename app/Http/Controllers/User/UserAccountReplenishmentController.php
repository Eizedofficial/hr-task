<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserAccountOperationRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\User\UserAccountOperationService;

class UserAccountReplenishmentController extends Controller
{
    public function __invoke(
        User $user,
        UserAccountOperationRequest $request,
        UserAccountOperationService $service
    ): UserResource
    {
        return $service->execute($user, (object)$request->validated());
    }
}
