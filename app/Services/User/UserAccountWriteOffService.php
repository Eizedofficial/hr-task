<?php

namespace App\Services\User;

use App\Http\Requests\User\UserAccountOperationRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use stdClass;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserAccountWriteOffService extends UserAccountOperationService
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
