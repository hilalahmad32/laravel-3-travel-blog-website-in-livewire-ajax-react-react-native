<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    @livewireStyles
    <title>Admin || {{$title}}</title>
</head>

<body>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Travel Blog Website</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                    class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto mr-0 ml-md-0">
                <h4 class="text-white"> </h4>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('setting') }}">Settings</a>
                        @if (Auth::user()->roll == 1)
                        <a class="dropdown-item" href="{{ route('profile') }}">Update Profile</a>
                        @endif
                        @if (Auth::user()->roll == 0)
                        <a class="dropdown-item" href="{{ route('profiles') }}">Update Profile</a>
                        @endif
                      
                        <div class="dropdown-divider"></div>
                        <livewire:admin.logout />
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            @if (Auth::user()->roll == 1)
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link {{Request::routeIs('category') ? "active" : ""}}"
                                href="{{ route('category') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Category
                            </a>
                            <a class="nav-link {{Request::routeIs('post') ? "active" : ""}}" href="{{ route('post') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Post
                            </a>
                            <a class="nav-link {{Request::routeIs('admins') ? "active" : ""}}"
                                href="{{ route('admins') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Admin
                            </a>
                            <a class="nav-link {{Request::routeIs('abouts') ? "active" : ""}}"
                                href="{{ route('abouts') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                About
                            </a>
                            <a class="nav-link {{Request::routeIs('contacts') ? "active" : ""}}"
                                href="{{ route('contacts') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Contacts
                            </a>
                            <a class="nav-link {{Request::routeIs('comments') ? "active" : ""}}"
                                href="{{ route('comments') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Comment
                            </a>
                            @else
                            <a class="nav-link" href="{{ route('dashboards') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link {{Request::routeIs('posts') ? "active" : ""}}"
                                href="{{ route('posts') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Post
                            </a>
                            @endif

                            {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category" aria-expanded="false" aria-controls="category">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="category" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">Add Category</a>
                                    <a class="nav-link" href="#">Show Categorys</a>
                                </nav>
                            </div> --}}

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>

                    {{$slot}}
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        {{-- @yield('admin') --}}

        <script src="{{asset("js/jquery.js")}}"></script>
        <script src="{{asset("js/bootstrap.min.js")}}"></script>
        <script src="{{asset("js/scripts.js")}}"></script>
        <script src="{{asset("js/all.js")}}"></script>
        {{-- <script src="{{asset("js/app.js")}}"></script> --}}
        @livewireScripts
    </body>

</html>