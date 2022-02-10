@extends('layout')

@section('css')

<!-- Core css file -->
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/fonts/line-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/animate.css') }}"> --}}

{{-- <!-- Plugins CSS file -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/slicknav.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/owl.theme.css') }}"> --}}

<!-- Project css with  Responsive-->
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/main.css') }}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/landingpage/css/responsive.css') }}"> --}}
@endsection

@section('content')
@extends('components.header_landingpage')
<div id="slideLandingPage" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#slideLandingPage" data-slide-to="0" class="active"></li>
        <li data-target="#slideLandingPage" data-slide-to="1"></li>
        <li data-target="#slideLandingPage" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images\landingpage\slider.png') }}" class="d-block w-100  image-slide" alt="Image">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images\image-gallery\2.jpg') }}" class="d-block w-100 image-slide" alt="Image">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images\image-gallery\3.jpg') }}" class="d-block w-100 image-slide" alt="Image">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#slideLandingPage" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#slideLandingPage" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div id="main-content" class="w-100">
    <div class="container-fluid">
        <div class="row-clearfix mx-5 mt-5 text-center">
            <div class="card">
                <div class="body border-radius-15-important">
                    <div class="row">
                        <div class="col-md-6 md-3">
                            <img src="{{ asset('images/landingpage/hospital.png') }}" alt="image" class="img-fluid">
                        </div>
                        <div class="col-md-6 md-3">
                            <p class="font-50 mb-0 text-info font-weight-700">
                                Selamat Datang
                            </p>
                            <p class="font-30 mb-5 text-info">di Website Unit Kesehatan</p>
                            <p class="text-muted font-16">
                                Selamat datang di Website Unit Kesehatan Klinik dan Rumah Sakit.
                                Website ini dimaksudkan sebagai sarana publikasi untuk memberikan informasi mengenai Unit Kesehatan.

                                Kritik dan saran yang ada sangat kami harapkan guna penyempurnaan website ini dimasa akan datang.

                                Semoga website ini memberikan manfaat dan inspirasi bagi para pembaca.
                                Jangan lupa follow sosial media kami, agar selalu terupdate dengan berita terbaru.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-1 mx-5 text-center">
            <div class="col-md-12">
                <p class="font-36 font-weight-500 color-brown-1">
                    <u>Our Services</u>
                </p>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="mx-auto body card-service border-radius-10-important">
                        <img src="{{ asset('images/landingpage/report.png') }}" class="img-fluid" alt="Image of report medical">
                        <p class="mt-5 font-weight-bold font-20">
                            Pelayanan Pasien
                        </p>
                        <p class="font-15 color-brown-1">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum rerum, possimus dignissimos in accusantium quibusdam eaque aliquid. Aliquid, tempore dolorem!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="mx-auto body card-service border-radius-10-important">
                        <img src="{{ asset('images/landingpage/doctor.png') }}" class="img-fluid" alt="Image of doctor medical">
                        <p class="mt-5 font-weight-bold font-20">
                            Dokter Spesialis
                        </p>
                        <p class="font-15 color-brown-1">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum rerum, possimus dignissimos in accusantium quibusdam eaque aliquid. Aliquid, tempore dolorem!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="mx-auto body card-service border-radius-10-important">
                        <img src="{{ asset('images/landingpage/medicine.png') }}" class="img-fluid" alt="Image of medicine medical">
                        <p class="mt-5 font-weight-bold font-20">
                            Terima Resep Dokter
                        </p>
                        <p class="font-15 color-brown-1">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum rerum, possimus dignissimos in accusantium quibusdam eaque aliquid. Aliquid, tempore dolorem!
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto mt-5">
            <img src="{{ asset('images/landingpage/group 9.png') }}" alt="image" class="d-block w-100 image-fluid">
        </div>

        <div class="row-clearfix mx-5 mt-6 text-center">

            <div class="card">
                <div class="body border-radius-15-important">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <form id="navbar-search" class="navbar-form search-form">
                                <div class="input-group mb-0">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-magnifier"></i></span>
                                        <a href="javascript:void(0);" class="search_toggle btn btn-danger"><i class="icon-close"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="row slider h-50 mx-auto">
                        <div class="mx-2">
                            <div class="card">
                                <div class="body text-center">
                                    <img src="{{ asset('images/landingpage/hospital-icon.png') }}" alt="" class="img-fluid mx-auto">
                                    <p class="font-24">
                                        Klinik Harapan Indah
                                    </p>
                                    <p class="font-18 text-muted">
                                        jl. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta reiciendis quisquam alias, optio unde, blanditiis ab nulla voluptate inventore saepe possimus soluta quae.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mx-2">
                            <div class="card">
                                <div class="body text-center">
                                    <img src="{{ asset('images/landingpage/hospital-icon.png') }}" alt="" class="img-fluid mx-auto">
                                    <p class="font-24">
                                        Klinik Harapan Indah
                                    </p>
                                    <p class="font-18 text-muted">
                                        jl. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta reiciendis quisquam alias, optio unde, blanditiis ab nulla voluptate inventore saepe possimus soluta quae.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mx-2">
                            <div class="card">
                                <div class="body text-center">
                                    <img src="{{ asset('images/landingpage/hospital-icon.png') }}" alt="" class="img-fluid mx-auto">
                                    <p class="font-24">
                                        Klinik Harapan Indah
                                    </p>
                                    <p class="font-18 text-muted">
                                        jl. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta reiciendis quisquam alias, optio unde, blanditiis ab nulla voluptate inventore saepe possimus soluta quae.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mx-2">
                            <div class="card">
                                <div class="body text-center">
                                    <img src="{{ asset('images/landingpage/hospital-icon.png') }}" alt="" class="img-fluid mx-auto">
                                    <p class="font-24">
                                        Klinik Harapan Indah
                                    </p>
                                    <p class="font-18 text-muted">
                                        jl. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta reiciendis quisquam alias, optio unde, blanditiis ab nulla voluptate inventore saepe possimus soluta quae.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-clearfix mx-5 mt-5 text-center">
            <div class="card">
                <div class="body rounded-3 bg-info">
                    <div class="row">
                        <div class="col-md-6 md-3">
                            <img src="{{ asset('images/landingpage/Doctor 1.png') }}" alt="image" class="img-fluid">
                        </div>
                        <div class="col-md-5 md-3 mt-6 ">
                            <p class="font-25 mb-0 text-white font-weight-500">
                                masuk untuk mendapatkan berbagai macam pelayanan politeknik dari kami
                            </p>
                                <button type="button" class="btn btn-primary font-25 rounded-pill mt-4">Masuk</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-dark text-white pt-5 pb-4 mt-6">

        <div class="container text-center text-md-left mt-6">
    
            <div class="row text-center text-md-left">
    
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-2 class ">
                    <img src="{{ asset('images/landingpage/Logo Poliklinik.png') }}" alt="" class="img-fluid mx-auto" >Poliklinik
                    <p>sebuah sistem informasi prosedur pelayanan kesehatan berbasis web yang digunakan untuk mendata, mengelola dan memantau jalur informasi pelayanan pengobatan pasien</p>
                    
                </div>
    
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-white">Company</h5>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Press lereases </a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Mission</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Srategy</a>
                </p>
                </div>
    
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-white">About</h5>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Carrier</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Team</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Clients</a>
                </p>
                </div>
    
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-white" >Find Us On</h5>        
                    <div class="row">
                        <div class="col-md-0">
                            <div class="col-md-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                   <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-md-0">
                            <div class="col-md-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-md-0">
                            <div class="col-md-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-md-0">
                            <div class="col-md-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
    
            <hr class=" mb-4 mt-10">
    
            <div class="row align-items-center">
    
                <div class="col-md-7 mt-4 col-lg-12 text-center">
                    <p>	Copyright ©2020 All rights reserved</p>
                </div>
    
            </div>
    
        </div>
        
    </div>

    </footer>
@endsection

@section('script')
<script>

$('.slider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 2,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
</script>
@endsection
