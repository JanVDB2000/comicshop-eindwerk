<!doctype html>
<html lang="en">
<head>
    <title>Comic-Time</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/img-pages/icon.png" sizes="16x16">
    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-white">
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
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item pt-1">
                                            <a class="nav-link fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item pt-1">
                                            <a class="nav-link fw-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown pt-1">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{route('home.orderList')}}">
                                                Order list
                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{route('checkout')}}"><i class="colorwhite fs-4 bi bi-basket"></i> <span class="amount colorwhite">{{Session::has('cart') ? Session::get('cart')->totalQuantity: '0'}}</span></a>
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
                            <a class="navbar-brand" href="{{route('home')}}"><img src="img/img-pages/logo.png" alt="logo"></a>
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
                                        <a class="nav-link fs-5 fw-bold pe-3" href="{{route('home.contact')}}">Contact</a>
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
                <p><a href="{{route('home')}}" class="p-3 text-decoration-none colorwhite">Home</a><i class="colorwhite fas fa-arrow-right"></i><a href="{{route('home.bloghome')}}" class="colorwhite p-3 text-decoration-none">Blogs</a></p>
            </div>
        </section>
        <section class="container-fluid mb-5 mt-3">
            <div class="col-4 offset-4">
                @foreach($posts as $post)
                    @if($loop->index == 0)
                        <div class="card boxshc border-radius" style="width: 100%;">
                            <a href="{{route('home.post',$post)}}"><img class="card-img-top border-radius" src="{{$post->photo ? asset('img/blog'.$post->photo->file) : 'https://via.placeholder.com/800x600'}}" alt="{{$post->title}}" width="600" height="800" /></a>
                            <div class="card-body">
                                <h2 class="card-title h4">{{$post->title}}</h2>
                                <p class=" text-muted">{{$post->created_at->diffForHumans()}}</p>
                                <p class="card-text">{{$post->body}}</p>
                                <a href="{{route('home.post',$post)}}" class="btn btn-header fw-bold">Read More</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    </div>

</header>
<main>
    <section class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach($posts as $post)
                        @if($loop->index >= 1)
                            <!-- Blog post-->
                    <div class="col-4">
                        <div class="card mb-4">
                            <a href="{{route('home.post', $post)}}"><img class="card-img-top" src="{{$post->photo ? asset('img/blog'.$post->photo->file) : 'https://via.placeholder.com/800x600'}}" alt="..." /></a>
                            <div class="card-body">
                                <h2 class="card-title h4">{{Str::limit($post->title, 15)}}</h2>
                                <p class=" text-muted">{{$post->created_at->diffForHumans()}}</p>
                                <p class="card-text">{{Str::limit($post->body,50)}}</p>
                                <a href="{{route('home.post',$post)}}" class="btn btn-header fw-bold">Read More</a>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                </div>
                <!-- Pagination-->
                <div class="d-flex justify-content-center">
                    {{$posts->render()}}
                </div>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header fw-bold">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                @if($categories)
                                <ul class="list-unstyled mb-0">
                                    @foreach($categories as $category)
                                        <a class="badge bg-yello text-decoration-none link-light" href="#!">{{$category->name}}</a>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer class="bg-footer pb-5">
    <div class="bg-footer-top">
        <img class="image-fluid" src="img/img-pages/footer-top-shape.png" alt="footer-top">
    </div>
    <section class="container box-footer">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                <h2 class="d-flex colorwhite">Comics Categories</h2>
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
                    <li><a href="about.html" class="colorwhite-f py-1 d-block">About</a></li>
                    <li><a href="#" class="colorwhite-f py-1 d-block">Blog</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                <h2 class="d-flex colorwhite">We're Here to Help</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="colorwhite-f py-1 d-block">Contact</a></li>
                    <li><a href="#" class="colorwhite-f py-1 d-block">Help &amp; Support</a></li>
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
                <img src="img/img-pages/logo.png" alt="logo">
            </div>
            <div class="col-md-6 col-lg-4 text-md-right">
                <ul class="list-icon pt-3">
                    <li class="p-1">
                        <a href="#0"><img src="img/img-pages/paypal.png" alt="footer"></a>
                    </li>
                    <li class="p-1">
                        <a href="#0"><img src="img/img-pages/visa.png" alt="footer"></a>
                    </li>
                    <li class="p-1">
                        <a href="#0"><img src="img/img-pages/discover.png" alt="footer"></a>
                    </li>
                    <li class="p-1">
                        <a href="#0"><img src="img/img-pages/mastercard.png" alt="footer"></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-4 pt-3">
                <p class="colorwhite">Copyright ©<script>document.write(new Date().getFullYear());</script> All rights reserved.</p>
            </div>
        </div>
    </section>
</footer>
<!--Bootstrap JS -->
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
