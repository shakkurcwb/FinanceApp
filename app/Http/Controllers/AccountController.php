<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Account;
use App\Models\Transaction;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::paginate(10);

        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        $types = Account::TYPES;
        $currencies = Account::CURRENCIES;

        return view('accounts.create', compact('types', 'currencies'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255|unique:accounts,name',
            'type' => 'required|in:' . implode(',', Account::TYPES),
            'currency' => 'required|in:' . implode(',', Account::CURRENCIES),
            'balance' => 'required|numeric',
        ]);

        $account = Account::create($attributes);

        return redirect(sprintf('/accounts/%d', $account->id));
    }

    public function show(Account $account)
    {
        $data = DB::select(
            "SELECT sum((
                case when t.debit_account_id = ? then t.amount else 0 end
            )) as debits,
            sum((
                case when t.credit_account_id = ? then t.amount else 0 end
            )) as credits
            FROM transactions as t
            WHERE t.debit_account_id = ? OR t.credit_account_id = ?",
            [$account->id, $account->id, $account->id, $account->id]
        )[0];

        $balance_breakdown = [
            'debits' => (float) $data->debits,
            'credits' => (float) $data->credits,
            'balance' => (float) $data->debits - (float) $data->credits,
        ];

        $transactions_breakdown = DB::select(
            "SELECT t.type, sum(t.amount) as total
            FROM transactions as t
            WHERE t.debit_account_id = ? OR t.credit_account_id = ?
            GROUP BY t.type",
            [$account->id, $account->id]
        );

        return view('accounts.show', compact('account', 'balance_breakdown', 'transactions_breakdown'));
    }

    public function edit(Account $account)
    {
        $types = Account::TYPES;
        $currencies = Account::CURRENCIES;

        return view('accounts.edit', compact('account', 'types', 'currencies'));
    }

    public function update(Account $account)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255|unique:accounts,name,' . $account->id,
            'type' => 'required|in:' . implode(',', Account::TYPES),
            'currency' => 'required|in:' . implode(',', Account::CURRENCIES),
            'balance' => 'required|numeric',
        ]);

        $account->update($attributes);

        return redirect(sprintf('/accounts/%d', $account->id));
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return redirect('/accounts');
    }
}
