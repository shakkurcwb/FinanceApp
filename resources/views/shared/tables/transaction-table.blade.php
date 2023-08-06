<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th style="min-width: 2em; max-width: 4em;">ID</th>
                <th>Debit Account</th>
                <th>Credit Account</th>
                <th style="min-width: 2em; max-width: 4em;">Type</th>
                <th style="min-width: 2em; max-width: 4em;">Status</th>
                <th style="min-width: 2em; max-width: 4em;">Currency</th>
                <th>Amount</th>
                <th style="min-width: 2em; max-width: 4em;">Posting Date</th>
                <th style="min-width: 2em; max-width: 4em;">Memo</th>
                <th style="min-width: 1em; max-width: 2em;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($transactions->count() == 0)
                <tr>
                    <td colspan="10">No transactions found.</td>
                </tr>
            @else
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td><a target="_blank" href="{{ url(sprintf('/accounts/%d', $transaction->debit_account->id)) }}">{{ $transaction->debit_account->name }}</a></td>
                        <td><a target="_blank" href="{{ url(sprintf('/accounts/%d', $transaction->credit_account->id)) }}">{{ $transaction->credit_account->name }}</a></td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->currency }}</td>
                        <td>${{ $transaction->amount }}</td>
                        <td>{{ $transaction->posting_date->format('Y-m-d') }}</td>
                        <td>{{ $transaction->memo ?? '-' }}</td>
                        <td>
                            <a href="{{ url(sprintf('/transactions/%d', $transaction->id)) }}"
                                class="btn btn-secondary btn-sm">Show</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
{{ $transactions->appends(request()->query())->links() }}