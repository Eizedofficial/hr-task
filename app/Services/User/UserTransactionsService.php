<?php

namespace App\Services\User;

use App\Http\Requests\User\UserTransactionsRequest;
use App\Http\Resources\Transaction\TransactionResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserTransactionsService
{
    public function execute(User $user, UserTransactionsRequest $request): AnonymousResourceCollection
    {
        $query = $user->transactions();

        if ($request->description) {
            $query->where(
                'description',
                'like',
                sprintf("%%%s%%", $request->description)
            );
        }

        if ($request->date_sort_order) {
            $query->orderBy('created_at', $request->date_sort_order);
        }

        return TransactionResource::collection($query->get());
    }
}
