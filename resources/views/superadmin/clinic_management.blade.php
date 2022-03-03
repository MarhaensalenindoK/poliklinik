@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
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
                <button class="btn btn-primary float-right" onclick="showModalCreateClinic()">
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

@include('superadmin.modals._create_clinic')
@include('superadmin.modals._update_clinic')
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
@if (Session::has('error'))
    <script>
        swal({
            title: "Error",
            text: "Gagal membuat data",
            timer: 1500,
            showConfirmButton: false
        });
    </script>
@endif

@if (Session::has('success'))
    <script>
        swal({
            title: "Success",
            text: "Berhasil membuat data",
            timer: 1500,
            showConfirmButton: false
        });
    </script>
@endif

@if (Session::has('error-update'))
    <script>
        swal({
            title: "Error",
            text: "Gagal merubah data",
            timer: 1500,
            showConfirmButton: false
        });
    </script>
@endif

@if (Session::has('success-update'))
    <script>
        swal({
            title: "Success",
            text: "Berhasil merubah data",
            timer: 1500,
            showConfirmButton: false
        });
    </script>
@endif
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let clinics = {}
    getClinic()
    function getClinic() {
        let url = `{{ url('/database/clinic') }}`

        $.ajax({
            type: "get",
            url: url,
            success: function (response) {
                clinics = response
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

    function deleteClinic(clinicId) {
        let clinic = clinics.data.find(thisClinic => thisClinic.id === clinicId)
        swal({
            title: "Delete Clinic",
            text: `Yakin ingin menghapus clinic <b>${clinic.name}</b> ?`,
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
                url: `{{ url('/database/clinic') }}`,
                data: {
                    clinic_id : clinicId
                },
                success: function (response) {
                    swal("Berhasil!", `Berhasil menghapus clinic ${clinic.name}`, "success");
                    location.reload()
                }
            });
        })
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
                            <a href="javascript:void(0)" onclick="showModalUpdateClinic('${clinic.id}')" title="${clinic.name}">${clinic.name}</a>
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
                    <button type="button" class="btn btn-sm btn-default" onclick="showModalUpdateClinic('${clinic.id}')" title="Update Clinic" data-toggle="tooltip" data-placement="top"><i class="icon-pencil"></i></button>
                    <button type="button" class="btn btn-sm btn-default" onclick="deleteClinic('${clinic.id}')" title="Delete Clinic" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                </td>
            </tr>
            `
        });

        $("#renderClinic").html(html);
        $(document).ready( function () {
            $('#table_clinic').DataTable();
        } );
    }

    function showModalCreateClinic() {
        $("#createClinic").modal('show')
    }

    function showModalUpdateClinic(clinic_id) {
        dataClinic = clinics.data.find(clinic => clinic.id === clinic_id)
        $("#updateClinic").find("input[type=hidden][name=clinic_id]").val(dataClinic.id)
        $("#updateClinic").find("input[type=text][name=name]").val(dataClinic.name)
        $("#updateClinic").find("textarea[name=about]").val(dataClinic.about)
        $("#updateClinic").find("input[type=text][name=address]").val(dataClinic.address)
        $("#updateClinic").find("input[type=text][name=contact]").val(dataClinic.contact ?? '')
        $("#updateClinic").find("input[type=email][name=email]").val(dataClinic.email ?? '')
        if (dataClinic.profile_image !== null) {
            $("#updateClinic").find("#show-image-clinic").attr('src', `images/${dataClinic.profile_image ?? ''}`)
        }

        // input Service
        let countFacility = dataClinic.facility.length
        let countService = dataClinic.service.length
        let htmlInputFacility = ``
        let htmlInputService = ``
        if (countFacility > 1) {
            $.each(dataClinic.facility, function (key, facility) {
                if (key === 0) {
                    htmlInputFacility += `
                    <div class="inputManyFacility input-facility-1">
                        <input type="text" class="form-control" name="nameFacility[]" placeholder="Nama Fasilitas" value="${facility.name}" required>
                        <textarea class="form-control mt-3" rows="5" name="descriptionFacility[]" cols="30" placeholder="Deskripsi Fasilitas" required>${facility.description}</textarea>
                    </div>
                    `
                }

                htmlInputFacility += `
                <div class="mt-3 inputManyFacility input-facility-${key + 1}">
                    <div class="d-flex">
                        <input type="text" class="form-control" name="nameFacility[]" placeholder="Nama Fasilitas" value="${facility.name}" required>
                        <a href="javascript:void(0)" class="btn btn-primary ml-1" onclick="removeInputFacility(${key + 1}, 'input-facility-update')">X</a>
                    </div>
                    <textarea class="form-control mt-3" rows="5" cols="30" name="descriptionFacility[]" placeholder="Deskripsi Fasilitas" required>${facility.description}</textarea>
                </div>
                `
            });
        } else {
            htmlInputFacility += `
            <div class="inputManyFacility input-facility-1">
                <input type="text" class="form-control" name="nameFacility[]" placeholder="Nama Fasilitas" value="${ dataClinic.facility[0].name }" required>
                <textarea class="form-control mt-3" rows="5" name="descriptionFacility[]" cols="30" placeholder="Deskripsi Fasilitas" required>${ dataClinic.facility[0].description }</textarea>
            </div>
            `
        }

        if (countService > 1) {
            $.each(dataClinic.service, function (key, service) {
                if (key === 0) {
                    htmlInputService += `
                    <div class="inputManyService input-service-1">
                        <input type="text" class="form-control" name="nameService[]" placeholder="Layanan" value="${service}" required>
                    </div>
                    `
                }

                htmlInputService += `
                <div class="mt-3 inputManyService input-service-${key + 1}">
                    <div class="d-flex">
                        <input type="text" class="form-control" name="nameService[]" placeholder="Layanan" value="${service}" required>
                        <a href="javascript:void(0)" class="btn btn-primary ml-1" onclick="removeInputService(${key + 1},'input-service-update')">X</a>
                    </div>
                </div>
                `
            });
        } else {
            htmlInputService += `
            <div class="inputManyService input-service-1">
                <input type="text" class="form-control" name="nameService[]" placeholder="Layanan" value="${dataClinic.service[0]}" required>
            </div>
            `
        }

        $("#input-facility-update").html(htmlInputFacility);
        $("#input-service-update").html(htmlInputService);
        $("#updateClinic").modal('show')
    }

    function addInputFacility(renderId = null) {
        let inputLength = $(".inputManyFacility").length
        let html = `
            <div class="mt-3 inputManyFacility input-facility-${inputLength + 1}" style="display:none;">
                <div class="d-flex">
                    <input type="text" class="form-control" name="nameFacility[]" placeholder="Nama Fasilitas" required>
                    <a href="javascript:void(0)" class="btn btn-primary ml-1" onclick="removeInputFacility(${inputLength + 1}, ${renderId === null ? null : `${renderId}`})">X</a>
                </div>
                <textarea class="form-control mt-3" rows="5" cols="30" name="descriptionFacility[]" placeholder="Deskripsi Fasilitas" required></textarea>
            </div>
        `
        if (renderId === null) {
            $("#input-facility").append(html);
            $("#input-facility").find(`.input-facility-${inputLength + 1}`).show('slow')
        } else {
            $(`#${renderId}`).append(html);
            $(`#${renderId}`).find(`.input-facility-${inputLength + 1}`).show('slow')
        }
    }

    function removeInputFacility(index, renderId = null) {
        if (renderId === null) {
            $("#input-facility").find(`.input-facility-${index}`).hide('slow', function(){ $(this).remove(); });
        } else {
            $(`#${renderId}`).find(`.input-facility-${index}`).hide('slow', function(){ $(this).remove(); });
        }
    }

    function addInputService(renderId = null) {
        let inputLength = $(".inputManyService").length
        let html = `
            <div class="mt-3 inputManyService input-service-${inputLength + 1}" style="display:none;">
                <div class="d-flex">
                    <input type="text" class="form-control" name="nameService[]" placeholder="Layanan" required>
                    <a href="javascript:void(0)" class="btn btn-primary ml-1" onclick="removeInputService(${inputLength + 1}, ${renderId === null ? null : `${renderId}`})">X</a>
                </div>
            </div>
        `

        if (renderId === null) {
            $("#input-service").append(html);
            $("#input-service").find(`.input-service-${inputLength + 1}`).show('slow')
        } else {
            $("#input-service").append(html);
            $(`#${renderId}`).find(`.input-service-${inputLength + 1}`).show('slow')
        }
    }

    function removeInputService(index, renderId = null) {
        if (renderId === null) {
            $("#input-service").find(`.input-service-${index}`).hide('slow', function(){ $(this).remove(); });
        } else {
            $(`#${renderId}`).find(`.input-service-${index}`).hide('slow', function(){ $(this).remove(); });
        }
    }
</script>
@endsection
