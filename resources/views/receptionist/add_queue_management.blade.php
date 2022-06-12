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
            <li class="active"><a href="{{ url('receptionist/add-queue-page') }}">Add New Queue</a></li>
            <li><a href="{{ url('receptionist/queue-management') }}">Management Queue</a></li>
            <li><a href="{{ url('receptionist/queue-done') }}">List Queue Done</a></li>
        </ul>
    </li>
    @endsection
@section('content')

<div class="col-lg-12 col-md-12 mt-5">
    <div class="card">
        <div class="header d-flex justify-content-between">
            <h2>Patients who don't have a queue</h2>
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
                @foreach ($notHaveQueue as $medicalHistory)
                <tr>
                    <td>
                        <span>{{ $loop->iteration }}</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div>
                                <a href="javascript:void(0)" title="{{ $medicalHistory['patient']['name'] }}">{{ $medicalHistory['patient']['name'] }}</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span>{{ $medicalHistory['patient']['username'] }}</span>
                    </td>
                    <td>
                        <span>{{ $medicalHistory['patient']['nik'] }}</span>
                    </td>
                    <td>
                        <span>{{ $medicalHistory['patient']['email'] }}</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-default" title="Add queue" data-toggle="tooltip" data-placement="top" onclick="showAddQueue('{{ $medicalHistory['patient']['id'] }}', '{{ $medicalHistory['id'] }}')"><i class="fa fa-check-square-o"></i></button>
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
    let notHaveQueue = @json($notHaveQueue);

    $("#tableNoQueue").DataTable()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showAddQueue(patientId, medicalHistoryId) {
        let medicalHistory = notHaveQueue.find(medicalHistory => medicalHistory.id === medicalHistoryId)
        $("#createQueue").find(`input[type=hidden][name=patient_id]`).val(medicalHistory.patient.id)
        $("#createQueue").find(`input[type=hidden][name=medical_history_id]`).val(medicalHistory.id)
        $("#createQueue").find(`input[type=text][name=name]`).val(medicalHistory.patient.name)
        $("#createQueue").find(`input[type=text][name=username]`).val(medicalHistory.patient.username)
        $("#createQueue").find(`input[type=text][name=nik]`).val(medicalHistory.patient.nik)

        $("#createQueue").modal('show')
    }

    function createQueue() {
        let patientId = $("#createQueue").find(`input[type=hidden][name=patient_id]`).val()
        let medicalHistoryId = $("#createQueue").find(`input[type=hidden][name=medical_history_id]`).val()
        let doctorId = $("#createQueue").find(`select[name=doctor]`).val()
        let medicalHistory = notHaveQueue.find(medicalHistory => medicalHistory.id === medicalHistoryId)

        if (doctorId === null) {
            swal("Gagal!", `Gagal menambahkan antrian akun ${medicalHistory.patient.name}, silahkan lengkapi dengan siapa pasien ditangani`, "error");
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
                swal("Berhasil!", `Berhasil menambahkan antrian akun ${medicalHistory.patient.name}`, "success");

                window.setTimeout(function(){location.reload()},1000)
            },
            error: function (e) {
                swal("Gagal!", `Gagal menambahkan antrian akun ${medicalHistory.patient.name}`, "error");
            }
        });
    }
</script>
@endsection
