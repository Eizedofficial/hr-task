<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    public function store(StoreUserRequest $request): UserResource
    {
        return new UserResource(User::create($request->validated()));
    }
}
