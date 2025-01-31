<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserTransactionsRequest;
use App\Models\User;
use App\Services\User\UserTransactionsService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserTransactionsController extends Controller
{
    public function __invoke(
        User $user,
        UserTransactionsRequest $request,
        UserTransactionsService $service
    ): AnonymousResourceCollection
    {
        return $service->execute($user, $request);
    }
}
