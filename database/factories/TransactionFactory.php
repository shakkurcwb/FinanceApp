<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Account;
use App\Models\Transaction;

class TransactionFactory extends Factory
{
    public function definition()
    {
        return [
            'debit_account_id' => Account::factory(),
            'credit_account_id' => Account::factory(),
            'type' => $this->faker->randomElement(Transaction::TYPES),
            'status' => $this->faker->randomElement(Transaction::STATUSES),
            'amount' => $this->faker->randomFloat(2, 0, 100000),
            'currency' => $this->faker->randomElement(Account::CURRENCIES),
            'posting_date' => $this->faker->date(),
            'memo' => $this->faker->sentence(),
        ];
    }
}