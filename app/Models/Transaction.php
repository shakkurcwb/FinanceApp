<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public const TYPE_DEPOSIT = 'Deposit';
    public const TYPE_WITHDRAWAL = 'Withdrawal';
    public const TYPE_TRANSFER = 'Transfer';
    public const TYPE_PAYMENT = 'Payment';
    public const TYPE_ADJUSTMENT = 'Adjustment';
    public const TYPE_REFUND = 'Refund';
    public const TYPE_PURCHASE = 'Purchase';
    public const TYPE_SALE = 'Sale';

    public const TYPES = [
        self::TYPE_DEPOSIT,
        self::TYPE_WITHDRAWAL,
        self::TYPE_TRANSFER,
        self::TYPE_PAYMENT,
        self::TYPE_ADJUSTMENT,
        self::TYPE_REFUND,
        self::TYPE_PURCHASE,
        self::TYPE_SALE,
    ];

    public const STATUS_DRAFT = 'Draft';
    public const STATUS_SCHEDULED = 'Scheduled';
    public const STATUS_PENDING = 'Pending';
    public const STATUS_AUTHORIZED = 'Authorized';
    public const STATUS_POSTED = 'Posted';
    public const STATUS_CANCELLED = 'Cancelled';

    public const STATUSES = [
        self::STATUS_DRAFT,
        self::STATUS_SCHEDULED,
        self::STATUS_PENDING,
        self::STATUS_AUTHORIZED,
        self::STATUS_POSTED,
        self::STATUS_CANCELLED,
    ];

    protected $fillable = [
        'debit_account_id',
        'credit_account_id',
        'type',
        'status',
        'amount',
        'currency',
        'posting_date',
        'memo',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'posting_date' => 'date',
    ];

    public function debit_account()
    {
        return $this->belongsTo(Account::class, 'debit_account_id');
    }

    public function credit_account()
    {
        return $this->belongsTo(Account::class, 'credit_account_id');
    }
}