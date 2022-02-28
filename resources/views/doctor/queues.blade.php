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
                    <table class="table table-hover table-custom spacing5" id="patient" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Queue</th>
                                <th>Username</th>
                                <th>Nik </th>
                                <th>Allergic</th>
                                <th>Diagnosed</th>
                                <th>Recent Hospitalization or Surgery</th>
                                <th>Anamnesis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($queueCheckin as $queue)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div>
                                        <a href="javascript:void(0)" id="name" onclick="showModalMedicalHistory('{{ $queue['id'] }}')">{{ $queue['patient']['name'] }}</a>
                                    </div>
                                    <div>
                                        <p id="email">{{ $queue['patient']['email'] }}</p>
                                    </div>
                                </td>
                                <td><span id="queue">{{ $queue['queue'] }}</span></td>
                                <td><span id="username">{{ $queue['patient']['username'] }}</span></td>
                                <td><span id="nik">{{ $queue['patient']['nik'] ?? '-' }}</span></td>
                                <td><span id="allergic">{{ $queue['medical_history']['allergic'] }}</span></td>
                                <td>
                                    <span id="diagnosed">
                                        @foreach ($queue['medical_history']['been_diagnosed'] as $item)
                                            @if($loop->last)
                                                {{ $item }}
                                            @else
                                                {{ $item }} ,
                                            @endif
                                        @endforeach
                                    </span>
                                </td>
                                <td>
                                    <ol>
                                        @foreach ($queue['medical_history']['hospitalization_surgery'] as $item)
                                            <li>{{ $item['reason'] }}</li>
                                        @endforeach
                                    </ol>
                                </td>
                                <td class="">
                                    <div class="text-wrap" style="width:23rem">
                                        {{ $queue['medical_history']['anamnesis'] }}
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-default" onclick="showModalMedicalHistory('{{ $queue['id'] }}')" title="Medical History"><i class="fa fa-folder-o"></i></button>
                                    <button type="button" class="btn btn-sm btn-default" onclick="deleteQueue('{{ $queue['id'] }}')" title="Delete Queue" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
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
                                <th>nik</th>
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
                            @foreach ($queueNotCheckin as $queue)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div>
                                        <a href="javascript:void(0)" id="name" onclick="showModalMedicalHistory('{{ $queue['id'] }}', 'history')">{{ $queue['patient']['name'] }}</a>
                                    </div>
                                    <div>
                                        <p id="email">{{ $queue['patient']['email'] }}</p>
                                    </div>
                                </td>
                                <td><span>{{ $queue['patient']['username'] }}</span></td>
                                <td><span>{{ $queue['patient']['nik'] }}</span></td>
                                <td>
                                    <div class="text-wrap" style="width:23rem">
                                        {{ $queue['medical_history']['anamnesis'] }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap" style="width:23rem">
                                        {{ $queue['medical_history']['diagnosis'] ?? '-' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap" style="width:23rem">
                                        {{ $queue['medical_history']['physical_exam'] ?? '-' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap" style="width:23rem">
                                        {{ $queue['medical_history']['vital_sign'] ?? '-' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap" style="width:23rem">
                                        {{ $queue['medical_history']['description_action'] ?? '-' }}
                                    </div>
                                </td>
                                <td>
                                    <span class="badge {{ $queue['action'] === [] ? 'badge-danger' : 'badge-success' }}">
                                        {{ $queue['action'] === [] ? 'Not Yet' : 'Done' }}
                                    </span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-default" onclick="showModalMedicalHistory('{{ $queue['id'] }}', 'history')" title="Medical History"><i class="fa fa-folder-o"></i></button>
                                    <button type="button" class="btn btn-sm btn-default" onclick="deleteAccount('${user.id}')" title="Delete Queue" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
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
@if (Session::has('message'))
    <script>
        let message = `{!! Session::get('message') !!}`
        swal({
            title: "Update Medical History",
            text: `<div class="text-left">${message}</div>`,
            html: true,
        })
    </script>
@endif
<script>
    let queues = @json($queues);
    let queuesHistory = @json($queueNotCheckin);
    let medicines = @json($medicines);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready( function () {
        $('#patient').DataTable();
        $('#historyPatient').DataTable();
    } );

    function showModalMedicalHistory (queueId, type = null) {
        let queue = queues.data.find(thisQueue => thisQueue.id === queueId)
        console.log(queue, queueId)
        $("#editPatient").find("#patient_id").val(queue.patient.id);
        $("#editPatient").find("#queue_id").val(queue.id);
        $("#editPatient").find("#medical_history_id").val(queue.medical_history.id);
        $("#editPatient").find("#name").val(queue.patient.name);
        $("#editPatient").find("#username").val(queue.patient.username);
        $("#editPatient").find("#nik").val(queue.patient.nik ?? '-');
        $("#editPatient").find("#allergic").val(queue.medical_history.allergic);
        $("#editPatient").find("#anamnesis").val(queue.medical_history.anamnesis);
        $("#editPatient").find("#diagnosis").val(queue.medical_history.diagnosis);
        $("#editPatient").find("#physicalExam").val(queue.medical_history.physical_exam);
        $("#editPatient").find("#vitalSign").val(queue.medical_history.vital_sign);
        $("#editPatient").find("#desc").val(queue.medical_history.description_action);

        let htmlBeenDiagnosed = ``
        let htmlHospSurgery = ``
        $.each(queue.medical_history.been_diagnosed, function (key, item) {
            htmlBeenDiagnosed += `
            <li>${item}</li>
            `
        });

        $.each(queue.medical_history.hospitalization_surgery, function (key, item) {
            htmlHospSurgery += `
            <li>${item.reason}</li>
            `
        });

        $("#editPatient").find("#been-diagnosed").html(htmlBeenDiagnosed);
        $("#editPatient").find("#hosp-surgery").html(htmlHospSurgery);

        if (type !== null) {
            let queueHistory = queuesHistory.find(queueHist => queueHist.id === queueId)
            htmlAction = ``
            if (queueHistory.action.length > 0) {
                $.each(queueHistory.action, function (key, action) {
                    let htmlDose = ``
                        htmlAction += `
                            <div class="many-action action-${key + 1}">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary my-3" onclick="removeInputAction(${key + 1}, '${action.id}', '${queueHistory.id}')">
                                        X
                                    </button>
                                    <label for="medicine">Medicine</label>
                                    <select class="form-control w-100" name="medicineUpdate[]" id="medicine" onchange="doseMedicine(this, ${key + 1})" disabled>
                                        <option value="null">Medicine</option>`
                                        $.each(medicines.data, function (key, medicine) {
                                            htmlAction += `
                                            <option value="${medicine.id}"`

                                            if (medicine.id === action.medicine_id) {
                                                htmlDose = medicine.amount
                                                htmlAction += `selected`
                                            }

                                            htmlAction += `>${medicine.name}</option>
                                            `
                                        });
                            htmlAction +=`</select>
                                </div>
                                <div class="form-group">
                                    <label>Sigma</label>
                                    <input type="text" name="sigmaUpdate[]" id="sigma" class="form-control" value="${action.sigma}" disabled>
                                </div>

                                <label>Dose</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text amount-${key + 1}" id="amount">${htmlDose}</span>
                                    </div>
                                    <input type="number" name="countUpdate[]" class="form-control" placeholder="Count" aria-label="Username" aria-describedby="basic-addon1" value="${action.count}" disabled>
                                </div>
                            </div>
                            `
                });

                $("#editPatient").find("#action").html(htmlAction);
            }
        }

        $("#editPatient").modal('show')
    }

    function doseMedicine(selection, key) {
        let medicine = medicines.data.find(thisMedicine => thisMedicine.id === selection.value)

        $(".amount-" + key).html(medicine.amount);
    }

    function addInputAction() {
        let inputLength = $("#editPatient").find(".many-action").length
        let html = `
        <div class="many-action action-${inputLength + 1}" style="display: none;">
            <div class="form-group">
                <button type="button" class="btn btn-primary my-3" onclick="removeInputAction(${inputLength + 1})">
                    X
                </button>
                <label for="medicine">Medicine</label>
                <select class="form-control w-100" name="medicine[]" id="medicine" onchange="doseMedicine(this, ${inputLength + 1})">
                    <option selected="selected" value="null">Medicine</option>`
                    $.each(medicines.data, function (key, medicine) {
                        html += `
                        <option value="${medicine.id}">${medicine.name}</option>
                        `
                    });
        html +=`</select>
            </div>
            <div class="form-group">
                <label>Sigma</label>
                <input type="text" name="sigma[]" id="sigma" class="form-control">
            </div>

            <label>Dose</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text amount-${inputLength + 1}">-</span>
                </div>
                <input type="number" name="count[]" class="form-control" placeholder="Count" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        `

        $("#editPatient").find("#action").append(html);
        $("#editPatient").find("#action").find(`.action-${inputLength + 1}`).show('slow')
    }

    function removeInputAction(index, actionId = null, queueId = null) {
        if (actionId !== null && queueId !== null) {
            deleteAction(actionId, queueId, index)
        } else {
            $("#editPatient").find(`.action-${index}`).hide('slow', function(){ $(this).remove(); });
        }
    }

    function deleteAction(actionId, queueId, indexInput) {
        let url = `{{ url('doctor/medical-history/action') }}`

        $.ajax({
            type: "delete",
            url: url,
            data: {
                action_id : actionId,
                queue_id : queueId,
            },
            success: function (response) {
                queuesHistory.map(queue => {
                    if(queue.id === queueId) {
                        queue.action.filter(act => {
                            return act.id !== actionId
                        })
                    }
                    return queue
                })

                removeInputAction(indexInput)
                swal("Berhasil!", "Berhasil menghapus tindakan", "success");
            },
            error: function (e) {
                swal("Gagal!", "Gagal menghapus tindakan", "error");
            }
        });
    }

</script>
@endsection
