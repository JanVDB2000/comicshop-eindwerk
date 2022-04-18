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
                            <a class="navbar-brand" href="#"><img src="img/img-pages/logo.png" alt="logo"></a>
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
                <p><a href="index.html" class="p-3 text-decoration-none colorwhite">Home</a><i class="colorwhite fas fa-arrow-right"></i><a href="about.html" class="colorwhite p-3 text-decoration-none">About</a>
                </p>
            </div>
        </section>
        <section class="container-fluid mb-5 mt-3">
            <div class="col-8 offset-2">
                <div class="card boxshc border-radius" style="width: 100%;">
                    <div class="card-body d-flex justify-content-center">
                        <div class="card-body">
                            <div class="about-content">
                                <h4 class="mt-5 fs-1 fw-bold">ABOUT US</h4>
                                <h2 class="title"><span class="text-danger fs-1 fw-bold">OVER 15</span> </h2>
                                <h2 class="fs-1 fw-bold">YEARS EXPERIENCE</h2>
                                <p>Innovation have made us leaders in comic book selling online</p>
                                <div class="d-flex">
                                    <div class="text-center col-lg-6">
                                        <p><img class="img-fluid" src="./img/img-pages/01about.png" alt="about"></p>
                                        <p class=" fw-bold">AWARD-WINNING TEAM</p>
                                    </div>
                                    <div class="text-center col-lg-6 m-2">
                                        <p><img class="img-fluid" src="./img/img-pages/02about.png" alt="about"></p>
                                        <p class="fw-bold">AFFILIATIONS</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <img class="card-img-top img-fluid border-radius" src="img/img-pages/about.png" alt="placeholder">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</header>
<main>
    <section class="container p-5 mb-5 mt-4">
        <div class="counter-section padding-top mt-1 text-center ">
            <div class="row justify-content-center mb-3-none">
                <div class="col-sm-6 col-lg-3">
                    <div class="border border-2 border-radius">
                        <h3 class="pt-3">
                            <span>1</span><span class="title"> M</span>
                        </h3>
                        <p>ITEMS SOLD</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="border border-2 border-radius">
                        <h3 class="pt-3">
                            <span>5</span><span class="title"> K</span>
                        </h3>
                        <p>ITEMS IN STOCK</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="border border-2 border-radius">
                        <h3 class="pt-3">
                            <span>25</span><span class="title"></span>
                        </h3>
                        <p>COMIC EXPERTS</p>
                    </div>
                </div>
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
                                <div class="col m-3 p-2 border-radius boxshc">
                                    <div class="card text-center border-none">
                                        <div class="card-heade border-noner fw-bold">Featured</div>
                                        <div class="card-body border-none">
                                            <h5 class="card-title border-none"><a href="#0"  class="text-decoration-none text-black">Tom Powell</a></h5>
                                            <p class="card-text border-none">This was my first time, but it was exciting. I will try it again. Thank you so much.</p>
                                            <a href="#0"><img src="img/img-pages/client03.png" alt="client"></a>
                                        </div>
                                        <div class="card-footer text-muted border-none">
                                            <div class="ratings colorstar">
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col m-3 p-2 border-radius boxshc">
                                    <div class="card text-center border-none">
                                        <div class="card-heade border-noner fw-bold">Featured</div>
                                        <div class="card-body border-none">
                                            <h5 class="card-title border-none"><a href="#0"  class="text-decoration-none text-black">Tom Powell</a></h5>
                                            <p class="card-text border-none">This was my first time, but it was exciting. I will try it again. Thank you so much.</p>
                                            <a href="#0"><img src="img/img-pages/client03.png" alt="client"></a>
                                        </div>
                                        <div class="card-footer text-muted border-none">
                                            <div class="ratings colorstar">
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col m-3 p-2 border-radius boxshc">
                                    <div class="card text-center border-none">
                                        <div class="card-heade border-noner fw-bold">Featured</div>
                                        <div class="card-body border-none">
                                            <h5 class="card-title border-none"><a href="#0"  class="text-decoration-none text-black">Tom Powell</a></h5>
                                            <p class="card-text border-none">This was my first time, but it was exciting. I will try it again. Thank you so much.</p>
                                            <a href="#0"><img src="img/img-pages/client03.png" alt="client"></a>
                                        </div>
                                        <div class="card-footer text-muted border-none">
                                            <div class="ratings colorstar">
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col m-3 p-2 border-radius boxshc">
                                    <div class="card text-center border-none">
                                        <div class="card-heade border-noner fw-bold">Featured</div>
                                        <div class="card-body border-none">
                                            <h5 class="card-title border-none"><a href="#0"  class="text-decoration-none text-black">Tom Powell</a></h5>
                                            <p class="card-text border-none">This was my first time, but it was exciting. I will try it again. Thank you so much.</p>
                                            <a href="#0"><img src="img/img-pages/client03.png" alt="client"></a>
                                        </div>
                                        <div class="card-footer text-muted border-none">
                                            <div class="ratings colorstar">
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col m-3 p-2 border-radius boxshc">
                                    <div class="card text-center border-none">
                                        <div class="card-heade border-noner fw-bold">Featured</div>
                                        <div class="card-body border-none">
                                            <h5 class="card-title border-none"><a href="#0"  class="text-decoration-none text-black">Tom Powell</a></h5>
                                            <p class="card-text border-none">This was my first time, but it was exciting. I will try it again. Thank you so much.</p>
                                            <a href="#0"><img src="img/img-pages/client03.png" alt="client"></a>
                                        </div>
                                        <div class="card-footer text-muted border-none">
                                            <div class="ratings colorstar">
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col m-3 p-2 border-radius boxshc">
                                    <div class="card text-center border-none">
                                        <div class="card-heade border-noner fw-bold">Featured</div>
                                        <div class="card-body border-none">
                                            <h5 class="card-title border-none"><a href="#0"  class="text-decoration-none text-black">Tom Powell</a></h5>
                                            <p class="card-text border-none">This was my first time, but it was exciting. I will try it again. Thank you so much.</p>
                                            <a href="#0"><img src="img/img-pages/client03.png" alt="client"></a>
                                        </div>
                                        <div class="card-footer text-muted border-none">
                                            <div class="ratings colorstar">
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                <h2 class="d-flex colorwhite">Auction Categories</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="colorwhite-f py-1 d-block">Fallout Props</a></li>
                    <li><a href="#" class="colorwhite-f py-1 d-block">Marvel Comics</a></li>
                    <li><a href="#" class="colorwhite-f py-1 d-block">Movie Props</a></li>
                    <li><a href="#" class="colorwhite-f py-1 d-block">Collectors Editions Games</a></li>
                    <li><a href="#" class="colorwhite-f py-1 d-block">And More</a></li>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
