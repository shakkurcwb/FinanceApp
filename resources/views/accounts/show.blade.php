@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Show Account #{{ $account->id }}</h1>
            <div>
                <a href="{{ url(sprintf('/accounts/%d/edit', $account->id)) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>

        @include('shared.summaries.account-summary')

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a href="{{ url(sprintf('/accounts/%d?tab=overview', $account->id)) }}"
                    class="nav-link {{ !request()->tab || request()->tab == 'overview' ? 'active' : '' }}"
                    id="nav-overview-tab">Overview</a>
                <a href="{{ url(sprintf('/accounts/%d?tab=debits', $account->id)) }}"
                    class="nav-link {{ request()->tab == 'debits' ? 'active' : '' }}" id="nav-debits-tab">Debits</a>
                <a href="{{ url(sprintf('/accounts/%d?tab=credits', $account->id)) }}"
                    class="nav-link {{ request()->tab == 'credits' ? 'active' : '' }}" id="nav-credits-tab">Credits</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @if (!request()->tab || request()->tab == 'overview')
                <div class="tab-pane active mt-2" role="tabpanel">
                    @include('shared.graphs.account-graphs')
                </div>
            @endif
            @if (request()->tab == 'debits')
                <div class="tab-pane active mt-2" role="tabpanel">
                    @include('shared.tables.transaction-table', [
                        'transactions' => $account->debit_transactions()->paginate(10),
                    ])
                </div>
            @endif
            @if (request()->tab == 'credits')
                <div class="tab-pane active mt-2" role="tabpanel">
                    @include('shared.tables.transaction-table', [
                        'transactions' => $account->credit_transactions()->paginate(10),
                    ])
                </div>
            @endif
        </div>
    </div>
@endsection