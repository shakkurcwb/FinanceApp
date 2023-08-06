<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $types = Transaction::TYPES;
        $statuses = Transaction::STATUSES;
        $currencies = Account::CURRENCIES;

        $accounts = Account::select('id', 'name', 'type', 'currency', 'balance')->get();

        return view('transactions.create', compact('types', 'statuses', 'currencies', 'accounts'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'debit_account_id' => 'required|exists:accounts,id',
            'credit_account_id' => 'required|exists:accounts,id',
            'type' => 'required|in:' . implode(',', Transaction::TYPES),
            'status' => 'required|in:' . implode(',', Transaction::STATUSES),
            'amount' => 'required|numeric',
            'currency' => 'required|in:' . implode(',', Account::CURRENCIES),
            'posting_date' => 'required|date',
            'memo' => 'nullable|max:255',
        ]);

        $transaction = Transaction::create($attributes);

        return redirect(sprintf('/transactions/%d', $transaction->id));
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $types = Transaction::TYPES;
        $statuses = Transaction::STATUSES;
        $currencies = Account::CURRENCIES;

        $accounts = Account::select('id', 'name', 'type', 'currency', 'balance')->get();

        return view('transactions.edit', compact('transaction', 'types', 'statuses', 'currencies', 'accounts'));
    }

    public function update(Transaction $transaction)
    {
        $attributes = request()->validate([
            'debit_account_id' => 'required|exists:accounts,id',
            'credit_account_id' => 'required|exists:accounts,id',
            'type' => 'required|in:' . implode(',', Transaction::TYPES),
            'status' => 'required|in:' . implode(',', Transaction::STATUSES),
            'amount' => 'required|numeric',
            'currency' => 'required|in:' . implode(',', Account::CURRENCIES),
            'posting_date' => 'required|date',
            'memo' => 'nullable|max:255',
        ]);

        $transaction->update($attributes);

        return redirect(sprintf('/transactions/%d', $transaction->id));
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect('/transactions');
    }
}
