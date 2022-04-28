@extends('layouts.store')
@section('content')
    <section class="container">
        <div class="py-5 text-center fw-bold fs-1">
            <h1>Checkout</h1>
        </div>
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-black">Your cart</span>
                    <span class="badge bg-yello rounded-pill">{{Session::get('cart') ? Session::get('cart')->totalQuantity: '0'}}</span>
                </h4>
                <ul class="list-group mb-3">
                    <livewire:cart-l-w :cart="$cart"/>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (Euro)</span>
                        <strong>&euro;{{Session::has('cart') ? Session::get('cart')->totalPrice: '0.00'}}</strong>
                    </li>
                </ul>
                <div class="input-group d-flex justify-content-between">
                    <a class="btn bg-yello text-center fw-bold" href="{{route('home.shop')}}">Continue shopping</a>
                </div>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Billing address</h4>
                <form method="POST" action="{{action('App\Http\Controllers\FrontEndController@orderReady')}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName_b" placeholder="Jhon">
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName_b" placeholder="Walker">
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="street_one_b" placeholder="1234 Main St">
                        </div>

                        <div class="col-md-5">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" name="country_b" placeholder="Country">
                        </div>

                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" name="state_b" placeholder="State">
                        </div>

                        <div class="col-md-3">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip_b" placeholder="8000">
                        </div>
                        <hr>
                            <button class="btn bg-yello fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                Not the same Shipping address as the Billing address.
                            </button>
                        <div class="collapse collapse" id="collapseWidthExample">
                            <h4 class="mt-2">Shipping address</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">First name</label>
                                        <input type="text" class="form-control" name="firstName_s" placeholder="Jhon">
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label">Last name</label>
                                        <input type="text" class="form-control" name="lastName_s" placeholder="Walker">
                                    </div>
                                    <div class="col-12">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="street_one_s" placeholder="1234 Main St">
                                    </div>

                                    <div class="col-md-5">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country_s" placeholder="Country">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" name="state_s" placeholder="State">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="zip" class="form-label">Zip</label>
                                        <input type="text" class="form-control" name="zip_s" id="zip" placeholder="8000">
                                    </div>
                                    <hr class="my-4">
                                </div>
                        </div>
                        <button type="submit" class="btn bg-yello text-center fw-bold">Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop

