<!doctype html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nikki - Blog &amp; Magazine Template</title>

    <!-- mobile specific metas ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="{{ asset('images/core-img/favicon.ico') }}">


    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <!-- Bootstrap 4.4.1 -->
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
    <link rel="stylesheet" href="{{ asset('css/classy-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- jQuery 3 -->
    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->
    
    
</head>
<body>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="nikki-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="nikkiNav">

                        <!-- Nav brand -->
                        <a href="{{route('home')}}" class="nav-brand"><img src="{{ asset('images/core-img/logo.png') }}" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="#">Catagories</a>
                                        
                                        <ul class="dropdown">
                                            @if($categories->count() > 0)
                                                @foreach($categories as $category)
                                                    <li><a href="{{ '/'.$category->id }}"> {{ $category->name }}</a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    <li><a href="{{route('posts')}}">Archive Blog</a></li>
                                    <li><a href="{{route('about')}}">About</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                    <!-- change language -->
                                    <li><a href="#"><i class="fa fa-flag-o"></i></a>
                                        <ul class="dropdown">
                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <li>
                                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                        {{ $properties['native'] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>

                                <!-- Search Form -->
                                <div class="search-form">
                                    <form action="{{route('home')}}" method="get">
                                        <input type="search" name="search" class="form-control" placeholder="Search and hit enter...">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>

                                <!-- Social Button -->
                                <div class="top-social-info">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="RSS Feed"><i class="fa fa-rss" aria-hidden="true"></i></a>
                                </div>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->



@yield('content')

<!-- ##### Instagram Area Start ##### -->
    <div class="follow-us-instagram">
        <div class="instagram-content d-flex flex-wrap align-items-center">

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('images/blog-img/insta1.jpg') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('images/blog-img/insta2.jpg') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('images/blog-img/insta3.jpg') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('images/blog-img/insta4.jpg') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('images/blog-img/insta4.jpg') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('images/blog-img/insta6.jpg') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('images/blog-img/insta7.jpg') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('images/blog-img/insta8.jpg') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <!-- ##### Instagram Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Footer Social Info -->
                    <div class="footer-social-info d-flex align-items-center justify-content-between">
                        <a href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                        <a href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                        <a href="#"><i class="fa fa-google-plus"></i><span>Google +</span></a>
                        <a href="#"><i class="fa fa-linkedin"></i><span>linkedin</span></a>
                        <a href="#"><i class="fa fa-instagram"></i><span>Instagram</span></a>
                        <a href="#"><i class="fa fa-vimeo"></i><span>Vimeo</span></a>
                        <a href="#"><i class="fa fa-youtube"></i><span>Youtube</span></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="copywrite-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js') }}"></script>
</body>
</html>
