@extends('layouts.home')
@section('content')
    <section class="container p-5 mb-5 mt-4">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between">
                <div class="m-2">
                    <h3 class="text-center display-5 fw-bold">Highlight Comics</h3>
                </div>
                <div class="m-3">
                    <button class="btn btn-header rounded-pill mt-1 ps-3 pe-3 colorwhite" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                        <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                    </button>
                    <button class="btn btn-header rounded-pill mt-1 ps-3 pe-3 colorwhite" type="button" data-bs-target="#carousel" data-bs-slide="next">
                        <span aria-hidden="true"><i class=" bi bi-arrow-right"></i></span>
                    </button>
                </div>
            </div>
            <div class="row">
                <div id="carousel" class="carousel slide col-12  m-2" data-bs-ride="carousel">
                    <div class="carousel-inner p-1 pt-5">
                        <div class="carousel-item active">
                            <div class="row">
                                @foreach($productsbrands as $productbrand)
                                    @if($loop->index < 3)
                                <div class="col p-2">
                                    <div class="card boxshc border-radius mb-5" style="width: 100%;">
                                        <img class="card-img-top img-fluid border-radius" src="{{$productbrand->photo ? asset($productbrand->photo->file) : 'http://via.placeholder.com/450x700'}}" alt="{{$productbrand->name}}">
                                        <div class="card-body d-flex justify-content-center">
                                            <a href="{{route('home.shopd',$productbrand)}}" class="btn btn-header fw-bold">View More</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                @foreach($productsbrands as $productbrand)
                                    @if($loop->index >= 3)
                                <div class="col p-2">
                                    <div class="card boxshc border-radius mb-5" style="width: 100%;">
                                        <img class="card-img-top img-fluid border-radius" src="{{$productbrand->photo ? asset($productbrand->photo->file) : 'http://via.placeholder.com/450x700'}}" alt="{{$productbrand->name}}">
                                        <div class="card-body d-flex justify-content-center">
                                            <a href="{{route('home.shopd',$productbrand)}}" class="btn btn-header fw-bold">View More</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid ">
        <div class="col-lg-10 offset-lg-1">
            <div class="section-header mb-5">
                <h2 class="text-center display-2 fw-bold">Latest Books</h2>
                <p class="text-center fs-3">These are the last books of this week in stock.</p>
            </div>
            <div class="row text-center">
                @if($products)
                @foreach($products as $product)

                <div class="col-12 col-lg-4 mb-4">
                    <div class="card border-none bage" style="width: 100%;">
                        <div class="upcoming-badge">
                            <i class="fas fa-book"></i>
                        </div>
                        <a href="{{route('home.shopd',$product)}}"><img src="{{$product->photo ? asset($product->photo->file) : 'http://via.placeholder.com/750x750'}}" class="card-img-top" alt="{{$productbrand->name}}"></a>
                        <div class="card-body ">
                            <div class="card-body  text-center">
                                <h3 class="card-title">{{$product->name}}</h3>
                                <p class="card-text">Published: {{$product->published_date}}</p>
                                <p class="card-text">Writer: {{$product->writer}}</p>
                                <p class="card-text">Penciler: {{$product->penciled}}</p>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="d-flex justify-content-center">
                                    <p class="pe-2 m-0 fw-bold">Listing ID: <span>{{$product->id}}</span></p><p class="ps-2 m-0 fw-bold">Item #<span>{{$product->item_number}}</span></p>
                                </div>
                            </li>
                            <li class="list-group-item text-center">
                                <div class="row">
                                    <div  class="col-12">
                                        <div class="d-flex justify-content-evenly">
                                            <a href="{{route('home.shopd',$product)}}">
                                                <p class="fw-bold m-0"><p class="fw-bold m-0 text-black fs-1">Buy Now</p><span class="text-danger fs-1">€{{$product->price}}</span></p>
                                            </a>
                                            <a href="#">
                                                <button class="btn btn-lg btn-header mt-5" type="button"><i class="bi-cart-fill me-1"></i>Add to cart</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-dark border-radius m-3">
                                <div>
                                    <span class="colorstar fs-1 p-0">
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
    </section>
    <section class="container p-5 mb-5 mt-4">
        <div class="col-lg-10 offset-lg-1">
            <div class="text-center">
                <h2 class="fs-1 h2 fw-bold">Don’t just take our word for it!</h2>
                <p class="fs-3">Our hard work is paying off. Great reviews from amazing customers.</p>
            </div>
            <div class="row">
                <div id="carousel-review" class="carousel slide col-12 m-2" data-bs-ride="carousel">
                    <div class="carousel-inner p-1 pt-3">
                        <div class="carousel-item active">
                            <div class="row">
                                @foreach($reviewssite as $review)
                                    @if($loop->index < 3)
                                        <div class="col m-3 p-2 border-radius boxshc">
                                            <div class="card text-center border-none">
                                                <div class="card-heade border-noner fw-bold">Featured</div>
                                                <div class="card-body border-none">
                                                    <h3 class="card-title border-none h3"><a href="#0"  class="text-decoration-none text-black">{{$review->user->name}}</a></h3>
                                                    <p class="card-text border-none">{{$review->description}}</p>
                                                    <a href="#0"><img src="{{asset('img/img-pages/client03.png')}}" alt="{{$review->user->name}}"></a>
                                                </div>
                                                <div class="card-footer text-muted border-none">
                                                    <div class="Stars" style="--rating:{{$review->stars}}"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                @foreach($reviewssite as $review)
                                    @if($loop->index >= 3)
                                        <div class="col m-3 p-2 border-radius boxshc">
                                            <div class="card text-center border-none">
                                                <div class="card-heade border-noner fw-bold">Featured</div>
                                                <div class="card-body border-none">
                                                    <h3 class="card-title border-none h3"><a href="#0"  class="text-decoration-none text-black">{{$review->user->name}}</a></h3>
                                                    <p class="card-text border-none">{{$review->description}}</p>
                                                    <a href="#0"><img src="{{asset('img/img-pages/client03.png')}}" alt="{{$review->user->name}}"></a>
                                                </div>
                                                <div class="card-footer text-muted border-none">
                                                    <div class="Stars" style="--rating:{{$review->stars}}"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
