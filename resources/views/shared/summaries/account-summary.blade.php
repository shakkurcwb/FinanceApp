<div class="table-responsive">
    <table class="table table-bordered table-sm align-middle">
        <tbody>
            <tr>
                <td style="min-width: 1em; max-width: 2em;">Name</td>
                <td><strong>{{ $account->name }}</strong></td>
                <td style="min-width: 1em; max-width: 2em;">Type</td>
                <td><strong>{{ $account->type }}</strong></td>
            </tr>
            <tr>
                <td>Balance</td>
                <td><strong>{{ $account->currency }} ${{ $account->balance }}</strong></td>
                <td>Updated At</td>
                <td><strong>{{ $account->updated_at->format('Y-m-d H:i:s') }}</strong></td>
            </tr>
          </tbody>
    </table>
</div>