@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <h1>Edit Account #{{ $account->id }}</h1>

        @include('shared.forms.edit-account-form')
    </div>

@endsection
