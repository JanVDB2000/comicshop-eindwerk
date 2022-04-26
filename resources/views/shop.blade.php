
@extends('layouts.store')
@section('content')
    <section class="container-fluid">
        <div class="section-header mb-5">
            <h2 class="text-center display-2 fw-bold">Shop</h2>
            <p class="text-center fs-3">These are the last books of this week.</p>
        </div>
        <div class="col-lg-10 offset-lg-1">
            <div class="p-2 border-radius shadow-lg bg-body mt-5 mb-5">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-8 d-flex align-items-center mb-3 pt-3">
                        <span class="fw-bold ps-3 m-3 ">Applied Filters : </span>
                        <div class="row">
                            @if(isset($filter))
                            <div class="purple-label p-1 col">
                                <span>{{$filter->name}}</span>
                                <a href="{{route('home.shop')}}">
                                    <i class="fas fa-trash-alt text-black"></i>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2 d-flex align-items-center justify-content-lg-end mb-3 pt-3">
                        <p class="fw-bold text-decoration-none purple-label p-2"><span class="p-1">{{$products->total()}}</span>Items</p>
                    </div>
                    <div class="col-lg-2 d-flex align-items-center justify-content-lg-end mb-3 pt-3 pe-3">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active fw-bold" id="pills-grid-tab" data-bs-toggle="pill" data-bs-target="#pills-grid" type="button" role="tab" aria-controls="pills-grid" aria-selected="true"><span class="fas fa-th"></span> Grid view</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link fw-bold" id="pills-list-tab" data-bs-toggle="pill" data-bs-target="#pills-list" type="button" role="tab" aria-controls="pills-list" aria-selected="false"><span class="fas fa-list-ul"></span> List view</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="col-lg-12 mb-5">
                        <div class="card border-none bage" style="width: 100%;">
                            <div class="col-lg-10 offset-lg-1 py-1">
                                <h3 class="fw-bold pb-1 border-bottom">Brands</h3>
                                <ul>
                                    @foreach($brands as $brand)
                                    <li><a href="{{route('productsPerBrandF', $brand->id)}}" class="d-block text-black"> <i class="fas fa-thumbtack color-purple"></i> {{$brand->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-grid" role="tabpanel" aria-labelledby="pills-grid-tab">
                            <div class="row text-center">
                                @if($products)
                                    @foreach($products as $product)
                                        <div class="col-lg-4 col-md-6 col-xl-4 col-12 mb-4">
                                            <div class="card border-none bage" style="width: 100%;">
                                                <div class="upcoming-badge">
                                                    <i class="fas fa-book"></i>
                                                </div>
                                                <a href="{{route('home.shopd',$product)}}"><img src="{{$product->photo ? asset( 'img/'.$product->photo->file) : 'http://via.placeholder.com/750x750'}}" class="card-img-top" alt="{{$product->name}}" width="450" height="450"></a>
                                                <div class="card-body">
                                                    <h3 class="card-title">{{Str::limit($product->name, 20)}}</h3>
                                                    <p class="card-text">Published: {{$product->published_date}}</p>
                                                    <p class="card-text">Writer: {{$product->writer}}</p>
                                                    <p class="card-text">Penciler: {{$product->penciled}}</p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <div class="d-flex justify-content-center">
                                                            <p class="pe-2 m-0 fw-bold">Listing ID: <span>{{$product->id}}</span></p><p class="ps-2 m-0 fw-bold">Item #<span>{{$product->item_number}}</span></p>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item text-center">
                                                        <div class="row">
                                                            <div  class="col-4">
                                                                <a href="{{route('home.shopd',$product)}}">
                                                                    <p class="fw-bold m-0 text-black fs-4">Buy Now</p><span class="text-danger fs-4">€{{$product->price}}</span>
                                                                </a>
                                                            </div>
                                                            <div class="col-8">
                                                                <a href="{{route('addToCart',$product->id)}}">
                                                                    <button class="btn btn-header mt-2" type="button"><i class="bi-cart-fill me-1"></i>Add to cart</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item bg-dark border-radius m-3">
                                                        <div>
                                                          <span class="p-0">
                                                                @if($product->reviews->isnotempty())
                                                                    <div class="Stars" style="--rating:{{$product->avgRating()}};"></div>
                                                                @else
                                                                    {{'No Reviews'}}
                                                                 @endif
                                                          </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach

                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
                            <div class="row text-center">
                                @if($products)
                                    @foreach($products as $product)
                                        <div class="col-12 mb-5">
                                    <div class="card border-none bage" style="width: 100%;">
                                        <div class="upcoming-badge">
                                            <i class="fas fa-book"></i>
                                        </div>
                                        <div class="row">
                                            <a href="{{route('home.shopd',$product)}}" class="col-lg-4"><img class="card-img-top img-fluid border-radius" src="{{$product->photo ? asset('img/'.$product->photo->file) : 'https://via.placeholder.com/450x700'}}" alt="{{$product->name}}" width="450" height="450"></a>
                                            <div class="card-body border-radius col-lg-4 text-lg-start">
                                                <h3 class="card-title">{{$product->name}}</h3>
                                                <p class="card-text">Published: {{$product->published_date}}</p>
                                                <p class="card-text">Writer: {{$product->writer}}</p>
                                                <p class="card-text">Penciler: {{$product->penciled}}</p>
                                                <p class="card-text">Description: {{$product->body}}</p>
                                            </div>

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-center">
                                                        <p class="pe-2 m-0 fw-bold">Listing ID: <span>{{$product->id}}</span></p><p class="ps-2 m-0 fw-bold">Item #<span>{{$product->item_number}}</span></p>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div  class="col-4">
                                                            <a href="{{route('home.shopd',$product)}}">
                                                                <p class="fw-bold m-0 text-black fs-4">Buy Now</p><span class="text-danger fs-4">€{{$product->price}}</span>
                                                            </a>
                                                        </div>
                                                        <div class="col-8">
                                                            <a href="{{route('addToCart',$product->id)}}">
                                                                <button class="btn btn-header mt-2" type="button"><i class="bi-cart-fill me-1"></i>Add to cart</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item bg-dark border-radius m-3">
                                                    <div>
                                                        <span class=" p-0">
                                                            @if($product->reviews->isnotempty() )
                                                                <div class="Stars" style="--rating:{{$product->avgRating()}};"></div>
                                                            @else
                                                                {{'No Reviews'}}
                                                            @endif
                                                        </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{$products->render()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
