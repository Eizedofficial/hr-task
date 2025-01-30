<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'value' => $this->faker->randomFloat(2, 1, 1000),
            'description' => $this->faker->optional()->text(255)
        ];
    }
}
