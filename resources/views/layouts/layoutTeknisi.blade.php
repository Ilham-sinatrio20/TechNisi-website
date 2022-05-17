<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TechNisi | {{ $title }} Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Cleaning Company Website Template" name="keywords">
    <meta content="Cleaning Company Website Template" name="description">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="icon" href={{ asset('assets/image/logo/icon.ico') }}>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Header Start -->
        <div class="header home">
            <div class="container-fluid">
                <div class="header-top row align-items-center">
                    <div class="col-lg-3">
                        <div class="brand">
                            <a href={{ route('teknisi.index') }}>
                                TechNisi
                                <!-- <img src="img/logo.png" alt="Logo"> -->
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="topbar">
                            <div class="topbar-col">
                                <a href="tel:+012 345 67890"><i class="fa fa-phone-alt"></i>+012 345 67890</a>
                            </div>
                            <div class="topbar-col">
                                <a href="mailto:info@example.com"><i class="fa fa-envelope"></i>technisi@gmail.com</a>
                            </div>
                            <div class="topbar-col">
                                <div class="topbar-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar navbar-expand-lg bg-light navbar-light">
                            <a href="#" class="navbar-brand">MENU</a>
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                <div class="navbar-nav ml-auto">
                                    <a href="{{ route('teknisi.index') }}"
                                        class="nav-item nav-link {{ ($title == 'Home') ? 'active' : '' }}">Home</a>

                                    @guest
                                    @if (Route::has('login'))
                                    <a href="{{ route('teknisi.detailOrder') }}"
                                        class="nav-item nav-link {{ ($title == 'DetailOrder') ? 'active' : '' }}">Detail
                                        Order</a>
                                    <a href="{{ route('inbox.index') }}"
                                        class="nav-item nav-link {{ ($title == 'Chat') ? 'active' : '' }}">Chat</a>
                                    <a href=""
                                        class="nav-item nav-link {{ ($title == 'Profil') ? 'active' : '' }}">Profil</a>
                                    <a href={{ route('login.auth') }}
                                        class="nav-item nav-link {{ ($title == 'Login') ? 'active' : '' }}">Login</a>
                                    @endif
                                    @else
                                    <a href={{ route('login.auth') }}
                                        class="nav-item nav-link {{ ($title == 'Login') ? 'active' : '' }}">Login</a>
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{
                                            Auth::user()->name }}</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
        @include('sweetalert::alert')
        @yield('main-content')

        <!-- Footer Start -->
        <div class="footer">
            <div class="container copyright">
                <p class="text-center">&copy; Copyright 2022 Kelompok 1 - All Right Reserved.</p>
            </div>
        </div>
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>