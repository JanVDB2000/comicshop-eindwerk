@extends('layouts.store')
@section('content')
    <section class="container">
        <div class="py-5 text-center fw-bold fs-1">
            <h1>Checkout</h1>
        </div>
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-pill">{{Session::get('cart') ? Session::get('cart')->totalQuantity: '0'}}</span>
                </h4>
                <ul class="list-group mb-3">
                    <livewire:cart-l-w :cart="$cart"/>
                    {{--@foreach($cart as $item)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="row">
                                <div class="col-3">
                                    <img class="card-img-top img-thumbnail" src="{{$item['product_image'] ? asset('img/' . $item['product_image']) : 'http://via.placeholder.com/400'}}" alt="">
                                </div>
                                <div class="col-9">
                                    <div>
                                        <h6 class="my-0">{{$item['product_name']}}</h6>
                                        <small class="text-muted">{{Str::limit($item['product_body'],30)}}</small>
                                    </div>
                                    <form method="POST" action="{{action('App\Http\Controllers\FrontEndController@updateQuantity')}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <input class="form-control" type="hidden" name="id" value="{{$item['product_id']}}">
                                        <div class="d-flex justify-content-between">
                                            <input class="form-control me-2" type="number" name="quantity" value="{{$item['quantity']}}" min="1" max="100">
                                            <button class="btn btn-outline-success btn-sm me-2" type="submit"><i class="fas fa-recycle"></i></button>
                                            <a class="btn btn-outline-danger btn-sm p-2" href="{{route('removeItem',$item['product_id'])}}"><i class="fas fa-times-circle"></i></a>
                                        </div>

                                    </form>
                                    <span class="text-muted">&euro; {{$item['product_price']}}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach--}}
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (Euro)</span>
                        <strong>&euro;{{Session::has('cart') ? Session::get('cart')->totalPrice: '0.00'}}</strong>
                    </li>
                </ul>
                <form class="card p-2">
                    <div class="input-group d-flex justify-content-between">
                        <a class="btn btn-secondary text-center" href="{{route('home.shop')}}">Verder winkelen</a>
                        <a class="btn btn-secondary text-center" href="">Betalen</a>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" novalidate="">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="username" placeholder="Username" required="">
                                <div class="invalid-feedback">
                                    Your username is required.
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="col-md-5">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country" required="">
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <select class="form-select" id="state" required="">
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required="">
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="same-address">
                        <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="save-info">
                        <label class="form-check-label" for="save-info">Save this information for next time</label>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop

