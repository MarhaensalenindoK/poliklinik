@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@endsection
@section('sidebar-biodata')
    <span>Welcome,</span>
    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong></a>
    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY" style="right: auto;">
        {{-- <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
        <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
        <li class="divider"></li> --}}
        <li><a href="javascript:void(0)" onclick="$('#modalResetPassword').click();"><i class="icon-lock"></i>Change Password</a></li>
        <li><a href="{{ url('/logout') }}"><i class="icon-power"></i>Logout</a></li>
    </ul>
    @endsection

    @section('sidebar-menu')
    <li class="header">Main</li>
    <li class="active open">
        <a href="#myPage" class="has-arrow"><i class="icon-home"></i><span>My Page</span></a>
        <ul>
            <li class="active"><a href="{{ url('patient/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('patient/history-payment') }}">History Payment</a></li>
        </ul>
    </li>
    @endsection
@section('content')
<div class="card social mt-5">
    <div class="profile-header d-flex justify-content-between justify-content-center">
        <div class="d-flex">
            <div class="details">
                <h5 class="mb-0">{{ $user['name'] }}</h5>
                <span class="text-light">NIK : <b>{{ $user['nik'] ?? '-' }}</b></span>
                <div class="text-light">Email : <b>{{ $user['email'] ?? '-' }}</b></div>
                <div class="text-light">Clinic : <b>{{ $user['clinic']['name'] ?? '-' }}</b></div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6">
                <a class="card" href="javascript:void(0)">
                    <div class="body text-center">
                        <h6 class="mt-3">{{ $user['doctor']['name'] ?? 'Belum diperiksa oleh dokter' }}</h6>
                        <div class="text-center text-muted">Your Doctor</div>
                    </div>
                    <div class="card-footer text-center">
                        <div class="row clearfix">
                            <div class="col-12">
                                <i class="fa fa-envelope-open font-22"></i>
                                <div><span class="text-muted">{{ $user['doctor']['email'] ?? '-' }}</span></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6">
                <a class="card" href="javascript:void(0)">
                    <div class="body text-center">
                        <img class="img-thumbnail rounded-circle" width="100" src="{{ asset('images/' . $user['clinic']['profile_image']) }}" alt="{{ $user['clinic']['name'] }}">
                        <h6 class="mt-3">{{ $user['clinic']['name'] }}</h6>
                        <div class="text-center text-muted">{{ $user['clinic']['address'] }}</div>
                    </div>
                    <div class="card-footer text-center">
                        <div class="row clearfix">
                            <div class="col-12">
                                <h5>About</h5>
                                <div><span class="text-muted">{{ $user['clinic']['about'] }}</span></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-12 col-md-12 py-5 color-blue-1">
                <h4>
                    Latest Medical History
                </h4>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top" style="height: 18.75rem;">
                        <div class="front p-3 px-4">
                            <div class="py-4 m-0 text-center h2 text-info">Allergic</div>
                        </div>
                        <div class="back p-3 px-4 my-auto bg-info text-center">
                            <p class="text-light">{{ $user['latest_medical_history']['allergic'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top" style="height: 18.75rem;">
                        <div class="front p-3 px-4 bg-danger text-light">
                            <div class="py-4 m-0 text-center h2">Been Diagnosed</div>
                        </div>
                        <div class="back p-3 px-4 text-light">
                            <p>
                                @if (count($user['latest_medical_history']['been_diagnosed']) > 5)
                                    @foreach ($user['latest_medical_history']['been_diagnosed'] as $item)
                                        @if ($loop->last)
                                            {{ $item }}.
                                        @else
                                            {{ $item }},
                                        @endif
                                    @endforeach
                                @else
                                <ul>
                                @foreach ($user['latest_medical_history']['been_diagnosed'] as $item)
                                    <li>
                                        {{ $item }}
                                    </li>
                                @endforeach
                                </ul>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top" style="height: 18.75rem;">
                        <div class="front p-3 px-4 bg-warning text-light">
                            <div class="py-4 m-0 text-center h2">Hospitalization or Surgery</div>
                        </div>
                        <div class="back p-3 px-4 text-white">
                            <p>
                                <ol>
                                @foreach ($user['latest_medical_history']['hospitalization_surgery'] as $item)
                                    <li>
                                        Reason : <b>{{ $item['reason'] }}</b>
                                    </li>
                                @endforeach
                                </ol>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top" style="height: 18.75rem;">
                        <div class="front p-3 px-4">
                            <div class="py-4 m-0 text-center h2 text-success">Anamnesis</div>
                        </div>
                        <div class="back p-3 px-4 bg-success text-center">
                            <p class="text-light">{{ $user['latest_medical_history']['anamnesis'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top" style="height: 18.75rem;">
                        <div class="front p-3 px-4">
                            <div class="py-4 m-0 text-center h2 text-info">Diagnosis</div>
                        </div>
                        <div class="back p-3 px-4 my-auto bg-info text-center">
                            <p class="text-light">{{ $user['latest_medical_history']['diagnosis'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top" style="height: 18.75rem;">
                        <div class="front p-3 px-4 bg-danger text-light">
                            <div class="py-4 m-0 text-center h2">Physical Exam</div>
                        </div>
                        <div class="back p-3 px-4 text-light">
                            <p>
                                {{ $user['latest_medical_history']['physical_exam'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top" style="height: 18.75rem;">
                        <div class="front p-3 px-4 bg-warning text-light">
                            <div class="py-4 m-0 text-center h2">Vital Sign</div>
                        </div>
                        <div class="back p-3 px-4 text-white">
                            <p>
                                {{ $user['latest_medical_history']['vital_sign'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top" style="height: 18.75rem;">
                        <div class="front p-3 px-4">
                            <div class="py-4 m-0 text-center h2 text-success">Description of Action (Important)</div>
                        </div>
                        <div class="back p-3 px-4 bg-success text-center">
                            <p class="text-light">{{ $user['latest_medical_history']['description_action'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Payment</h2>
            </div>
            <div class="body">
                <form>
                    @php
                        $countPrice = 0
                    @endphp
                    @foreach ($user['action'] as $action)
                    <div class="mb-4">
                        <b>Tindakan / Action {{ $loop->iteration }}</b>
                    </div>
                    <div class="many-action">
                        <div class="form-group">
                            <label for="medicine">Medicine</label>
                            <select class="form-control w-100" disabled>
                                <option selected="selected" value="{{ $action['medicine']['id'] }}">{{ $action['medicine']['name'] }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" value="{{ $action['medicine']['price'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Sigma</label>
                            <input type="text" class="form-control" value="{{ $action['sigma'] }}" disabled>
                        </div>

                        <label>Dose</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text amount-1">{{ $action['medicine']['amount'] }}</span>
                            </div>
                            <input type="number" class="form-control" placeholder="Count" aria-label="Username" aria-describedby="basic-addon1" value="{{ $action['count'] }}" disabled>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text amount-1">Total harga obat {{ $action['medicine']['name'] }}</span>
                            </div>
                            <input type="number" class="form-control" placeholder="Count" aria-label="Username" aria-describedby="basic-addon1" value="{{ $action['medicine']['price'] * $action['count'] }}" disabled>
                            @php
                                $countPrice += $action['medicine']['price'] * $action['count']
                            @endphp
                        </div>
                    </div>

                        @if (!$loop->last)
                            <hr style="border-top: 1px solid rgba(0,0,0,.1);">
                        @endif
                    @endforeach

                    <div class="input-group mt-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text amount-1">Total Harga</span>
                        </div>
                        <input type="number" class="form-control" placeholder="Count" aria-label="" aria-describedby="basic-addon1" value="{{ $countPrice }}" disabled>
                    </div>
                    <button type="button" class="btn btn-primary mt-5" onclick="showAlertConfirm()">
                        Confirm to Receptionist
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    function showAlertConfirm() {
        swal({
            title: "Konfirmasikan ke Receptionist!",
            text: "Konfirmasi dan bayar terlebih dahulu ke receptionist !.",
            timer: 2000,
            showConfirmButton: false
        });
    }
</script>
@endsection
