
<!doctype html>
<html lang="en">

<head>
<title>Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link rel="icon" href="{{ asset('images/logo-poliklinik.png') }}" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/animate-css/vivify.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}"/>

<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}"/>

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">

</head>

<body class="theme-cyan font-montserrat light_version">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

<div class="auth-main2 particles_js">
    <div class="auth_div vivify fadeInTop">
        <div class="card">
            <div class="body">
                <div class="login-img">
                    <img class="img-fluid" src="{{ asset('images/landingpage/hospital.png') }}" />
                </div>
                <form class="form-auth-small" action="{{route('auth')}}" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <p class="lead">Masuk ke akun kamu</p>
                    </div>
                    <div class="form-group">
                        <label for="signin-email" class="control-label sr-only">Username</label>
                        <input type="text" name="username" class="form-control round" id="signin-username" value="" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">Password</label>
                        <input type="password" name="password" class="form-control round" id="signin-password" value="" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block">MASUK</button>
                </form>
                <div class="pattern">
                    <span class="red"></span>
                    <span class="indigo"></span>
                    <span class="blue"></span>
                    <span class="green"></span>
                    <span class="orange"></span>
                </div>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->

<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>

<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/index.js') }}"></script>
@if (Session::has('error'))
<script>
     swal("Error!", "Gagal login!. Silahkan cek username dan password kembali !", "error");
</script>
@endif
</body>
</html>
