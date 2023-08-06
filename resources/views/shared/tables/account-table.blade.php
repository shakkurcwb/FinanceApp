<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th style="min-width: 2em; max-width: 4em;">ID</th>
                <th>Account Name</th>
                <th style="min-width: 2em; max-width: 4em;">Account Type</th>
                <th style="min-width: 2em; max-width: 4em;">Currency</th>
                <th>Balance</th>
                <th style="min-width: 1em; max-width: 2em;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($accounts->count() == 0)
                <tr>
                    <td colspan="6">No accounts found.</td>
                </tr>
            @else
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td><b>{{ $account->name }}</b></td>
                        <td>{{ $account->type }}</td>
                        <td>{{ $account->currency }}</td>
                        <td>${{ $account->balance }}</td>
                        <td>
                            <a href="{{ url(sprintf('/accounts/%d', $account->id)) }}"
                                class="btn btn-secondary btn-sm">Show</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
{{ $accounts->appends(request()->query())->links() }}