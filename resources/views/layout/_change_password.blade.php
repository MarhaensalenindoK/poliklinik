<div id="megamenu" class="megamenu particles_js">
    <a href="javascript:void(0);" class="megamenu_toggle btn btn-danger"><i class="icon-close"></i></a>
    <div class="container">
        <div class="row clearfix my-auto">
            <div class="col-12">
                <form action="{{ route('resetPassword') }}" method="POST" novalidate>
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group text-white">
                        <label>New Password</label>
                        <div class="input-group d-flex" id="show_hide_password">
                            <input class="form-control text-white" type="password" name="password" required>
                            <div class="card border-1" style="width: 3%">
                                <a href="javascript:void(0)" class=""><i class="fa fa-eye-slash my-2 mx-2" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Ubah Password</button>
                </form>
            </div>
            <div class="col-12 mt-5">
                <div class="card social">
                    <div class="profile-header d-flex justify-content-between justify-content-center">
                        <div class="d-flex">
                            <div class="details">
                                <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                <span class="text-light">NIK : {{ Auth::user()->nik ?? '-' }}</span>
                                <p class="mb-0"><span>Role: <strong>{{ Auth::user()->role }}</strong></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
