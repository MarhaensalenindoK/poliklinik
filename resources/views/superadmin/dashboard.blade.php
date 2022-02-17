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
        <li><a href="{{ url('/logout') }}"><i class="icon-power"></i>Logout</a></li>
    </ul>
    @endsection

    @section('sidebar-menu')
    <li class="header">Main</li>
    <li class="active open">
        <a href="#myPage" class="has-arrow"><i class="icon-home"></i><span>My Page</span></a>
        <ul>
            <li class="active"><a href="index.html">Dashboard</a></li>
            <li><a href="javascript:void(0)">Clinic Management</a></li>
            <li><a href="javascript:void(0)">Account Management</a></li>
        </ul>
    </li>
    @endsection
@section('content')
    <div class="container-fluid">
        <div class="row clearfix mt-5">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Users</h2>
                    </div>
                    <div class="body">
                        <div class="row text-center">
                            <div class="col-6 border-right pb-4 pt-4">
                                <label class="mb-0">Total Users</label>
                                <h4 class="font-30 font-weight-bold text-col-blue">{{ $totalUser }}</h4>
                            </div>
                            <div class="col-6 pb-4 pt-4">
                                <label class="mb-0">Total Clinic</label>
                                <h4 class="font-30 font-weight-bold text-col-blue">{{ $clinics['total'] }}</h4>
                            </div>
                            <div class="col-12">
                                <hr style="border: 1px solid rgb(225 232 237);">
                            </div>
                            <div class="col-6 border-right pb-4 pt-4">
                                <label class="mb-0">Total Super Admin</label>
                                <h4 class="font-30 font-weight-bold text-col-blue">{{ $users['total'] }}</h4>
                            </div>
                            <div class="col-6 pb-4 pt-4">
                                <label class="mb-0">Total Non-Active Account</label>
                                <h4 class="font-30 font-weight-bold text-col-blue">{{ $totalUserNonActive }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12" >
                <div class="card">
                    <div class="header">
                        <h2>Clinics</h2>
                    </div>
                    <div class="body border-bottom-0" id="renderClinic">
                        @foreach ($clinics['data'] as $clinic)
                            <div class="mx-2 cursor-pointer">
                                <div class="card">
                                    <div class="body text-center" style="min-height: 20rem;">
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
                    <div class="body border-top-0">
                        <span class="color-blue-1 cursor-pointer" onclick=""><u>More</u></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-custom spacing5" id="table_id">
                        <thead>
                            <tr>
                                <th style="width: 20px;">#</th>
                                <th>Super admin</th>
                                <th style="width: 50px;">email</th>
                                <th style="width: 50px;">Status</th>
                                <th style="width: 110px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users['data'] as $user)
                            <tr>
                                <td>
                                    <span>{{ $loop->iteration }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <a href="javascript:void(0)" title="{{ $user['name'] }}">{{ $user['name'] }}</a>
                                            <p class="mb-0">{{ $user['username'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user['email'] !== null ? $user['email'] : '-' }}</td>
                                <td>
                                    <span class="badge {{ $user['status'] === 1 ? 'badge-success' : 'badge-danger' }} ml-0 mr-0">
                                        {{ $user['status'] === 1 ? 'Active' : 'Non-active' }}
                                    </span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-default" title="Reset Password" data-toggle="tooltip" data-placement="top"><i class="icon-reload"></i></button>
                                    <button type="button" class="btn btn-sm btn-default " title="Update Account" data-toggle="tooltip" data-placement="top"><i class="icon-pencil"></i></button>
                                    <button type="button" class="btn btn-sm btn-default" title="Delete Account" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
    $('#renderClinic').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 2,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
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
