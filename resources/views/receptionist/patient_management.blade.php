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
            <li><a href="{{ url('receptionist/dashboard') }}">Dashboard</a></li>
            <li class="active"><a href="{{ url('receptionist/patient-management') }}">Management Patient</a></li>
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
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header d-flex justify-content-between">
                <h2>Patient</h2>
                <button type="button" onclick="showModalCreatePatient()" class="btn btn-primary float-right">
                    Create Account
                </button>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tablePatient">
                <thead>
                    <tr>
                        <th style="width: 20px;">#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Nik</th>
                        <th>Alergic</th>
                        <th>Diagnosed</th>
                        <th>Hospitalzation surgery</th>
                        <th>Amnanesis</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="renderUser">
                    @foreach ($patients['data'] as $patient)
                    <tr>
                        <td>
                            <span>{{ $loop->iteration }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href= "javascript:void(0)" onclick="showModalUpdatePatient('{{ $patient['id'] }}')" title="{{ $patient['name'] }}">{{ $patient['name'] }}</a>
                            </div>
                            <span>{{ $patient['email'] }}</span>
                        </td>
                        <td>
                            <span>{{ $patient['username'] }}</span>
                        </td>
                        <td>
                            <span>{{ $patient['nik'] }}</span>
                        </td>
                        <td>
                            <div class="text-wrap" style="width:23rem">
                                {{ $patient['medical_history_patient']['allergic'] ?? '-' }}
                            </div>
                        </td>
                        <td>
                            <div class="text-wrap" style="width:23rem">
                                @foreach ($patient['medical_history_patient']['been_diagnosed'] as $item)
                                    @if($loop->last)
                                        {{ $item }}
                                    @else
                                        {{ $item }} ,
                                    @endif
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <ol>
                                @foreach ($patient['medical_history_patient']['hospitalization_surgery'] as $item)
                                    <li>{{ $item['reason'] }}</li>
                                @endforeach
                            </ol>
                        </td>
                        <td>
                            <div class="text-wrap" style="width:23rem">
                                {{ $patient['medical_history_patient']['anamnesis'] }}
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" onclick="showModalUpdatePatient('{{ $patient['id'] }}')" title="Update Patient" data-toggle="tooltip" data-placement="top"><i class="icon-pencil"></i></button>
                            <button type="button" class="btn btn-sm btn-default" onclick="deletePatient('{{ $patient['id'] }}')" title="Delete Patient" data-toggle="tooltip" data-placement="top" {{ $patient['queue'] === null ? '' : 'disabled' }}><i class="icon-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('receptionist.modals._create_patient')
@include('receptionist.modals._update_patient')
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

@if(Session::has('message'))
    <script>
        let message = `{!! Session::get('message') !!}`
        swal({
            title: "Patient & Medical History",
            text: `<div class="text-left">${message}</div>`,
            html: true,
        })
    </script>
@endif

<script>
    let patients = @json($patients);


    $(document).ready( function () {
        $('#tablePatient').DataTable();
    } );


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    function showModalCreatePatient() {
        $('#createPatient').modal('show')
    }

    function addInputHS() {
        let inputLength = $('#createPatient').find(".inputManyHS").length
        let html = `
            <div class="mt-3 inputManyHS input-HS-${inputLength + 1}" style="display:none">
                <div class="d-flex">
                    <input name="hospitalization_surgery[]" type="text" class="form-control" id="hospitalizationSurgery" aria-describedby="hospitalizationSurgery">
                    <button type="button" class="btn btn-primary ml-2" onclick="removeInputHS(${inputLength + 1})">X</button>
                </div>
            </div>
        `

        $('#createPatient').find("#hospitalizationSurgeryInput").append(html)
        $('#createPatient').find("#hospitalizationSurgeryInput").find(`.input-HS-${inputLength + 1}`).show('slow')
    }

    function removeInputHS(index) {
        $("#createPatient").find(`.input-HS-${index}`).hide('slow', function(){ $(this).remove(); });
    }

    function addInputHSUpdate() {
        let inputLength = $('#updatePatient').find(".inputManyHS").length
        let html = `
            <div class="mt-3 inputManyHS input-HS-${inputLength + 1}" style="display:none">
                <div class="d-flex">
                    <input name="hospitalization_surgery[]" type="text" class="form-control" id="hospitalizationSurgery" aria-describedby="hospitalizationSurgery">
                    <button type="button" class="btn btn-primary ml-2" onclick="removeInputHSUpdate(${inputLength + 1})">X</button>
                </div>
            </div>
        `

        $('#updatePatient').find("#hospitalizationSurgeryInputUpdate").append(html)
        $('#updatePatient').find("#hospitalizationSurgeryInputUpdate").find(`.input-HS-${inputLength + 1}`).show('slow')
    }

    function removeInputHSUpdate(index) {
        $("#updatePatient").find(`.input-HS-${index}`).hide('slow', function(){ $(this).remove(); });
    }

    function deletePatient(patientId) {
        let patient = patients.data.find(user => user.id === patientId)
        swal({
            title: "Delete Patient",
            text: `Yakin ingin menghapus pasien <b>${patient.name}</b> ?`,
            type: "warning",
            confirmButtonColor: "#dc3545",
            confirmButtonText: "Hapus",
            cancelButtonText: "Tutup",
            html: true,
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, function () {
            $.ajax({
                type: "delete",
                url: `{{ url('receptionist/database/patient') }}`,
                data: {
                    user_id : patientId
                },
                success: function (response) {
                    swal("Berhasil!", `Berhasil menghapus pasien ${patient.name}`, "success");
                    window.setTimeout(function(){location.reload()},1000)
                },
                error: function (e) {
                    swal("Gagal!", `Gagal menghapus pasien ${patient.name}`, "error");
                }
            });
        })
    }

    function showModalUpdatePatient(patientId) {
        let patient = patients.data.find(user => user.id === patientId)
        $('#updatePatient').find('input[type=text]').val('')
        $('#updatePatient').find('input[type=email]').val('')
        $('#updatePatient').find('input[type=checkbox]').prop('checked', false)
        $('#updatePatient').find('textarea').val('')
        $('#updatePatient').find('input[type=hidden][name=user_id]').val(patient.id)
        $('#updatePatient').find('input[type=hidden][name=medical_history_id]').val(patient.medical_history_patient.id)
        $('#updatePatient').find('input[type=text][name=name]').val(patient.name)
        $('#updatePatient').find('input[type=text][name=username]').val(patient.username)
        $('#updatePatient').find('input[type=text][name=nik]').val(patient.nik)
        $('#updatePatient').find('input[type=email][name=email]').val(patient.email)
        $('#updatePatient').find('textarea[name=anamnesis]').val(patient.medical_history_patient.anamnesis)

        $("#hospitalizationSurgeryInputUpdate").html(`
            <div class="inputManyHS input-HS-1">
                <input name="hospitalization_surgery[]" type="text" class="form-control" id="hospitalizationSurgery1" aria-describedby="hospitalizationSurgery">
            </div>
        `);

        if (patient.medical_history_patient.allergic !== [] ||
        patient.medical_history_patient.allergic !== null) {
            $.each(patient.medical_history_patient.allergic.split(', '), function (key, allergic) {
                let checkForCheckBox = $(`input[type=checkbox][value="${allergic}"]`).length

                if (checkForCheckBox === 0) {
                    $('#updatePatient').find("#otherAllergic").val(allergic);
                } else {
                    $('#updatePatient').find(`input[type=checkbox][value="${allergic}"]`).prop('checked', true)
                }
            });
        }

        if (patient.medical_history_patient.been_diagnosed != '') {
            $.each(patient.medical_history_patient.been_diagnosed, function (key, diagnosed) {
                let checkForCheckBox = $(`input[type=checkbox][value="${diagnosed}"]`).length

                if (checkForCheckBox === 0) {
                    $('#updatePatient').find("#otherDiagnosed").val(diagnosed);
                } else {
                    $('#updatePatient').find(`input[type=checkbox][value="${diagnosed}"]`).prop('checked', true)
                }
            });
        }

        if (patient.medical_history_patient.hospitalization_surgery != '') {
            let htmlHS = ``
            $.each(patient.medical_history_patient.hospitalization_surgery, function (key, hsurgery) {
                htmlHS += `
                <div class="mt-3 inputManyHS input-HS-${key + 1}">
                    <div class="d-flex">
                        <input name="hospitalization_surgery[]" type="text" class="form-control" id="hospitalizationSurgery" aria-describedby="hospitalizationSurgery" value="${hsurgery.reason}">
                        <button type="button" class="btn btn-primary ml-2" onclick="removeInputHS(${key + 1})">X</button>
                    </div>
                </div>
                `
            });

            $("#hospitalizationSurgeryInputUpdate").html(htmlHS);
        }


        $('#updatePatient').modal('show')
    }
</script>
@endsection
