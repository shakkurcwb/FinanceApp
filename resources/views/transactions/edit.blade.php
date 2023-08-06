@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Edit Transaction #{{ $transaction->id }}</h1>

        @include('shared.forms.edit-transaction-form')
    </div>
@endsection
