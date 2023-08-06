<div class="table-responsive">
    <table class="table table-bordered table-sm align-middle">
        <tbody>
            <tr>
                <td style="min-width: 1em; max-width: 2em;">Type</td>
                <td><strong>{{ $transaction->type }}</strong></td>
                <td style="min-width: 1em; max-width: 2em;">Status</td>
                <td><strong>{{ $transaction->status }}</strong></td>
            </tr>
            <tr>
                <td>Posting Date</td>
                <td><strong>{{ $transaction->posting_date->format('Y-m-d') }}</strong></td>
                <td>Memo</td>
                <td><strong>{{ $transaction->memo ?? '-' }}</strong></td>
            </tr>
            <tr>
                <td>Balance</td>
                <td><strong>{{ $transaction->currency }} ${{ $transaction->amount }}</strong></td>
                <td>Updated At</td>
                <td><strong>{{ $transaction->updated_at->format('Y-m-d H:i:s') }}</strong></td>
            </tr>
          </tbody>
    </table>
</div>