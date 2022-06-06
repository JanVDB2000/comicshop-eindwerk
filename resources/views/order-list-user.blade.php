@extends('layouts.store')
@section('content')
    <section class="container-fluid">
        <div class="section-header bg-white">
            <h2 class="text-center display-2 fw-bold">Order List</h2>
        </div>
    </section>
<section>
    <div class="container py-5 mt-5 mb-5 pt-5 pb-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12">
                @if($orders->isnotempty())
                @foreach($orders as $order)
                <div class="card card-stepper text-black shadow-lg m-3" style="border-radius: 16px;">
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <div>
                                <h5 class="mb-0">Order ID : <span class="text-primary font-weight-bold">#{{$order->id}}</span></h5>
                            </div>
                            <div class="text-end">
                                <p class="mb-0">Order Date <span class="font-weight-bold"> {{$order->created_at->diffForHumans()}}</span></p>
                                <p class="mb-0">Expected Arrival <span>01/7/22</span></p>
                            </div>
                        </div>

                        <ul class="progressbar-2 d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
                            <li class="step0 active text-center step1"></li>
                            <li class="step0 text-muted text-center step4"></li>
                            <li class="step0 text-muted text-center step4"></li>
                            <li class="step0 text-muted text-end step4"></li>
                        </ul>

                        <div class="d-flex justify-content-between">
                            <div class="d-lg-flex align-items-center">
                                <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                <div>
                                    <p class="fw-bold mb-1">Order</p>
                                    <p class="fw-bold mb-0">Processed</p>
                                </div>
                            </div>
                            <div class="d-lg-flex align-items-center">
                                <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                <div>
                                    <p class="fw-bold mb-1">Order</p>
                                    <p class="fw-bold mb-0">Shipped</p>
                                </div>
                            </div>
                            <div class="d-lg-flex align-items-center">
                                <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                <div>
                                    <p class="fw-bold mb-1">Order</p>
                                    <p class="fw-bold mb-0">En Route</p>
                                </div>
                            </div>
                            <div class="d-lg-flex align-items-center">
                                <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                <div>
                                    <p class="fw-bold mb-1">Order</p>
                                    <p class="fw-bold mb-0">Arrived</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between p-5 flex-column flex-md-row text-center">
                            <a href="#" class="btn btn-header btn-lg  fw-bold m-3 text-nowrap">Order Details</a>
                            <a href="{{route('home.orderListPDF',$order->id)}}" class="btn btn-header btn-lg  fw-bold m-3 text-nowrap">Factuur PDF</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{$orders->render()}}
                </div>
                @else
                    <div class="card card-stepper text-black shadow-lg m-3" style="border-radius: 16px;">
                        <div class="card-body p-5">
                            <p class="text-center fw-bold display-5">No Orders</p>
                            <div class="d-flex justify-content-center p-5">
                                <a href="{{route('home.shop')}}" class="btn btn-header fw-bold btn-lg">Go Shopping</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
