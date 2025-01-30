<?php

namespace App\Observers;

use App\Models\Transaction;

class TransactionObserver
{
    public function created(Transaction $transaction): void
    {
        $transaction->account->update([
            'balance' => Transaction::where('account_id', $transaction->account_id)->sum('value')
        ]);
    }
}
