@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Manage Accounts</h1>
            <div>
                <a href="{{ url('/accounts/create') }}"
                class="btn btn-primary">Create</a>
            </div>
        </div>

        @include('shared.tables.account-table')
    </div>

@endsection
