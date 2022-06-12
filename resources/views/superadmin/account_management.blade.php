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
            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/clinic-management') }}">Clinic Management</a></li>
            <li class="active"><a href="{{ url('/account-management') }}">Account Management</a></li>
        </ul>
    </li>
    @endsection
@section('content')

<div class="row clearfix mt-5">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header d-flex justify-content-between">
                <h2>Account</h2>

                <!-- create modal account -->
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createAccount">
                    Create Account
                </button>

            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="manageAccTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>nik</th>
                        <th>Email</th>
                        <th>Klinik</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="renderUser">
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('superadmin.modals._create_account')
@include('superadmin.modals._reset_password')
@include('superadmin.modals._update_account')

@endsection

@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    let users = {}

    $('#renderClinic').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 2,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
        ]
    });

    getUser()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function getUser() {
        $.ajax({
            type: "get",
            url: "{{ url('database/user') }}",
            success: function (response) {
                users = response
                renderUser(response.data)
            },
            error: function (e) {
                swal({
                    title: "Error",
                    text: "Gagal mengambil data",
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    }

    function renderUser(data) {
        let html = ``
        let no = 1
        $.each(data, function (key, user) {
            html += `
            <tr>
                <td>
                    <span>${no++}</span>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div>
                            <a href="javascript:void(0)" onclick="showModalUpdateAccount('${user.id}')" title="${user.name}">${user.name}</a>
                        </div>
                    </div>
                </td>
                <td>
                    <span>${user.username}</span>
                </td>
                <td>
                    <span>${user.nik === null ? '-' : user.nik}</span>
                </td>
                <td>
                    <span>${user.email === null ? '-' : user.email}</span>
                </td>
                <td>
                    <span>${user.clinic === null ? '-' : user.clinic.name}</span>
                </td>
                <td>
                    <span>${user.role}</span>
                </td>
                <td>
                    <span class="badge ${user.status === 1 ? 'badge-success' : 'badge-danger'} ml-0 mr-0">
                        ${user.status === 1 ? 'Active' : 'Non-active'}
                    </span>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-default" onclick="showModalResetPassword('${user.id}')" title="Reset Password" data-toggle="tooltip" data-placement="top"><i class="icon-reload"></i></button>
                    <button type="button" class="btn btn-sm btn-default" onclick="showModalUpdateAccount('${user.id}')" title="Update Account" data-toggle="tooltip" data-placement="top"><i class="icon-pencil"></i></button>
                    <button type="button" class="btn btn-sm btn-default" onclick="deleteAccount('${user.id}')" title="Delete Account" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                </td>
            </tr>
            `
        });

        $("#renderUser").html(html);

        $('#manageAccTable').DataTable();
    }

    function craeteAccount() {
        let name = $("#createAccount").find('input[type=text][name=name]').val()
        let username = $("#createAccount").find('input[type=text][name=username]').val()
        let clinic_id = $("#createAccount").find('select[name=clinic]').val()
        let nik = $("#createAccount").find('input[type=text][name=nik]').val()
        let email = $("#createAccount").find('input[type=email][name=email]').val()
        let role = $("#createAccount").find('select[name=role]').val()

        if (name == '' || username == '' || role == null) {
            swal({
                    title: "Lengkapi Data !",
                    text: "Gagal membuat data, silahkan lengkapi kembali !",
                    timer: 1500,
                    showConfirmButton: false
                });
        } else {
            $.ajax({
                type: "post",
                url: `{{ url('database/user') }}`,
                data: {
                    name,
                    username,
                    clinic_id,
                    nik,
                    email,
                    role
                },
                success: function (response) {
                    $("#createAccount").modal('hide')
                    swal({
                        title: "Success",
                        text: "Berhasil menambahkan account",
                        timer: 1500,
                        showConfirmButton: false
                    });
                    getUser()
                },
                error: function (e) {
                    swal({
                        title: "Error",
                        text: "Gagal membuat data",
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        }
    }

    function showModalResetPassword(userId) {
        let user = users.data.find(user => user.id === userId)
        $("#resetPasword").find("input[type=hidden][name=userId]").val(user.id)
        $("#resetPasword").find("#username").html(user.name)
        $("#resetPasword").modal('show')
    }

    function resetPassword() {
        let userId = $("#resetPasword").find("input[type=hidden][name=userId]").val()
        let url = `{{ url('/database/user/reset-password') }}`

        $.ajax({
            type: "post",
            url: url,
            data: {
                user_id : userId
            },
            success: function (response) {
                $("#resetPasword").modal('hide')
                swal({
                    title: "Success",
                    text: "Berhasil mereset password",
                    timer: 1500,
                    showConfirmButton: false
                });
            },
            error: function (e) {
                swal({
                    title: "Error",
                    text: "Gagal mereset password",
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    }

    function showModalUpdateAccount(userId) {
        let user = users.data.find(user => user.id === userId)
        $("#updateAccount").find('input[type=hidden][name=user_id]').val(user.id)
        $("#updateAccount").find('input[type=text][name=name]').val(user.name)
        $("#updateAccount").find('input[type=text][name=username]').val(user.username)
        $("#updateAccount").find('select[name=clinic]').val(user.clinic_id)
        $("#updateAccount").find('input[type=text][name=nik]').val(user.nik)
        $("#updateAccount").find('input[type=email][name=email]').val(user.email)
        $("#updateAccount").find('select[name=role]').val(user.role)
        $("#updateAccount").find(`input[type=radio][name=status][value=${user.status === 1 ? true : false}]`).prop('checked', true)
        $("div.id_100 select").val("val2");
        $("#updateAccount").modal('show')
    }

    function updateAccount() {
        let url = `{{ url('/database/user') }}`
        let user_id = $("#updateAccount").find('input[type=hidden][name=user_id]').val()
        let name = $("#updateAccount").find('input[type=text][name=name]').val()
        let username = $("#updateAccount").find('input[type=text][name=username]').val()
        let clinic_id = $("#updateAccount").find('select[name=clinic]').val()
        let nik = $("#updateAccount").find('input[type=text][name=nik]').val()
        let email = $("#updateAccount").find('input[type=text][name=email]').val()
        let role = $("#updateAccount").find('select[name=role]').val()
        let status = $("#updateAccount").find('input[type=radio][name=status]:checked').val()

        let data = {
            user_id,
            name,
            clinic_id,
            nik,
            email,
            role,
            username,
            status
        }

        $.ajax({
            type: "patch",
            url: url,
            data: data,
            success: function (response) {
                $("#updateAccount").modal('hide')
                swal({
                    title: "Success",
                    text: "Berhasil mengubah account",
                    timer: 1500,
                    showConfirmButton: false
                });
                getUser()
            },
            error: function (e) {
                swal({
                    title: "Error",
                    text: "Gagal mengubah account",
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    }

    function deleteAccount(userId) {
        let user = users.data.find(user => user.id === userId)
        swal({
            title: "Delete account",
            text: `Yakin ingin menghapus akun <b>${user.name}</b> ?`,
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
                url: `{{ url('/database/user') }}`,
                data: {
                    user_id : userId
                },
                success: function (response) {
                    getUser()
                    swal("Berhasil!", `Berhasil menghapus akun ${user.name}`, "success");
                }
            });
        })
    }
</script>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
@endsection
