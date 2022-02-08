@extends('layout')

@section('sidebar-biodata')
<span>Welcome</span>
@endsection

@section('sidebar-menu')
<li class="header">Main</li>
<li class="active open">
    <a href="#myPage" class="has-arrow"><i class="icon-home"></i><span>Page</span></a>
    <ul>
        <li class="active"><a href="javascript:void(0)">Home</a></li>
        {{-- sementara --}}
        <li><a href="javascript:void(0)">Clinic List</a></li>
    </ul>
</li>
@endsection

@section('content')
<div id="slideLandingPage" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#slideLandingPage" data-slide-to="0" class="active"></li>
        <li data-target="#slideLandingPage" data-slide-to="1"></li>
        <li data-target="#slideLandingPage" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images\image-gallery\1.jpg') }}" class="d-block w-100 image-slide" alt="Image">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images\image-gallery\2.jpg') }}" class="d-block w-100 image-slide" alt="Image">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images\image-gallery\3.jpg') }}" class="d-block w-100 image-slide" alt="Image">
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

<div class="row-clearfix mx-5 mt-5 text-center">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col md-3">
                    <div class="mx-5">
                        <img src="{{ asset('images/landingpage/medical-report.png') }}">
                        <p class="font-20 text-light">Pelayanan Pasien</p>
                        <p class="font-15 text-muted">Lebih dari 5 orang dokter spesialis di setiap kliniknya</p>
                    </div>
                </div>
                <div class="col md-3">
                    <div class="mx-5">
                        <img src="{{ asset('images/landingpage/doctor.png') }}">
                        <p class="font-20 text-light">Pelayanan Pasien</p>
                        <p class="font-15 text-muted">Lebih dari 5 orang dokter spesialis di setiap kliniknya</p>
                    </div>
                </div>
                <div class="col md-3">
                    <div class="mx-5">
                        <img src="{{ asset('images/landingpage/medicine.png') }}">
                        <p class="font-20 text-light">Pelayanan Pasien</p>
                        <p class="font-15 text-muted">Lebih dari 5 orang dokter spesialis di setiap kliniknya</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-6">
        <img src="{{ asset('images/landingpage/hospital.png') }}" alt="image">
    </div>
    <div class="col-md-6">
        <p class="font-50 text-white mb-0">
            Selamat Datang
        </p>
        <p class="font-30 text-white mb-5">di Website Unit Kesehatan</p>
        <p class="text-muted font-16">
            Selamat datang di Website Unit Kesehatan Klinik dan Rumah Sakit.
            Website ini dimaksudkan sebagai sarana publikasi untuk memberikan informasi mengenai Unit Kesehatan.

            Kritik dan saran yang ada sangat kami harapkan guna penyempurnaan website ini dimasa akan datang.

            Semoga website ini memberikan manfaat dan inspirasi bagi para pembaca.
            Jangan lupa follow sosial media kami, agar selalu terupdate dengan berita terbaru.

        </p>
    </div>
</div>
@endsection
