@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center">
            <div class="mt-5 w-50">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Manage Accounts</h5>
                        <a href="{{ url('/accounts') }}" class="btn btn-link btn-lg btn-block">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="mt-5 w-50">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Manage Transactions</h5>
                        <a href="{{ url('/transactions') }}" class="btn btn-link btn-lg btn-block">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
