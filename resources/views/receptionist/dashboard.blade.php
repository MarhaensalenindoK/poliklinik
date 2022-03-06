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
            <li class="active"><a href="{{ url('receptionist/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('receptionist/patient-management') }}">Management Patient</a></li>
            <li><a href="{{ url('receptionist/medicine-management') }}">Management Medicine</a></li>
        </ul>
    </li>

    <li class="header">Queue</li>
    <li class="">
        <a href="javascript:void(0)" class="has-arrow"><i class="icon-briefcase"></i><span>Management Queue</span></a>
        <ul>
            <li><a href="{{ url('receptionist/add-queue-page') }}">Add Queue</a></li>
            <li><a href="{{ url('receptionist/queue-management') }}">Management Queue</a></li>
        </ul>
    </li>
    @endsection
@section('content')
<div class="row clearfix mt-5">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Users</h2>
            </div>
            <div class="body">
                <div class="row text-center">
                    <div class="col-6 border-right pb-4 pt-4">
                        <label class="mb-0">Total Users Patient</label>
                        <h4 class="font-30 font-weight-bold text-col-blue">{{ $totalPatient }}</h4>
                    </div>
                    <div class="col-6 pb-4 pt-4">
                        <label class="mb-0">Total User(CASHER)</label>
                        <h4 class="font-30 font-weight-bold text-col-blue">{{ $totalQueueCasher }}</h4>
                    </div>
                    <div class="col-12">
                        <hr style="border: 1px solid rgb(225 232 237);">
                    </div>
                    <div class="col-6 border-right pb-4 pt-4">
                        <label class="mb-0">Total User(CHECKIN)</label>
                        <h4 class="font-30 font-weight-bold text-col-blue">{{ $totalQueueCheckin }}</h4>
                    </div>
                    <div class="col-6 pb-4 pt-4">
                        <label class="mb-0">Total User(DONE)</label>
                        <h4 class="font-30 font-weight-bold text-col-blue">{{ $totalQueueDone }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Diagram Patient</h2>
            </div>
            <div class="body">
                <div id="chart-pie" style="height: 260px"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tablePatient">
                <thead>
                    <tr>
                        <th style="width: 20px;">#</th>
                        <th>Nama</th>
                        <th style="width:50px;">email</th>
                        <th style="width:50px;">Status</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($users['data'] as $user)
                    <tr>
                        <td>
                            <span>{{ $loop->iteration }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:void(0)" title="{{ $user['name'] }}">{{ $user['name'] }}</a>
                                </div>
                            </div>
                            <span>{{ $user['username'] }}</span>
                        </td>
                        <td>
                            <span>{{ $user['email'] }}</span>
                        </td>
                        <td>
                            @if ($user['queue'] !== null)

                            @switch($user['queue']['status'])
                                @case('CHECKIN')
                                    <span class="badge badge-primary">CHECKIN</span>
                                        @break
                                    @case('CASHER')
                                    <span class="badge badge-warning">CASHER</span>
                                        @break
                                    @default
                                    <span class="badge badge-success">DONE</span>
                                @endswitch
                            @else
                            <span class="badge badge-info">DONT HAVE</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    let totalCheckin = parseInt(`{{ $totalQueueCheckin }}`)
    let totalCasher = parseInt(`{{ $totalQueueCasher }}`)
    let totalDone = parseInt(`{{ $totalQueueDone }}`)

    $("#tablePatient").DataTable()

    c3.generate({
        bindto: '#chart-pie',
        data: {
            columns: [
                ['data1', totalCheckin],
                ['data2', totalCasher],
                ['data3', totalDone]
            ],
            type: 'pie',
            colors: {
                'data1': '#1c3353',
                'data2': '#007FFF',
                'data3': '#c8d9f1',
            },
            names: {
                'data1': 'checkin',
                'data2': 'casher',
                'data3': 'done',
            }
        },
        axis: {
        },
        legend: {
            show: true,
        },
        padding: {
            bottom: 20,
            top: 0
        },
    });
</script>
@endsection
