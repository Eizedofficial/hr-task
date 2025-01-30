<?php

namespace App\Models;

use Database\Factories\AccountFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperAccount
 */
class Account extends Model
{
    /** @use HasFactory<AccountFactory> */
    use HasFactory;

    public $timestamps = false;

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
