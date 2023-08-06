@extends('layouts.blank')

@section('body')

    @include('shared.navbar')

    <div class="mt-2">
        @yield('content')
    </div>

@endsection
