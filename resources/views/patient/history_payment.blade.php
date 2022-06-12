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
            <li><a href="{{ url('patient/dashboard') }}">Dashboard</a></li>
            <li class="active"><a href="{{ url('patient/history-payment') }}">History Payment</a></li>
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
            <table class="table table-hover table-custom spacing5" id="tableHistoryPayment">
                <thead>
                    <tr>
                        <th style="width: 20px;">#</th>
                        <th>Name</th>
                        <th>Queue</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Anamnesis</th>
                        <th>Diagnosed</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicalHistories['data'] as $medicalHistory)
                    <tr>
                        <td>
                            <span>{{ $loop->iteration }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="javascript:void(0)" onclick="showModalPayment('{{ $medicalHistory['id'] }}')" title="{{ $medicalHistory['patient']['name'] }}">{{ $medicalHistory['patient']['name'] }}</a>
                            </div>
                            <span>{{ $medicalHistory['patient']['email'] }}</span>
                        </td>
                        <td>
                            <span>{{ $medicalHistory['queue']['queue'] }}</span>
                        </td>
                        <td>
                            @switch($medicalHistory['queue']['status'])
                                @case('CHECKIN')
                                    <span class="badge badge-primary">CHECKIN</span>
                                        @break
                                    @case('CASHER')
                                    <span class="badge badge-warning">CASHER</span>
                                        @break
                                    @default
                                    <span class="badge badge-success">DONE</span>
                            @endswitch
                        </td>
                        <td>
                            <span>{{ $medicalHistory['queue']['date'] }}</span>
                        </td>
                        <td>
                            <div class="text-wrap" style="width:23rem">
                                {{ $medicalHistory['anamnesis'] }}
                            </div>
                        </td>
                        <td>
                            <div class="text-wrap" style="width:23rem">
                                {{ $medicalHistory['diagnosis'] }}
                            </div>
                        </td>
                        <td>
                            <span>
                                {{ $medicalHistory['total_payment'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('patient.modals._detail_payment')

@endsection
@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

<script>
    let medicalHistories = @json($medicalHistories);

    $("#tableHistoryPayment").DataTable()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showModalPayment(medicalHistoryId) {
        let medicalHistory = medicalHistories.data.find(medicalHistory => medicalHistory.id === medicalHistoryId)
        $("#detailPayment").find("input[type=hidden][name=medical_history_id]").val(medicalHistory.id);
        $("#detailPayment").find("#name").val(medicalHistory.patient.name ?? '-');
        $("#detailPayment").find("#nik").val(medicalHistory.patient.nik ?? '-');
        $("#detailPayment").find("#allergic").val(medicalHistory.allergic);
        $("#detailPayment").find("#anamnesis").val(medicalHistory.anamnesis);
        $("#detailPayment").find("#diagnosis").val(medicalHistory.diagnosis);
        $("#detailPayment").find("#physicalExam").val(medicalHistory.physical_exam);
        $("#detailPayment").find("#vitalSign").val(medicalHistory.vital_sign);
        $("#detailPayment").find("#desc").val(medicalHistory.description_action);

        let htmlBeenDiagnosed = ``
        let htmlHospSurgery = ``
        $.each(medicalHistory.been_diagnosed, function (key, item) {
            htmlBeenDiagnosed += `
            <li>${item}</li>
            `
        });

        $.each(medicalHistory.hospitalization_surgery, function (key, item) {
            htmlHospSurgery += `
            <li>${item.reason}</li>
            `
        });

        $("#detailPayment").find("#been-diagnosed").html(htmlBeenDiagnosed);
        $("#detailPayment").find("#hosp-surgery").html(htmlHospSurgery);
        let html = ``
        let number = 1
        let countPrice = 0
        $.each(medicalHistory.action, function (key, action) {
            countPrice += action.medicine.price * action.count
            html += `
            <div class="card mb-2">
                <div class="card-header" id="heading${key}">
                    <h5 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapse${action.id}" aria-expanded="true" aria-controls="collapse${action.id}">
                        <b>Tindakan / Action ${number++}</b>
                    </button>
                    </h5>
                </div>

                <div id="collapse${action.id}" class="collapse" aria-labelledby="heading${key}" data-parent="#accordion">
                    <div class="many-action">
                        <div class="form-group">
                            <label for="medicine">Medicine</label>
                            <select class="form-control w-100" disabled>
                                <option selected="selected" value="${action.medicine.name}">${action.medicine.name}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" value="${action.medicine.price}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Sigma</label>
                            <input type="text" class="form-control" value="${action.medicine.sigma}" disabled>
                        </div>

                        <label>Dose</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">${action.medicine.amount}</span>
                            </div>
                            <input type="number" class="form-control" placeholder="Count" aria-label="Username" aria-describedby="basic-addon1" value="${action.count}" disabled>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Total harga obat obat</span>
                            </div>
                            <input type="number" class="form-control" placeholder="Count" aria-label="Username" aria-describedby="basic-addon1" value="${action.medicine.price * action.count}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            `
        });

        $("#detailPayment").find('#accordionPayment').html(html)
        $("#detailPayment").find('#totalPayment').val(countPrice)


        $("#detailPayment").modal('show')
    }
</script>
@endsection
