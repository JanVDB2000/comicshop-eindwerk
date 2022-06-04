@extends('layouts.blog-post')
@section('content')
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
                    <p><a href="{{route('home')}}" class="p-3 text-decoration-none colorwhite">Home</a><i class="colorwhite fas fa-arrow-right"></i><a href="{{route('home.bloghome')}}" class="colorwhite p-3 text-decoration-none">Blogs</a><i class="colorwhite fas fa-arrow-right"></i><a href="" class="colorwhite p-3 text-decoration-none">Post</a>
                    </p>
                </div>
            </section>
            <section class="container mb-5 mt-3">
                <div class="row">
                    <div class="col-10 offset-1">
                        <article class="text-center colorbuy boxshc p-3 border-radius mb-5">
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2">{{$post->created_at->diffForHumans()}} by {{$post->user->name}}</div>
                                <!-- Post categories-->
                                @foreach($post->categories as $category)
                                    <a class="badge bg-yello text-decoration-none link-light" href="#!">{{$category->name}}</a>
                                @endforeach
                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-4">
                                <img class="img-fluid" src="{{$post->photo ? asset($post->photo->file) : 'https://via.placeholder.com/800x600'}}" alt="{{$post->title}}">
                            </figure>
                        </article>
                    </div>
                </div>
            </section>
        </div>

    </header>
    <main>
        <section class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-10 offset-1">
                    <p class="fs-5 mb-4">{{$post->body}}</p>
                </div>
                <!--                <div class="container-fluid">
                    <div class="row">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                &lt;!&ndash; Comment Area Start &ndash;&gt;
                                <section class="mb-5">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            &lt;!&ndash; Comment form&ndash;&gt;
                                            <form class="mb-4">
                                                <textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                                            </form>
                                            &lt;!&ndash; Comment with nested comments&ndash;&gt;
                                            <div class="d-flex mb-4">
                                                &lt;!&ndash; Parent comment&ndash;&gt;
                                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."></div>
                                                <div class="ms-3">
                                                    <div class="fw-bold">Commenter Name</div>
                                                    If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                                    &lt;!&ndash; Child comment 1&ndash;&gt;
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."></div>
                                                        <div class="ms-3">
                                                            <div class="fw-bold">Commenter Name</div>
                                                            And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                                        </div>
                                                    </div>
                                                    &lt;!&ndash; Child comment 2&ndash;&gt;
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."></div>
                                                        <div class="ms-3">
                                                            <div class="fw-bold">Commenter Name</div>
                                                            When you put money directly to a problem, it makes a good headline.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            &lt;!&ndash; Single comment&ndash;&gt;
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."></div>
                                                <div class="ms-3">
                                                    <div class="fw-bold">Commenter Name</div>
                                                    When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </section>
    </main>
@endsection
