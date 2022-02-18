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
            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li class="active"><a href="{{ url('/clinic-management') }}">Clinic Management</a></li>
            <li><a href="{{ url('/account-management') }}">Account Management</a></li>
        </ul>
    </li>
    @endsection
@section('content')
<div class="row clearfix mt-5">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header d-flex justify-content-between">
                <h2>Clinics</h2>
                <button class="btn btn-primary float-right">
                    Create Clinic
                </button>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="table_clinic">
                <thead>
                    <tr>
                        <th style="width: 20px;">#</th>
                        <th>name clinic</th>
                        <th>address</th>
                        <th>facility</th>
                        <th>service</th>
                        <th>contact</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody id="renderClinic">

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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    getClinic()
    function getClinic() {
        let url = `{{ url('/database/clinic') }}`

        $.ajax({
            type: "get",
            url: url,
            success: function (response) {
                renderClinic(response.data)
            },
            error: function (e) {
                swal({
                    title: "Error",
                    text: "Gagal mendapatkan data",
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    }

    function renderClinic(data) {
        let html = ``
        let no = 1
        $.each(data, function (key, clinic) {
            html += `
            <tr>
                <td>
                    <span>${no++}</span>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div>
                            <a href="javascript:void(0)" title="${clinic.name}">${clinic.name}</a>
                            <p class="mb-0">${clinic.email === null ? '-' : clinic.email}</p>
                        </div>
                    </div>
                </td>
                <td>
                    <span>${clinic.address}</span>
                </td>
                <td>`
                $.each(clinic.facility, function (keyFacility, facility) {
                    let lastFacility = keyFacility == clinic.facility.length -1;
                    if (lastFacility) {
                        html += `
                            ${facility.name}.
                        `
                    }
                    html += `
                        ${facility.name},
                    `
                });
            html +=`</td>
                <td>`
                    $.each(clinic.service, function (keyService, service) {
                        let lastService = keyService == clinic.service.length -1;
                        if (lastService) {
                            html += `
                                ${service}.
                            `
                        }
                        html += `
                            ${service},
                        `
                    });
            html +=`</td>
                <td>
                    <span>${clinic.contact === null ? '-' : clinic.contact}</span>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-default" onclick="showModalUpdateAccount('${clinic.id}')" title="Update Account" data-toggle="tooltip" data-placement="top"><i class="icon-pencil"></i></button>
                    <button type="button" class="btn btn-sm btn-default" onclick="deleteAccount('${clinic.id}')" title="Delete Account" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                </td>
            </tr>
            `
        });

        $("#renderClinic").html(html);
        $(document).ready( function () {
            $('#table_clinic').DataTable();
        } );
    }
</script>
@endsection
