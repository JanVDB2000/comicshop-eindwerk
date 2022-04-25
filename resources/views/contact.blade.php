@extends('layouts.contact-page')
@section('content')
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="text-center display-2 fw-bold">Contact</h1>
        </div>
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">
                        @livewire('contact-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
