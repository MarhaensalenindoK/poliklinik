<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>{{ $clinicDetail['name'] }}</title>
<link rel="icon" href="{{ asset('images/logo-poliklinik.png') }}" type="image/x-icon">

<!-- Core css file -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/fonts/line-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/animate.css') }}">

<!-- Plugins CSS file -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/slicknav.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/owl.theme.css') }}">

<!-- Project css with  Responsive-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/responsive.css') }}">

</head>
<body>
<!-- Header Area wrapper Starts -->
<header id="header-wrap">
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar"
                    aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="icon-menu"></span>
                    <span class="icon-menu"></span>
                    <span class="icon-menu"></span>
                </button>
                <a href="index.html" class="navbar-brand"><img src="{{ asset('images/logo-poliklinik.png') }}" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
                    <li class="nav-item active"><a class="nav-link" href="#hero-area">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#facility">Facility</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                </ul>
                <div class="btn-sing float-right">
                    <a class="btn btn-border" href="{{ url('/login') }}">Masuk</a>
                </div>
            </div>
        </div>

        <ul class="mobile-menu navbar-nav">
            <li><a class="page-scroll" href="#hero-area">Home</a></li>
            <li><a class="page-scroll" href="#services">Services</a></li>
            <li><a class="page-scroll" href="#facility">Facility</a></li>
            <li><a class="page-scroll" href="#about">About</a></li>
        </ul>

    </nav>

    <div id="hero-area" class="hero-area-bg particles_js">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="contents text-center">
                        <h2 class="head-title wow fadeInUp">Rumah sakit / Klinik <br>
                        {{ $clinicDetail['name'] }}</h2>
                    </div>
                    <div class="img-thumb text-center wow fadeInUp" data-wow-delay="0.6s">
                        <img class="img-fluid" src="{{ $clinicDetail['profile_image'] !== null ? asset('images/' . $clinicDetail['profile_image']) : asset('images/profile_image/thumbnail1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div id="particles-js"></div>
    </div>
    <!-- Hero Area End -->

</header>

<!-- Services Section Start -->
<section id="services" class="section-padding">
    <div class="container">
        <div class="section-header text-center wow fadeInDown" data-wow-delay="0.3s">
            <h2 class="section-title">Our Services</h2>
        </div>
        <div class="row">
            @foreach ($clinicDetail['service'] as $service)
            <div class="col-md-6 {{ $totalService < 6 ? 'col-lg-6' : 'col-lg-4' }} col-xs-12">
                <div class="services-item wow fadeInUp" data-wow-delay="0.3s">
                    <div class="icon">
                        <i class="lni-cog"></i>
                    </div>
                    <div class="services-content">
                        <h3><a href="javascript:void(0)">{{ $service }}</a></h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Feature Section Start -->
<div id="facility" class="section-padding">
    <div class="container">
        <div class="row mb-5 vertical-content">
            <div class="col-lg-12 col-md-12">
                <div class="wow fadeInLeft mb-3" data-wow-delay="0.3s">
                    <h2 class="title-h3">OUR FACILITY.</h2>
                </div>
                <div class="row">
                    @foreach ($clinicDetail['facility'] as $facility)
                        <div class="col-md-6 col-sm-6">
                            <div class="features-box wow fadeInLeft" data-wow-delay="0.3s">
                                <div class="features-icon"><i class="lni-layers"></i></div>
                                <div class="features-content">
                                    <h4>{{ $facility['name'] }}</h4>
                                    <p>{{ $facility['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Team Section Start -->
<section id="about" class="section-padding text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header text-center wow fadeInDown" data-wow-delay="0.3s">
                    <h2 class="section-title">About {{ $clinicDetail['name'] }}</h2>
                    <p>{{ $clinicDetail['about'] }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section Start -->
@if ($clinicDetail['news'] !== [])
<section id="testimonial" class="testimonial section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="testimonials" class="owl-carousel wow fadeInUp" data-wow-delay="1.2s">
                    @foreach ($clinicDetail['news'] as $news)
                    <div class="item">
                        <div class="testimonial-item d-flex">
                            @if ($news['thumbnail'] !== null)
                            <div class="img-thumb">
                                <img src="{{ asset('images/thumbnails/' . $news['thumbnail']) }}" alt="">
                            </div>
                            @endif
                            <div class="content">
                                <p class="description">{{ $news['content'] }}
                                </p>
                                <div class="info">
                                    <h2><a href="javascript:void(0)">{{ $news['title'] }}</a></h2>
                                    {{-- <h3><a href="javascript:void(0)">CEO & Founder @Oculux</a></h3> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Footer Section Start -->
<footer id="footer" class="footer-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.2s">
                <div class="footer-logo mb-3">
                    <img src="{{ asset('images/landingpage/Logo Poliklinik.png') }}" alt="">
                </div>
                <p>sebuah sistem informasi prosedur pelayanan kesehatan berbasis web yang digunakan untuk mendata, mengelola dan memantau jalur informasi pelayanan pengobatan pasien.</p>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 wow fadeInUp d-none" data-wow-delay="0.4s">
                <h3 class="footer-titel">Company</h3>
                <ul>
                    <li><a href="#">Press Releases</a></li>
                    <li><a href="#">Mission</a></li>
                    <li><a href="#">Strategy</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 wow fadeInUp d-none" data-wow-delay="0.6s">
                <h3 class="footer-titel">About</h3>
                <ul>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Clients</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 wow fadeInUp d-none" data-wow-delay="0.8s">
                <h3 class="footer-titel">Find us on</h3>
                <div class="social-icon">
                    <a class="facebook" href="#"><i class="lni-facebook-filled"></i></a>
                    <a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
                    <a class="instagram" href="#"><i class="lni-instagram-filled"></i></a>
                    <a class="linkedin" href="#"><i class="lni-linkedin-filled"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<section id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright ©2022 All rights reserved</p>
            </div>
        </div>
    </div>
</section>

<!-- Go to Top Link -->
<a href="#" class="back-to-top"><i class="lni-arrow-up"></i></a>

<!-- Preloader -->
<div id="preloader">
    <div class="loader">
        <img src="../assets/images/icon.svg" width="40" height="40" alt="Oculux">
        <p>Please wait...</p>
    </div>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('assets/landingpage/js/jquery-min.js') }}"></script>
<script src="{{ asset('assets/landingpage/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/landingpage/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/landingpage/js/wow.js') }}"></script>
<script src="{{ asset('assets/landingpage/js/scrolling-nav.js') }}"></script>
<script src="{{ asset('assets/landingpage/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/landingpage/js/jquery.nav.js') }}"></script>
<script src="{{ asset('assets/landingpage/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/landingpage/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('assets/landingpage/js/particles.min.js') }}"></script>

<script src="{{ asset('assets/landingpage/js/main.js') }}"></script>
<script src="{{ asset('assets/landingpage/js/form-validator.min.js') }}"></script>
<script src="{{ asset('assets/landingpage/js/contact-form-script.min.js') }}"></script>
<script src="{{ asset('assets/landingpage/js/particlesjs.js') }}"></script>
</body>
</html>
