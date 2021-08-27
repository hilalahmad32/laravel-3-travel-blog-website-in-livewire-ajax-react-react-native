<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <title>Travel Blog Website || {{$title}} </title>
    @livewireStyles
</head>

<body>
    <!-- navbar start -->
    <div id="navbar">
        <div class="logo">
            <a href="index.html" class="h1 logo-color">{{$logo}}.</a>
        </div>
        <div id="mainNav" class="right-side-bar">
            <img src="{{asset('svg/bars.svg')}}" style="width: 20px;" id="show" alt="">
            <a href="{{ route('home') }}" class="{{Request::routeIs('home') ?'active':''}}">Home</a>
            <a href="{{ route('blog') }}" class="{{Request::routeIs('blog') ?'active':''}}">Blog</a>
            <a href="{{ route('about') }}" class="{{Request::routeIs('about') ?'active':''}}">About</a>
            <a href="{{ route('contact') }}" class="{{Request::routeIs('contact') ?'active':''}}">Contact</a>
        </div>
    </div>
    <!-- navbar end -->


    {{-- @yield('main') --}}
    {{$slot}}

    <!-- footer start -->
    <div class="container-fluid back-black">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <h2>{{$footer_title}}.</h2>
                    <p>{{$footer_desc}}</p>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="links">
                        <h2>Links</h2>
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">About</a></li>
                            <li><a href="">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="question">
                        <h2>Have a Quesiton</h2>
                        <ul>
                            <li>
                                <img src="{{asset('svg/mail-bulk.svg')}}" style="width: 5%;" alt=""> <span class="ml-2">
                                    {{$footer_email}}</span>
                            </li>
                            <li>
                                <img src="{{asset('svg/phone.svg')}}" style="width: 5%;" alt=""> <span
                                    class="ml-2">{{$footer_phone}}</span>
                            </li>
                            <li>
                                <img src="{{asset('svg/location-arrow.svg')}}" style="width: 5%;" alt=""> <span
                                    class="ml-2">{{$footer_location}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- footer end -->


    <script src="{{asset("js/jquery.js")}}"></script>
    <script src="{{asset("js/owl.carousel.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    {{-- <script src="{{asset("js/app.js")}}"></script> --}}
    <script src="{{asset("js/all.js")}}"></script>
    <script src="{{asset("js/slider.js")}}"></script>
    <script src="{{asset("js/script.js")}}"></script>
    @livewireScripts
</body>

</html>