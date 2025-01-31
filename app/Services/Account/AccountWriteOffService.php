<?php

namespace App\Services\Account;

use App\Http\Resources\User\UserResource;
use App\Models\User;
use stdClass;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AccountWriteOffService extends AccountTransactionService
{
    /**
     * @throws HttpException
     */
    public function execute(User $user, stdClass $transactionData): UserResource
    {
        $transactionData->value *= -1;

        if($user->account->balance + $transactionData->value < 0) {
            throw new HttpException(500, 'Недостаточно средств для совершения операции');
        }

        return parent::execute($user, $transactionData);
    }
}
