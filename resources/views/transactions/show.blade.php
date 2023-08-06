@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Show Transaction #{{ $transaction->id }}</h1>
            <div>
                <a href="{{ url(sprintf('/transactions/%d/edit', $transaction->id)) }}"
                class="btn btn-primary">Edit</a>
            </div>
        </div>

        @include('shared.summaries.transaction-summary')

        <div class="row">
            <div class="col-md-6">
                <h2>Debit Account</h2>
                @include('shared.summaries.account-summary', ['account' => $transaction->debit_account])
            </div>
            <div class="col-md-6">
                <h2>Credit Account</h2>
                @include('shared.summaries.account-summary', ['account' => $transaction->credit_account])
            </div>
        </div>
    </div>

@endsection