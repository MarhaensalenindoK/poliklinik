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
            <li class="active"><a href="{{ url('receptionist/add-queue-page') }}">Add Queue</a></li>
            <li><a href="{{ url('receptionist/queue-management') }}">Management Queue</a></li>
        </ul>
    </li>
    @endsection
@section('content')

<div class="col-lg-12 col-md-12 mt-5">
    <div class="card">
        <div class="header d-flex justify-content-between">
            <h2>Pasien yang belum memiliki antrean</h2>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="table-responsive">
        <table class="table table-hover table-custom spacing5" id="tableNoQueue">
            <thead>
                <tr>
                    <th style="width: 20px;">#</th>
                    <th>name</th>
                    <th>username</th>
                    <th>nik</th>
                    <th>email</th>
                    <th>action</th>
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
                            </div>
                        </div>
                    </td>
                    <td>
                        <span>{{ $user['username'] }}</span>
                    </td>
                    <td>
                        <span>{{ $user['nik'] }}</span>
                    </td>
                    <td>
                        <span>{{ $user['email'] }}</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-default" title="Add queue" data-toggle="tooltip" data-placement="top" onclick="showAddQueue('{{ $user['id'] }}', '{{ $user['medical_history_patient']['id'] }}')"><i class="fa fa-check-square-o"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('receptionist.modals._create_queue')

@endsection
@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

@if(Session::has('message'))
    <script>
        let message = `{!! Session::get('message') !!}`
        swal({
            title: "Queue",
            text: `${message}`,
            html: true,
        })
    </script>
@endif

<script>
    let users = @json($users);

    $("#tableNoQueue").DataTable()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showAddQueue(patientId, medicalHistoryId) {
        let user = users.data.find(user => user.id === patientId)
        $("#createQueue").find(`input[type=hidden][name=patient_id]`).val(user.id)
        $("#createQueue").find(`input[type=hidden][name=medical_history_id]`).val(user.medical_history_patient.id)
        $("#createQueue").find(`input[type=text][name=name]`).val(user.name)
        $("#createQueue").find(`input[type=text][name=username]`).val(user.username)
        $("#createQueue").find(`input[type=text][name=nik]`).val(user.nik)

        $("#createQueue").modal('show')
    }

    function createQueue() {
        let patientId = $("#createQueue").find(`input[type=hidden][name=patient_id]`).val()
        let medicalHistoryId = $("#createQueue").find(`input[type=hidden][name=medical_history_id]`).val()
        let doctorId = $("#createQueue").find(`select[name=doctor]`).val()
        let user = users.data.find(user => user.id === patientId)

        if (doctorId === null) {
            swal("Gagal!", `Gagal menambahkan antrian akun ${user.name}, silahkan lengkapi dengan siapa pasien ditangani`, "error");
            return;
        }

        $.ajax({
            type: "post",
            url: `{{ url('/receptionist/database/queue') }}`,
            data: {
                patient_id : patientId,
                doctor_id : doctorId,
                medical_history_id : medicalHistoryId
            },
            success: function (response) {
                swal("Berhasil!", `Berhasil menambahkan antrian akun ${user.name}`, "success");

                window.setTimeout(function(){location.reload()},1000)
            },
            error: function (e) {
                swal("Gagal!", `Gagal menambahkan antrian akun ${user.name}`, "error");
            }
        });
    }
</script>
@endsection
