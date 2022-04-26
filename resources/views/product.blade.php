<!doctype html>
<html lang="en">
<head>
    <title>Comic-Time</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/img-pages/icon.png" type="image" sizes="16x16">
    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<header>
    <div class="container-fluid bg-image-hero">
        <div class="col-8 offset-2">
            <!-- As a top -->
            <section class="navbar navbar-light border-bottom">
                <div class="container-fluid ">
                    <section class="navbar navbar-expand-lg navbar-light col-6">
                        <div class=" d-flex justify-content-start">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link fs-5 fw-bold " href="{{route('home.contact')}}"><i class="colorwhite fs-5 bi bi-telephone-fill"></i> Customer Support</a>
                                </li>
                            </ul>
                        </div>
                    </section>
                    <section  class="navbar navbar-expand-lg navbar-light col-6 d-flex justify-content-end">
                        <div class="">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{route('checkout')}}"><i class="colorwhite fs-4 bi bi-basket"></i> <span class="amount colorwhite">{{Session::has('cart') ? Session::get('cart')->totalQuantity: '0'}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold"  href="login.html"><i class="colorwhite fs-4 bi bi-person-circle"></i></a>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </section>
            <!-- As a heading -->
            <section  class="navbar navbar-light pb-5">
                <div class="container-fluid">
                    <section  class="navbar navbar-expand-lg navbar-light">
                        <div class="col-5">
                            <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('img/img-pages/logo.png')}}" alt="logo"></a>
                            <button class="navbar-toggler mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                    </section>
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="col-7">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link fs-5 fw-bold" aria-current="page" href="{{route('home')}}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fs-5 fw-bold" href="{{route('home.shop')}}">Shop</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fs-5 fw-bold" href="{{route('home.about')}}">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fs-5 fw-bold" href="{{route('home.bloghome')}}">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fs-5 fw-bold" href="{{route('home.contact')}}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </section>
        </div>
        <section class="container-fluid">
            <div class="col-lg-8 offset-lg-2 pb-5">
                <p><a href="{{route('home')}}" class="p-3 text-decoration-none colorwhite">Home</a><i class="colorwhite fas fa-arrow-right"></i><a href="{{route('home.shop')}}" class="colorwhite p-3 text-decoration-none">Shop</a> <i class="colorwhite fas fa-arrow-right"></i><a href="#" class="colorwhite p-3 text-decoration-none">Comic Book</a>
                </p>
            </div>
        </section>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="border-radius border mb-3 p-3 bg-white text-left mx-auto">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-lg-6 col-12"><img class="card-img-top mb-5 mb-md-0" src="{{$product->photo ? asset('img/'.$product->photo->file) : 'https://via.placeholder.com/450x700'}}" alt="{{$product->title}}" width="450" height="750"></div>
                        <div class="col-lg-6 col-12">

                            <div class="small mb-1">Listing ID:{{$product->id}} - Item #{{$product->item_number}}</div>
                            <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                            <div class="fs-5 mb-5">
                                <span>€{{$product->price}}</span>
                            </div>
                            <p class="lead">{{$product->body}}</p>
                            <span class="colorstar fs-1">
                                @if($product->reviews->isnotempty() )
                                    <div class="Stars rounded p-1" style="--rating:{{$product->avgRating()}};"></div>
                                @else
                                    {{'No Reviews'}}
                                @endif
                            </span>
                            <br>
                            <a class="btn btn-lg btn-header mt-5" href="{{route('addToCart',$product->id)}}"><i class="bi-cart-fill me-1"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</header>
<main>

    <section class="container">
        <div class="row">
            <ul class="nav  mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="btn active" id="description-tab" data-bs-toggle="pill" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true"><i class="fas fa-file-alt"></i> Description </button>
                </li>
                @auth()
                <li class="nav-item" role="presentation">
                    <button class="btn " id="comment-tab" data-bs-toggle="pill" data-bs-target="#comment" type="button" role="tab" aria-controls="comment" aria-selected="false"><i class="fas fa-th-list"></i> Reviews </button>
                </li>
                @endauth
            </ul>
            <div class="tab-content" id="pills-tabContent">
                @auth()
                <div class="tab-pane fade colorbuy boxshc p-3 border-radius mb-5" id="comment" role="tabpanel" aria-labelledby="comment-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 col-md-6 col-12 pb-4">
                                <h1>Reviews</h1>
                                @foreach($product->reviews as $review)
                                    <div class="mt-5">
                                        <h4>{{$review->user->name}}</h4>
                                        <span class="fw-bold">{{$review->created_at->diffForHumans()}}</span>
                                        <br>
                                        <p>{{$review->description}}</p>
                                        <div class="Stars rounded w-25 col-4" style="--rating:{{$review->stars}}"></div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                                <form method="POST" action="{{action('App\Http\Controllers\AdminReviewsController@store')}}">
                                    @csrf
                                    @method('POST')
                                    <h4>Leave a Review</h4>
                                    <input name="id" type="hidden" value="{{$product->id}}">
                                    <div class="form-group">
                                        <textarea name="description" cols="10" rows="3" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="stars">Stars</label>
                                        <input class="form-input" type="number" name="stars" min="1" max="5">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn bg-yello">Post Review</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endauth
                <div class="tab-pane fade show active colorbuy boxshc p-3 border-radius mb-5" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="container">
                        <h3>{{$product->name}}</h3>
                        <p>{{$product->body}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer class="bg-footer pb-5">
    <div class="bg-footer-top">
        <img class="image-fluid" src="{{asset('img/img-pages/footer-top-shape.png')}}" alt="footer-top">
    </div>
    <section class="container box-footer">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                <h2 class="d-flex colorwhite">Shop Categories</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="colorwhite-f py-1 d-block">Star Wars Comics</a></li>
                    <li><a href="#" class="colorwhite-f py-1 d-block">Marvel Comics</a></li>
                    <li><a href="#" class="colorwhite-f py-1 d-block">DC Comics</a></li>
                    <li><a href="#" class="colorwhite-f py-1 d-block">IDW PUBLISHING Comics</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                <h2 class="d-flex colorwhite">About Us</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="colorwhite-f py-1 d-block">About</a></li>
                    <li><a href="#" class="colorwhite-f py-1 d-block">Blog</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                <h2 class="d-flex colorwhite">We're Here to Help</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="colorwhite-f py-1 d-block">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                <h2 class="d-flex colorwhite">Follow Us</h2>
                <ul class="list-unstyled list-icon">
                    <li><a href="#0" class="colorwhite-f p-3 d-block"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#0" class="colorwhite-f p-3 d-block"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#0" class="colorwhite-f p-3 d-block"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#0" class="colorwhite-f p-3 d-block"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-5 pt-4 border-top">
            <div class="col-md-6 col-lg-4">
                <img src="{{asset('img/img-pages/logo.png')}}" alt="logo">
            </div>
            <div class="col-md-6 col-lg-4 text-md-right">
                <ul class="list-icon pt-3">
                    <li class="p-1">
                        <a href="#0"><img src="{{asset('img/img-pages/paypal.png')}}" alt="footer"></a>
                    </li>
                    <li class="p-1">
                        <a href="#0"><img src="{{asset('img/img-pages/visa.png')}}" alt="footer"></a>
                    </li>
                    <li class="p-1">
                        <a href="#0"><img src="{{asset('img/img-pages/discover.png')}}" alt="footer"></a>
                    </li>
                    <li class="p-1">
                        <a href="#0"><img src="{{asset('img/img-pages/mastercard.png')}}" alt="footer"></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-4 pt-3">
                <p class="colorwhite">Copyright ©
                    <script>document.write(new Date().getFullYear());</script>
                    All rights reserved.
                </p>
            </div>
        </div>
    </section>
</footer>
<!--Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
