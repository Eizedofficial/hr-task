<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Account>
 */
class AccountFactory extends Factory
{
    public function definition(): array
    {
        return [];
    }

    public function configure(): AccountFactory
    {
        return $this->afterCreating(function (Account $account) {
            $transactions = Transaction::factory()
                ->count($this->faker->numberBetween(1, 10))
                ->state(['account_id' => $account->id])
                ->create();

            $account->update(['balance' => $transactions->sum('value')]);
        });
    }
}
