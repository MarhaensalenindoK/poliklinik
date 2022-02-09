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
            <img src="{{ asset('images\image-gallery\1.jpg') }}" class="d-block w-100 image-slide" alt="Image">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images\image-gallery\2.jpg') }}" class="d-block w-100 image-slide" alt="Image">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images\image-gallery\3.jpg') }}" class="d-block w-100 image-slide" alt="Image">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
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
                            <p class="font-50 mb-0 color-blue-1 font-weight-700">
                                Selamat Datang
                            </p>
                            <p class="font-30 mb-5 color-blue-1">di Website Unit Kesehatan</p>
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

        <div class="row mt-5 mx-5 text-center">
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
                            Lebih dari 5 orang dokter spesialis di setiap kliniknya
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

        <div class="row-clearfix mx-5 mt-5 text-center">

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
                <div class="body border-radius-15-important bg-blue-1-important">
                    <div class="row">
                        <div class="col-md-6 md-3">
                            <img src="{{ asset('images/landingpage/hospital.png') }}" alt="image" class="img-fluid">
                        </div>
                        <div class="col-md-6 md-3">
                            <p class="font-50 mb-0 color-blue-1 font-weight-700">
                                Selamat Datang
                            </p>
                            <p class="font-30 mb-5 color-blue-1">di Website Unit Kesehatan</p>
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
    </div>
</div>
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
