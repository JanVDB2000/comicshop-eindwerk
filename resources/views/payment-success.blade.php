@extends('layouts.store')
@section('content')
    <section class="container-fluid">
        <div class="section-header bg-white">
            <h2 class="text-center display-2 fw-bold">Payment Success</h2>
            <div class="card-body p-5">
                <p class="text-center fw-bold display-5">Email was sent with confirmation to you.</p>
                <div class="d-flex justify-content-center p-5">
                    <a href="{{route('home.orderList')}}" class="btn btn-header fw-bold btn-lg">Go to Order List</a>
                </div>
            </div>
        </div>
    </section>
@endsection
