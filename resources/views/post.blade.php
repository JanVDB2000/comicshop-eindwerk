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
                                        <a class="nav-link fs-5 fw-bold " href="#"><i class="colorwhite fs-5 bi bi-telephone-fill"></i> Customer Support</a>
                                    </li>
                                </ul>
                            </div>
                        </section>
                        <section  class="navbar navbar-expand-lg navbar-light col-6 d-flex justify-content-end">
                            <div class="">
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item">
                                        <a class="nav-link fw-bold" href="cart.html"><i class="colorwhite fs-4 bi bi-basket"></i> <span class="amount colorwhite">8</span></a>
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
                                <a class="navbar-brand" href="#"><img src="{{asset('img/img-pages/logo.png')}}" alt="logo"></a>
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
                                            <a class="nav-link fs-5 fw-bold pe-3" href="contact.html">Contact</a>
                                        </li>
                                        <li class="nav-item">
                                            <form class="d-flex">
                                                <input class="search-color rounded-pill mt-1 ps-3 pe-3 " id="search-home" type="search" placeholder="Search for brand, model...." aria-label="Search">
                                                <label for="search-home"><i class="btn bi bi-search mt-1"></i></label>
                                            </form>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <!-- Comment Area Start -->
                                <section class="mb-5">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <!-- Comment form-->
                                            <form class="mb-4">
                                                <textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                                            </form>
                                            <!-- Comment with nested comments-->
                                            <div class="d-flex mb-4">
                                                <!-- Parent comment-->
                                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."></div>
                                                <div class="ms-3">
                                                    <div class="fw-bold">Commenter Name</div>
                                                    If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                                    <!-- Child comment 1-->
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."></div>
                                                        <div class="ms-3">
                                                            <div class="fw-bold">Commenter Name</div>
                                                            And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                                        </div>
                                                    </div>
                                                    <!-- Child comment 2-->
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."></div>
                                                        <div class="ms-3">
                                                            <div class="fw-bold">Commenter Name</div>
                                                            When you put money directly to a problem, it makes a good headline.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single comment-->
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
                </div>
            </div>
        </section>
    </main>
@endsection
