@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Manage Transactions</h1>
            <div>
                <a href="{{ url('/transactions/create') }}"
                class="btn btn-primary">Create</a>
            </div>
        </div>

        @include('shared.tables.transaction-table')
    </div>

@endsection
