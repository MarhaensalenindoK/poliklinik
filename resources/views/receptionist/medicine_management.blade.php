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
            <li><a href="{{ url('receptionist/patient-management') }}">Management Patient</a></li>
            <li class="active"><a href="{{ url('receptionist/medicine-management') }}">Management Medicine</a></li>
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
                <h2>Medicine</h2>
                <button type="button" onclick="showModalCreateMedicine()" class="btn btn-primary float-right">
                    Create Medicine
                </button>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableMedicine">
                <thead>
                    <tr>
                        <th style="width: 20px;">#</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicines['data'] as $medicine)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $medicine['name'] }}
                        </td>
                        <td>
                            {{ $medicine['amount'] }}
                        </td>
                        <td>
                            {{ $medicine['type'] }}
                        </td>
                        <td>
                            {{ $medicine['price'] }}
                        </td>
                        <td>
                            {{ $medicine['stock'] }}
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" onclick="showModalUpdateMedicine('{{ $medicine['id'] }}')" title="Update Medicine" data-toggle="tooltip" data-placement="top"><i class="icon-pencil"></i></button>
                            <button type="button" class="btn btn-sm btn-default" onclick="deleteMedicine('{{ $medicine['id'] }}')" title="Delete Medicine" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('receptionist.modals._create_medicine')
@include('receptionist.modals._update_medicine')

@endsection
@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

@if(Session::has('messageMedicine'))
    <script>
        let message = `{!! Session::get('messageMedicine') !!}`
        swal({
            title: "Medicine",
            text: `${message}`,
            html: true,
            timer: 3000,
            showConfirmButton: false
        })
    </script>
@endif

<script>

    let medicines = @json($medicines);

    $("#tableMedicine").DataTable()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showModalCreateMedicine() {
        $("#createMedicine").modal('show')
    }

    function showModalUpdateMedicine(medicineId) {
        let medicine = medicines.data.find(thisMedicine => thisMedicine.id === medicineId)
        $("#updateMedicine").find("input[type=hidden][name=medicine_id]").val(medicine.id)
        $("#updateMedicine").find("input[type=text][name=name]").val(medicine.name)
        $("#updateMedicine").find("input[type=number][name=stock]").val(medicine.stock)
        $("#updateMedicine").find("input[type=number][name=price]").val(medicine.price)

        $("#updateMedicine").find(`input[type=radio][name=amount]`).prop('checked', false);
        $("#updateMedicine").find(`input[type=radio][name=type]`).prop('checked', false);

        let checkForRadioAmount = $("#updateMedicine").find(`input[type=radio][name=amount][value="${medicine.amount}"]`).length

        if (checkForRadioAmount === 0) {
            $("#updateMedicine").find("#otherAmountUpdate").val(medicine.amount);
        } else {
            $("#updateMedicine").find(`input[type=radio][value="${medicine.amount}"]`).prop('checked', true)
        }

        let checkForRadioType = $("#updateMedicine").find(`input[type=radio][name=typeCreate][value="${medicine.type}"]`).length

        if (checkForRadioType === 0) {
            $("#updateMedicine").find("#otherTypeUpdate").val(medicine.type);
        } else {
            $("#updateMedicine").find(`input[type=radio][name=typeCreate][value="${medicine.type}"]`).prop('checked', true)
        }

        $("#updateMedicine").modal('show')
    }

    function deleteMedicine(medicineId) {
        let medicine = medicines.data.find(thisMedicine => thisMedicine.id === medicineId)
        swal({
            title: "Delete medicine",
            text: `Yakin ingin menghapus Obat <b>${medicine.name}</b> ?`,
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
                url: `{{ url('receptionist/database/medicine') }}`,
                data: {
                    medicine_id : medicineId
                },
                success: function (response) {
                    swal("Berhasil!", `Berhasil menghapus obat ${medicine.name}`, "success");
                    window.setTimeout(function(){location.reload()},1000)
                },
                error: function (e) {
                    swal("Gagal!", `Gagal menghapus obat ${medicine.name}`, "error");
                }
            });
        })
    }
</script>

@endsection
