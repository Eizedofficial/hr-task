<?php

namespace App\Models;

use App\Observers\TransactionObserver;
use Database\Factories\TransactionFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([TransactionObserver::class])]
/**
 * @mixin IdeHelperTransaction
 */
class Transaction extends Model
{
    /** @use HasFactory<TransactionFactory> */
    use HasFactory;

    public $timestamps = false;

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    protected $guarded = [];
}
