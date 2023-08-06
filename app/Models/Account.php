<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public const TYPE_ASSET = 'Asset';
    public const TYPE_LIABILITY = 'Liability';
    public const TYPE_EQUITY = 'Equity';
    public const TYPE_INCOME = 'Income';
    public const TYPE_EXPENSE = 'Expense';

    public const TYPES = [
        self::TYPE_ASSET,
        self::TYPE_LIABILITY,
        self::TYPE_EQUITY,
        self::TYPE_INCOME,
        self::TYPE_EXPENSE,
    ];

    public const CURRENCIES = [
        'CAD',
        'BRL',
        'USD',
        'EUR',
    ];

    protected $fillable = [
        'name',
        'type',
        'balance',
        'currency',
    ];

    protected $casts = [
        'balance' => 'decimal:2',
    ];

    public function debit_transactions()
    {
        return $this->hasMany(Transaction::class, 'debit_account_id', 'id');
    }

    public function credit_transactions()
    {
        return $this->hasMany(Transaction::class, 'credit_account_id', 'id');
    }
}