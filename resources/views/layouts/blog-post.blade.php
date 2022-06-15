<!doctype html>
<html lang="en">
<head>
    <title>Comic-Time</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('img/img-pages/icon.png')}}" type="image" sizes="16x16">
    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body class="bg-white">

@yield('content')

<footer class="bg-footer pb-5">
    <div class="bg-footer-top">
        <img class="image-fluid" src="{{asset('img/img-pages/footer-top-shape.png')}}" alt="footer-top">
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
                <img src="{{asset('img/img-pages/logo.png')}}" alt="logo">
            </div>
            <div class="col-md-6 col-lg-4 text-md-right">
                <ul class="list-icon pt-3">
                    <li class="p-1">
                        <a href="#0"><img src="{{asset('img/img-pages/paypal.png')}}" alt="footer"></a>
                    </li>
                    <li class="p-1">
                        <a href="#0"><img src="{{asset('img/img-pages/visa.pn')}}g" alt="footer"></a>
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
                <p class="colorwhite">Copyright ©<script>document.write(new Date().getFullYear());</script> All rights reserved.</p>
            </div>
        </div>
    </section>
</footer>
<!--Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
