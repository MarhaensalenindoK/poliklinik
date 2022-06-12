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
            <li><a href="{{ url('receptionist/add-queue-page') }}">Add New Queue</a></li>
            <li class="active"><a href="{{ url('receptionist/queue-management') }}">Management Queue</a></li>
            <li><a href="{{ url('receptionist/queue-done') }}">List Queue Done</a></li>
        </ul>
    </li>
    @endsection
@section('content')
<div class="row clearfix mt-5">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header d-flex justify-content-between">
                <h2>Queue</h2>
                <button type="button" onclick="showModalCreateQueue()" class="btn btn-primary float-right">
                    Create Queue from existing patient
                </button>
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
                        <th>Status</th>
                        <th>Action</th>
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
                            @switch($queue['status'])
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
                        <button type="button" class="btn btn-sm btn-default" onclick="showModalUpdateQueue('{{ $queue['id'] }}')" title="Update Queue" data-toggle="tooltip" data-placement="top"><i class="icon-pencil"></i></button>
                        <button type="button" class="btn btn-sm btn-default" onclick="showModalDeleteQueue('{{ $queue['id'] }}')" title="Delete Queue" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('receptionist.modals._update_queue')
@include('receptionist.modals._create_existing_queue')
@include('receptionist.modals._payment')

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
    let queues = @json($queues);

    $("#tableQueue").DataTable()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showModalUpdateQueue(queueId) {
        let queue = queues.data.find(thisQueue => thisQueue.id === queueId)
        $("#updateQueue").find(`input[type=hidden][name=queue_id]`).val(queue.id)
        $("#updateQueue").find(`input[type=text][name=name]`).val(queue.patient.name)
        $("#updateQueue").find(`input[type=text][name=username]`).val(queue.patient.username)
        $("#updateQueue").find(`input[type=text][name=nik]`).val(queue.patient.nik)
        $("#updateQueue").find(`input[type=number][name=queue]`).val(queue.queue)

        $("#updateQueue").find(`select[name=status] option[value=${queue.status}]`).prop('selected', true)

        $("#updateQueue").find(`select[name=status]`).prop('disabled', false)
        $("#updateQueue").find(`#btn-update`).prop('disabled', false)
        if (queue.medical_history.examiner_id !== null) {
            $("#updateQueue").find(`select[name=doctor] option[value=${queue.medical_history.examiner_id}]`).prop('selected', true)
        }

        console.log(queue)
        if (queue.status === 'DONE') {
            $("#updateQueue").find(`select[name=status]`).prop('disabled', true)
            $("#updateQueue").find(`select[name=doctor]`).prop('disabled', true)
            $("#updateQueue").find(`#btn-update`).prop('disabled', true)
        } else {
            $("#updateQueue").find(`select[name=status]`).prop('disabled', false)
            $("#updateQueue").find(`select[name=doctor]`).prop('disabled', false)
            $("#updateQueue").find(`#btn-update`).prop('disabled', false)
        }

        $("#updateQueue").modal('show')
    }

    function showModalCreateQueue() {
        $("#createExistingQueue").modal('show')
    }

    function addInputHS() {
        let inputLength = $('#createExistingQueue').find(".inputManyHS").length
        let html = `
            <div class="mt-3 inputManyHS input-HS-${inputLength + 1}" style="display:none">
                <div class="d-flex">
                    <input name="hospitalization_surgery[]" type="text" class="form-control" id="hospitalizationSurgery" aria-describedby="hospitalizationSurgery">
                    <button type="button" class="btn btn-primary ml-2" onclick="removeInputHS(${inputLength + 1})">X</button>
                </div>
            </div>
        `

        $('#createExistingQueue').find("#hospitalizationSurgeryInput").append(html)
        $('#createExistingQueue').find("#hospitalizationSurgeryInput").find(`.input-HS-${inputLength + 1}`).show('slow')
    }

    function removeInputHS(index) {
        $("#createExistingQueue").find(`.input-HS-${index}`).hide('slow', function(){ $(this).remove(); });
    }

    function showModalDeleteQueue(queueId) {
        let queue = queues.data.find(thisQueue => thisQueue.id === queueId)
        swal({
            title: "Delete Queue",
            text: `Yakin ingin menghapus antrean pasien <b>${queue.patient.name}</b> ?`,
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
                url: `{{ url('receptionist/database/queue') }}`,
                data: {
                    queue_id : queueId
                },
                success: function (response) {
                    swal("Berhasil!", `Berhasil menghapus antrean pasien ${queue.patient.name}`, "success");
                    window.setTimeout(function(){location.reload()},1000)
                },
                error: function (e) {
                    swal("Gagal!", `Gagal menghapus antrean pasien ${queue.patient.name}`, "error");
                }
            });
        })
    }

    function showModalPayment(queueId) {
        let queue = queues.data.find(thisQueue => thisQueue.id === queueId)
        $("#payment").find(`input[type=hidden][name=queue_id]`).val(queue.id)
        $("#payment").find(`input[type=hidden][name=medical_history_id]`).val(queue.medical_history.id)
        $("#payment").find(`input[type=text][name=name]`).val(queue.patient.name)
        $("#payment").find(`input[type=text][name=username]`).val(queue.patient.username)
        $("#payment").find(`input[type=text][name=nik]`).val(queue.patient.nik)
        let html = ``
        let number = 1
        let countPrice = 0
        $.each(queue.action, function (key, action) {
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

        if (queue.status === 'DONE') {
            $("#payment").find('#btn-payment').prop('disabled', true)
        }

        $("#payment").find('#totalPayment').val(countPrice)
        $("#payment").find('#accordion').html(html)

        $("#payment").modal('show')
    }
</script>
@endsection
