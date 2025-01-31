<?php

namespace App\Services\Account;

use App\Http\Resources\User\UserResource;
use App\Models\Transaction;
use App\Models\User;
use stdClass;

class AccountTransactionService
{
    public function execute(User $user, stdClass $transactionData): UserResource
    {
        Transaction::create(
            array_merge(
                (array)$transactionData,
                ['account_id' => $user->account->id]
            )
        );

        return new UserResource($user->refresh());
    }
}
