@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Create Transaction</h1>

        @include('shared.forms.create-transaction-form')
    </div>
@endsection
