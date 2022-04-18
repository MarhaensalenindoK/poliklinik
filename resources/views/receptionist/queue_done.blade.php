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
    <li class="">
        <a href="javascript:void(0)" class="has-arrow"><i class="icon-home"></i><span>My Page</span></a>
        <ul>
            <li><a href="{{ url('receptionist/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('receptionist/patient-management') }}">Management Patient</a></li>
            <li><a href="{{ url('receptionist/medicine-management') }}">Management Medicine</a></li>
        </ul>
    </li>
    <li class="header">Queue</li>
    <li class="active open">
        <a href="javascript:void(0)" class="has-arrow"><i class="icon-briefcase"></i><span>Management Queue</span></a>
        <ul>
            <li><a href="{{ url('receptionist/add-queue-page') }}">Add New Queue</a></li>
            <li><a href="{{ url('receptionist/queue-management') }}">Management Queue</a></li>
            <li class="active"><a href="{{ url('receptionist/queue-done') }}">List Queue Done</a></li>
        </ul>
    </li>
    @endsection
@section('content')
<div class="row clearfix mt-5">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header d-flex justify-content-between">
                <h2>The queue has been completed</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableQueue">
                <thead>
                    <tr>
                        <th style="width: 20px;">#</th>
                        <th>Name</th>
                        <th>Queue</th>
                        <th>Date</th>
                        <th>Username</th>
                        <th>NIK</th>
                        <th>Anamnesis</th>
                        <th>Diagnosed</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($queues['data'] as $queue)
                    <tr>
                        <td>
                            <span>{{ $loop->iteration }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="javascript:void(0)" onclick="showModalPayment('{{ $queue['id'] }}')" title="{{ $queue['patient']['name'] }}">{{ $queue['patient']['name'] }}</a>
                            </div>
                            <span>{{ $queue['patient']['email'] }}</span>
                        </td>
                        <td>
                            <span>{{ $queue['queue'] }}</span>
                        </td>
                        <td>
                            <span>{{ $queue['date'] ?? '-' }}</span>
                        </td>
                        <td>
                            <span>{{ $queue['patient']['username'] }}</span>
                        </td>
                        <td>
                            <span>{{ $queue['patient']['nik'] ?? '-' }}</span>
                        </td>
                        <td>
                            <div class="text-wrap" style="width:23rem">
                                {{ $queue['medical_history']['anamnesis'] }}
                            </div>
                        </td>
                        <td>
                            <div class="text-wrap" style="width:23rem">
                                {{ $queue['medical_history']['diagnosis'] }}
                            </div>
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
    let queues = @json($queues);

    $("#tableQueue").DataTable()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endsection
