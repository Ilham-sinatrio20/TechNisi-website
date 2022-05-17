<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        @if(Route::is('inbox.show') || Route::is('inbox.index'))
         <title>TechNisi | Inbox Page</title>
        @endif
        <title>TechNisi | {{ $title }} Page</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Cleaning Company Website Template" name="keywords">
        <meta content="Cleaning Company Website Template" name="description">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        @livewireStyles
    </head>

    <body>
        <div class="wrapper">
            <!-- Header Start -->
            <div class="header home">
                <div class="container-fluid">
                    <div class="header-top row align-items-center">
                        <div class="col-lg-3">
                            <div class="brand">
                                <a href={{ route('index.home') }}>
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
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                    <div class="navbar-nav ml-auto">
                                        <a href="/" class="nav-item nav-link {{ ($title == 'Home') ? 'active' : '' }}">Home</a>
                                        <a href="about" class="nav-item nav-link {{ ($title == 'About') ? 'active' : '' }}">Tentang</a>
                                        <a href="service" class="nav-item nav-link {{ ($title == 'Service') ? 'active' : '' }}">Servis</a>
                                        <a href="{{ route('tech.show') }}" class="nav-item nav-link {{ ($title == 'Teknisi') ? 'active' : '' }}">Teknisi</a>
                                    @guest
                                        @if (Route::has('login'))
                                            <a href="contact" class="nav-item nav-link {{ ($title == 'Contact') ? 'active' : '' }}">Contact</a>
                                            <a href={{ route('login.auth') }} class="nav-item nav-link {{ ($title == 'Login') ? 'active' : '' }}">Login</a>
                                        @endif
                                    @else
                                        <a href="{{ route('teknisi.detailOrder') }}" class="nav-item nav-link">Order</a>
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }}</a>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('inbox.index') }}" class="dropdown-item">Chat</a>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @if(request()->routeIs('index.home'))
                    <div class="hero row align-items-center">
                        <div class="col-md-7">
                            @guest
                                <h2>Best & Trusted</h2>
                                <h2><span>Website</span> Service</h2>
                                <p>Temukan Teknisi Servis Terdekat</p>
                                <a class="btn" href="">Cari Sekarang</a>
                            @else
                                <h2><span>TechNisi</span> Website</h2>
                                <h2><span>Selamat Datang</span> {{ strtok(Auth::user()->name, " ") }}</h2>
                                <p>Temukan Teknisi Servis Terdekat</p>
                                <a class="btn" href="">Cari Sekarang</a>
                            @endguest
                        </div>
                        <div class="col-md-5">
                            <div class="form">
                                <h3>Dapatkan Penawaran</h3>
                                <form>
                                    <input class="form-control" type="text" placeholder="Nama Anda">
                                    <input class="form-control" type="text" placeholder="Nomor Telepon">
                                    <div class="control-group">
                                        <select class="custom-select">
                                            <option selected>Pilih Servis</option>
                                            <option value="1">Servis Elektronik</option>
                                            <option value="2">Servis Perabotan</option>
                                            <option value="3">Servis Laptop</option>
                                        </select>
                                    </div>
                                    <textarea class="form-control" placeholder="Komentar"></textarea>
                                    <button class="btn btn-block">Dapatkan Penawaran</button>
                                </form>
                            </div>
                        </div>
                    </div>
            @endif
                </div>
            </div>
            <!-- Header End -->
            <!-- FAQs Start -->
            @if(request()->routeIs('index.home') || request()->routeIs('about.home'))
            <div class="faqs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="section-header left">
                                <p>Anda Mungkin Bertanya</p>
                                <h2>Frequently Asked Questions</h2>
                            </div>
                            <img src="img/faqs.jpg" alt="Image">
                        </div>
                        <div class="col-md-7">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                            <span>1</span> Servis apa saja yang bisa dikerjakan?
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                                            <span>2</span> Berapa lama proses perbaikan?
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseThree">
                                            <span>3</span> Berapa biaya untuk servis?
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseFour">
                                            <span>4</span> Bagaimana cara memesan servis?
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseFour">
                                            <span>5</span> Kapan hari kerja untuk teknisi servis?
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn" href="">Bertanya Lebih Banyak</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- FAQs End -->
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
        @livewireScripts
    </body>
</html>
