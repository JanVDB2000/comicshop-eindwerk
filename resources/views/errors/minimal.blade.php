@extends('layouts.error-page')
@section('content')
    <div class="text-center display-2 fw-bold">
        @yield('code')
    </div>

    <div class="text-center display-2 fw-bold">
        @yield('message')
    </div>
@endsection

