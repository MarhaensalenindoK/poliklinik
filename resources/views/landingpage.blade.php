@extends('layout')

@section('css')
@endsection

@section('content')
<div id="slideLandingPage" class="carousel slide mt-5" data-ride="carousel">
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
<div id="main-content" class="w-100 p-0">
    <div class="container-fluid p-0">
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
                            <div id="navbar-search" class="navbar-form search-form my-5 d-none">
                                <div class="input-group mb-0">
                                    <input type="text" class="form-control" id="searchInput" placeholder="Search..." onkeyup="searchClinic(event)">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-magnifier"></i></span>
                                        <a href="javascript:void(0);" class="search_toggle btn btn-danger"><i class="icon-close"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row slider h-50 mx-auto" id="renderClinic">
                        @foreach ($clinics['data'] as $clinic)
                            <div class="mx-2 cursor-pointer" onclick="detailClinicPage('{{ $clinic['id'] }}')">
                                <div class="card">
                                    <div class="body text-center" style="min-height: 23rem;">
                                        <img src="{{ asset('images/landingpage/hospital-icon.png') }}" alt="" class="img-fluid mx-auto">
                                        <p class="font-24">
                                            {{ $clinic['name'] }}
                                        </p>
                                        <p class="font-18 text-muted">
                                            {{ $clinic['address'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row-clearfix mx-5 mt-5 text-center">
            <div class="card">
                <div class="body border-radius-15-important bg-info">
                    <div class="row">
                        <div class="col-md-6 md-3">
                            <img src="{{ asset('images/landingpage/Doctor 1.png') }}" alt="image" class="img-fluid">
                        </div>
                        <div class="col-md-5 md-3 mt-6 ">
                            <p class="font-25 mb-0 text-white font-weight-500">
                                masuk untuk mendapatkan berbagai macam pelayanan politeknik dari kami
                            </p>
                                <button type="button" class="btn btn-primary font-25 w-50 rounded-pill mt-4" onclick="window.open(`/login`, '_blank')">Masuk</button>

                        </div>
                    </div>
                </div>
            </div>
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

    </footer>
@endsection

@section('script')
<script>

    $('#renderClinic').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
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

    let clinics = @json($clinics['data']);

    function detailClinicPage(clinicId) {
        window.open(`/${clinicId}/detail-clinic`, '_blank');
    }

    function searchClinic(e) {
        let value = $("#searchInput").val();
        console.log(value)
        if (value != '') {
            let keyword = value.toLowerCase();
            filtered_clinics = clinics.filter(function(clinic){
                    name = clinic.name.toLowerCase();
                return name.indexOf(keyword) > -1;
            });

            renderClinic(filtered_clinics)
        } else {
            renderClinic(clinics)
        }
    }

    function renderClinic(data) {
        let html = ``

        $.each(data, function (key, clinic) {
            html += `
                <div class="mx-2 cursor-pointer" onclick="detailClinicPage(${clinic.id})">
                    <div class="card">
                        <div class="body text-center" style="min-height: 23rem;">
                            <img src="{{ asset('images/landingpage/hospital-icon.png') }}" alt="" class="img-fluid mx-auto">
                            <p class="font-24">
                                ${clinic.name}
                            </p>
                            <p class="font-18 text-muted">
                                ${clinic.address}
                            </p>
                        </div>
                    </div>
                </div>
            `
        });

        $("#renderClinic").html(html);
    }
</script>
@endsection
