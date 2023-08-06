<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Account;
use App\Models\Transaction;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $cash = Account::create([
            'name' => 'Cash on Hand',
            'type' => Account::TYPE_ASSET,
            'balance' => 0,
            'currency' => 'CAD',
        ]);

        $bank_cad = Account::create([
            'name' => 'Bank CAD',
            'type' => Account::TYPE_ASSET,
            'balance' => 5000,
            'currency' => 'CAD',
        ]);

        $bank_bra = Account::create([
            'name' => 'Bank BRA',
            'type' => Account::TYPE_ASSET,
            'balance' => 5000,
            'currency' => 'BRL',
        ]);

        $savings_bra = Account::create([
            'name' => 'Savings BRA',
            'type' => Account::TYPE_ASSET,
            'balance' => 20000,
            'currency' => 'BRL',
        ]);

        $savings_cad = Account::create([
            'name' => 'Savings CAD',
            'type' => Account::TYPE_ASSET,
            'balance' => 0,
            'currency' => 'CAD',
        ]);

        $recurring_expenses = Account::create([
            'name' => 'Recurring Expenses',
            'type' => Account::TYPE_EXPENSE,
            'balance' => 0,
            'currency' => 'CAD',
        ]);

        $ontime_expenses = Account::create([
            'name' => 'One-Time Expenses',
            'type' => Account::TYPE_EXPENSE,
            'balance' => 0,
            'currency' => 'CAD',
        ]);

        $recurring_income = Account::create([
            'name' => 'Recurring Income',
            'type' => Account::TYPE_INCOME,
            'balance' => 0,
            'currency' => 'CAD',
        ]);

        $ontime_income = Account::create([
            'name' => 'One-Time Income',
            'type' => Account::TYPE_INCOME,
            'balance' => 0,
            'currency' => 'CAD',
        ]);

        $vests_cad = Account::create([
            'name' => 'Vests CAD',
            'type' => Account::TYPE_EQUITY,
            'balance' => 13000,
            'currency' => 'CAD',
        ]);

        Transaction::factory()->times(20)->create([
            'debit_account_id' => $cash->id,
            'credit_account_id' => $bank_cad->id,
            'currency' => $cash->currency,
        ]);

        Transaction::factory()->times(20)->create([
            'debit_account_id' => $bank_bra->id,
            'credit_account_id' => $cash->id,
            'currency' => $bank_bra->currency,
        ]);
    }
}
