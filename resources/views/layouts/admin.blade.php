<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('seo')">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>

    @livewireStyles

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-book"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Comic-Time</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('homebackend')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-user"></i>
                <span>Users</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">User Pages:</h6>
                    <a class="collapse-item" href="{{route('users.index')}}">All Users</a>
                    <a class="collapse-item" href="{{route('users.create')}}">Create User</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePhotos" aria-expanded="true" aria-controls="collapsePhotos">
                <i class="fas fa-images"></i>
                <span>Photos</span>
            </a>
            <div id="collapsePhotos" class="collapse" aria-labelledby="collapsePhotos" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Photos:</h6>
                    <a class="collapse-item" href="{{route('photos.index')}}">All Photos</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePosts"
               aria-expanded="true" aria-controls="collapsePosts">
                <i class="fas fa-blog"></i>
                <span>Posts</span>
            </a>
            <div id="collapsePosts" class="collapse" aria-labelledby="collapsePosts" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Posts Pages:</h6>
                    <a class="collapse-item" href="{{route('posts.index')}}">All Posts</a>
                    <a class="collapse-item" href="{{route('posts.create')}}">Create Post</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePostCategories"
               aria-expanded="true" aria-controls="collapsePostCategories">
                <i class="fas fa-list"></i>
                <span>Post Categories</span>
            </a>
            <div id="collapsePostCategories" class="collapse" aria-labelledby="collapsePostCategories" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Posts Categories Pages:</h6>
                    <a class="collapse-item" href="{{route('postcategories.index')}}">All Post Categories</a>
                    <a class="collapse-item" href="{{route('postcategories.create')}}">Create PostCategory</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
               aria-expanded="true" aria-controls="collapseProducts">
                <i class="fas fa-book"></i>
                <span>Products</span>
            </a>
            <div id="collapseProducts" class="collapse" aria-labelledby="collapseProducts" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Product Pages:</h6>
                    <a class="collapse-item" href="{{route('products.index')}}">All Products</a>
                    <a class="collapse-item" href="{{route('products.create')}}">Create Product</a>
                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Product Category Pages:</h6>
                    <a class="collapse-item" href="{{route('categories.index')}}">All Product Categories</a>
                    <a class="collapse-item" href="{{route('categories.create')}}">Create Product Category</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
               aria-expanded="true" aria-controls="collapseOrders">
                <i class="fas fa-shopping-cart"></i>
                <span>Orders</span>
            </a>
            <div id="collapseOrders" class="collapse" aria-labelledby="collapseOrders" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Orders Pages:</h6>
                    <a class="collapse-item" href="{{route('orders.index')}}">All Orders</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePostComments"
               aria-expanded="true" aria-controls="collapsePostComments">
                <i class="fas fa-comments"></i>
                <span>Product Reviews</span>
            </a>
            <div id="collapsePostComments" class="collapse" aria-labelledby="collapsePostComments" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Product Reviews Pages:</h6>
                    <a class="collapse-item" href="{{route('reviews.index')}}">All Reviews</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrands"
               aria-expanded="true" aria-controls="collapseBrands">
                <i class="fas fa-asterisk"></i>
                <span>Brands</span>
            </a>
            <div id="collapseBrands" class="collapse" aria-labelledby="collapseBrands" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Brand Pages:</h6>
                    <a class="collapse-item" href="{{route('brands.index')}}">All Brands</a>
                    <a class="collapse-item" href="{{route('brands.create')}}">Create Brand</a>
                </div>
            </div>
        </li>



        <!-- Nav Item - Pages Collapse Menu -->

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ml-auto">



                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle" src="{{Auth::user()->photo ? asset( 'img/' . Auth::user()->photo->file): 'https://via.placeholder.com/64x64'}}" alt="{{Auth::user()->name}}" width="64" height="64">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
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

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">


                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Users</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\User::all()->count() }} People</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Orders</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Order::all()->count() }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Products</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Product::all()->count() }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                           Product Reviews</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">  {{ \App\Models\Review::all()->count() }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->

                <div class="row">
                    @yield('content')
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Comic-Time 2022</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

@livewireScripts
</body>

</html>
