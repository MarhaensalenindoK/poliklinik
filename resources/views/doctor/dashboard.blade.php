@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
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
            <li class="active"><a href="{{ url('doctor/dashboard') }}">Dashboard</a></li>
            <li><a>My Patient</a></li>
        </ul>
    </li>
    @endsection
@section('content')
<div class="row clearfix mt-5">
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-users"></i></div>
                    <div class="ml-4">
                        <span>Total Antrian Hari Ini</span>
                        <h4 class="mb-0 font-weight-medium">{{ $users['total'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-green text-white rounded-circle"><i class="fa fa-users"></i></div>
                    <div class="ml-4">
                        <span>Total Pasien (CASHER)</span>
                        <h4 class="mb-0 font-weight-medium">{{ $totalUser }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-blue text-white rounded-circle"><i class="fa fa-users"></i></div>
                    <div class="ml-4">
                        <span>Total Pasien (CHECKUP)</span>
                        <h4 class="mb-0 font-weight-medium">{{ $totalUser }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header d-flex justify-content-between">
                <h2>Pasien yang belum check up</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing5"">
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
                <tbody >
                    <tr>
                        <td>
                            <span>01</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:void(0)" title=>Reski Junaedi</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>Saekyo</span>
                        </td>
                        <td>
                            <span>612981989</span>
                        </td>
                        <td>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="Check" data-toggle="tooltip" data-placement="top"><i class="fa fa-check-square-o"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>02</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:void(0)" title=>Reski Junaedi</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>Saekyo</span>
                        </td>
                        <td>
                            <span>612981989</span>
                        </td>
                        <td>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="Check" data-toggle="tooltip" data-placement="top"><i class="fa fa-check-square-o"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>03</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:void(0)" title=>Reski Junaedi</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>Saekyo</span>
                        </td>
                        <td>
                            <span>612981989</span>
                        </td>
                        <td>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn " title="Check" data-toggle="tooltip" data-placement="top"><i class="fa fa-check-square-o"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>04</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:void(0)" title=>Reski Junaedi</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>Saekyo</span>
                        </td>
                        <td>
                            <span>612981989</span>
                        </td>
                        <td>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="Check" data-toggle="tooltip" data-placement="top"><i class="fa fa-check-square-o"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>05</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:void(0)" title=>Reski Junaedi</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>Saekyo</span>
                        </td>
                        <td>
                            <span>612981989</span>
                        </td>
                        <td>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="Check" data-toggle="tooltip" data-placement="top"><i class="fa fa-check-square-o"></i></button>
                        </td>
                    </tr>
                    
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
let users = @json($users)

showAddQueue(patientId, medicalHistoryId) {
		let user = users.find(user => user.id === patientId)
		swal({
            title: "Tambahkan ke antrian?",
            text: `Yakin ingin menghapus akun <b>${user.name}</b> ?`,
            type: "warning",
            confirmButtonColor: "#dc3545",
            confirmButtonText: "Add",
            cancelButtonText: "Tutup",
            html: true,
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, function () {
            $.ajax({
                type: "post",
                url: `{{ url('/doctor/database/queue') }}`,
                data: {
                    patient_id : patientId,
										medical_history_id : medicalHistoryId
                },
                success: function (response) {
                    swal("Berhasil!", `Berhasil menambahkan antrian akun ${user.name}`, "success");
                    location.reload()
                }
            });
        })
}
</script>
@endsection