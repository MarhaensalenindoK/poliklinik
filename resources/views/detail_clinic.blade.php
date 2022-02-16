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
<div class="col-md-3 col-lg-3 col-xl- mx-auto mt-2 class float-left ">
    <img src="{{ asset('images/logo-poliklinik.png') }}" alt="" class="img-fluid mx-auto" >
        <span class="font-weight-700 font-20 color-grey-1">Nama RS</span>
</div>

<div class="mx-auto mt-5">
    <img src="{{ asset('images/landingpage/group 9.png') }}" alt="image" class="d-block w-100 image-fluid">
</div>

<div id="main-content" class="w-100 p-0">
    <div class="container-fluid p-0">
        <div class="row-clearfix mx-5 mt-5">
            <div class="row">
                <div class="col-md-6 md-3">
                    <img src="{{ asset('images/landingpage/image 11.png') }}" alt="image" class="img-fluid">
                </div>
                <div class="col-md-6 md-3 mt-2">
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

        <div class="mx-auto mt-5">
            <img src="{{ asset('images/emergency.png') }}" alt="image" class="d-block w-100 image-fluid">
        </div>

        <footer class="bg-dark text-white pt-5 pb-4 mt-6">

            <div class="container text-center text-md-left mt-6">

                <div class="row text-center text-md-left">

                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-2 class ">
                        <img src="{{ asset('images/landingpage/Logo Poliklinik.png') }}" alt="" class="img-fluid mx-auto" >
                        <span class="font-weight-700 font-20 color-grey-1">Poliklinik</span>
                        <p>sebuah sistem informasi prosedur pelayanan kesehatan berbasis web yang digunakan untuk mendata, mengelola dan memantau jalur informasi pelayanan pengobatan pasien</p>

                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-white">Company</h5>
                    <p>
                        <a href="javascript:void(0)" class="text-white text-decoration-none"> Press lereases </a>
                    </p>
                    <p>
                        <a href="javascript:void(0)" class="text-white text-decoration-none"> Mission</a>
                    </p>
                    <p>
                        <a href="javascript:void(0)" class="text-white text-decoration-none"> Srategy</a>
                    </p>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-white">About</h5>
                    <p>
                        <a href="javascript:void(0)" class="text-white text-decoration-none"> Carrier</a>
                    </p>
                    <p>
                        <a href="javascript:void(0)" class="text-white text-decoration-none"> Team</a>
                    </p>
                    <p>
                        <a href="javascript:void(0)" class="text-white text-decoration-none"> Clients</a>
                    </p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-white" >Find Us On</h5>
                        <div class="row">
                            <div class="col-md-0">
                                <div class="col-md-1">
                                    <i class="fa fa-facebook"></i>
                                </div>
                            </div>
                            <div class="col-md-0">
                                <div class="col-md-1">
                                    <i class="fa fa-twitter"></i>
                                </div>
                            </div>
                            <div class="col-md-0">
                                <div class="col-md-1">
                                    <i class="fa fa-instagram"></i>
                                </div>
                            </div>
                            <div class="col-md-0">
                                <i class="fa fa-linkedin"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class=" mb-4 mt-10">

                <div class="row align-items-center">

                    <div class="col-md-7 mt-4 col-lg-12 text-center">
                        <p>	Copyright ©2022 All rights reserved</p>
                    </div>

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
  ]
});
</script>
@endsection




