@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

    <style>
        .light_version .nav.nav-tabs .nav-link.active, .light_version .nav.nav-tabs .nav-link:hover, .light_version .nav.nav-tabs .nav-link:focus{
            background-color: #17C2D7;
            border: #17C2D7;
            color: white;
        }
    </style>

@endsection
@section('sidebar-biodata')
    <span>Welcome,</span>
    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Doctor</strong></a>
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
            <li><a href="{{ url('doctor/dashboard') }}">Dashboard</a></li>
            <li class="active"><a href="{{ url('doctor/medical-history/queues') }}">My Patient</a></li>
        </ul>
    </li>
    @endsection
@section('content')

<div class="row clearfix mt-5">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header d-flex justify-content-between">
                <h2>Medical History</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="list-patient-tab" data-toggle="tab" href="#list-patient" role="tab" aria-controls="list-patient" aria-selected="true">List Patient</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="history-patient-tab" data-toggle="tab" href="#history-patient" role="tab" aria-controls="history-patient" aria-selected="false">History Patient</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="list-patient" role="tabpanel" aria-labelledby="list-patient-tab">

                <div class="table-responsive">
                    <table class="table table-hover table-custom spacing5" id="patient">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Queue</th>
                                <th>Username</th>
                                <th>Nik </th>
                                <th>Allergic</th>
                                <th>Diagnosed</th>
                                <th>Hospitalization Surgery</th>
                                <th>Anamnesis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="renderUser">
                            <tr>
                                <td>1</td>
                                <td>
                                    <div>
                                        <a href="javascript:void(0)" id="name">Acil</a>
                                    </div>
                                    <div>
                                        <p id="email">reski@gmail.com</p>
                                    </div>
                                </td>
                                <td><span id="queue">4</span></td>
                                <td><span id="username">reski123</span></td>
                                <td><span id="nik">612981989</span></td>
                                <td><span id="allergic">Tenggorokan gatal</span></td>
                                <td><span id="diagnosed">-</span></td>
                                <td><span id="hospitalizationSurgery">-</span></td>
                                <td><span id="Anamnesis">-</span></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-default" onclick="" title="Medical History" data-toggle="modal" data-target="#editPatient"><i class="fa fa-folder-o"></i></button>
                                    <button type="button" class="btn btn-sm btn-default" onclick="deleteAccount('${user.id}')" title="Delete Queue" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="tab-pane fade" id="history-patient" role="tabpanel" aria-labelledby="history-patient-tab">
                <div class="table-responsive">
                    <table class="table table-hover table-custom spacing5" id="historyPatient">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Nik</th>
                                <th>Anamnesis </th>
                                <th>Diagnosis</th>
                                <th>Physical exam</th>
                                <th>Vital Sign</th>
                                <th>Desc</th>
                                <th>Tindakan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="renderUser">
                            <tr>
                                <td>1</td>
                                <td>
                                    <div>
                                        <a href="javascript:void(0)" id="name">Acil</a>
                                    </div>
                                    <div>
                                        <p id="email">reski@gmail.com</p>
                                    </div>
                                </td>
                                <td><span id="queue">4</span></td>
                                <td><span id="username">reski123</span></td>
                                <td><span id="nik">612981989</span></td>
                                <td><span id="allergic">Tenggorokan gatal</span></td>
                                <td><span id="diagnosed">-</span></td>
                                <td><span id="hospitalizationSurgery">-</span></td>
                                <td><span id="Anamnesis">-</span></td>
                                <td><span id="Action" class="badge badge-success">Done</span></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-default" onclick="" title="Medical History" data-toggle="modal" data-target="#editPatient"><i class="fa fa-folder-o"></i></button>
                                    <button type="button" class="btn btn-sm btn-default" onclick="deleteAccount('${user.id}')" title="Delete Queue" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>


    @include('doctor.modals._update_medical_history')
</div>


@endsection

@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script>

    $(document).ready( function () {
        $('#patient').DataTable();
    } );

    $(document).ready( function () {
        $('#historyPatient').DataTable();
    } );

</script>
@endsection
