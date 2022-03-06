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
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li class="active"><a href="{{ url('admin/account-management') }}">Management Account</a></li>
        </ul>
    </li>
    @endsection
    @section('content')
    <div class="row clearfix mt-5">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header d-flex justify-content-between">
                    <h2>Account</h2>
                    <button type="button" onclick="showModalCreateAccount()" class="btn btn-primary float-right">
                        Create Account
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="table-responsive">
                <table id="table_account" class="table table-hover table-custom spacing5"">
                    <thead>
                        <tr>
                            <th style="width: 20px;">#</th>
                            <th>name</th>
                            <th>username</th>
                            <th>nik</th>
                            <th>email</th>
                            <th>role</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody id="renderUser">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.modals._reset_password')
    @include('admin.modals._update_account')
    @include('admin.modals._create_account')
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

    getUsers();
    let users;

    function getUsers() {
        let url = `{{ url('/admin/database/users') }}`

        $.ajax({
            type: "get",
            url: url,
            beforeSend: function () {
                html = `
                <tr>
                    <td colspan="8">
                        <span>sedang mengambil data ...</span>
                    </td>
                </tr>
                `;
                $("#renderUser").html(html);
            },
            success: function (response) {
                users = response.data;
                if (response.total !== 0) {
                    renderUser(users)
                } else {
                    html = `
                    <tr>
                        <td colspan="8">
                            <span>Belum ada data</span>
                        </td>
                    </tr>
                    `;

                    $("#renderUser").html(html);
                }
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

    function renderUser(data) {
        let html = ``;
        let no = 0;
        $.each(data, function (key, user) {
            html += `
            <tr>
                <td>
                    <span>${key + 1}</span>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div>
                            <a href="javascript:void(0)" onclick="showModalUpdateAccount('${user.id}')" title="${user.name}">${user.name}</a>
                        </div>
                    </div>
                </td>
                <td><span>${user.username}</span></td>
                <td><span>${user.nik !== null ? user.nik : '-'}</span></td>
                <td><span>${user.email !== null ? user.email : '-'}</span></td>
                <td><span>${user.role}</span></td>
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
            `;
        });

        $("#renderUser").html(html);
        $(document).ready( function () {
            $('#table_account').DataTable();
        });
    }

    function showModalResetPassword(userId) {
        let user = users.find(user => user.id === userId);
        $("#resetPassword").find("input[type=hidden][name=userId]").val(user.id);
        $("#resetPassword").find("#username").html(user.name);
        $("#resetPassword").modal('show');
    }

    function resetPassword(id) {
        let userId = $("#resetPassword").find("input[type=hidden][name=userId]").val();
        let url = `{{ url('admin/database/user/reset-password') }}`;

        $.ajax({
            type: "post",
            url: url,
            data: {
                user_id : userId
            },
            success: function (response) {
                $("#resetPassword").modal('hide')
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

    function deleteAccount(userId) {
        let user = users.find(user => user.id === userId)
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
                url: `{{ url('/admin/database/user') }}`,
                data: {
                    user_id : userId
                },
                success: function (response) {
                    swal("Berhasil!", `Berhasil menghapus akun ${user.name}`, "success");
                    getUsers();
                }
            });
        })
    }

    function showModalCreateAccount() {
        $("#createAccount").modal('show')
    }

    function createAccount() {
        let url = `{{ url('/admin/database/user') }}`
        let name = $("#createAccount").find('input[type=text][name=name]').val()
        let username = $("#createAccount").find('input[type=text][name=username]').val()
        let nik = $("#createAccount").find('input[type=text][name=nik]').val()
        let email = $("#createAccount").find('input[type=email][name=email]').val()
        let role = $("#createAccount").find('select[name=role]').val()

        let data = {
            name,
            nik,
            email,
            role,
            username
        }

        $.ajax({
            type: "post",
            url: url,
            data: data,
            success: function (response) {
                $("#createAccount").modal('hide')
                swal({
                    title: "Success",
                    text: "Berhasil menambah account",
                    timer: 1500,
                    showConfirmButton: false
                });
                getUsers()

                resetValue()
            },
            error: function (e) {
                swal({
                    title: "Error",
                    text: "Gagal menambah account",
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    }

    function resetValue() {
        $("#createAccount").find('input[type=text]').val('')
        $("#createAccount").find('input[type=email]').val('')
        $("#createAccount").find('select option:selected').prop('selected', false)
        $("#updateAccount").find('input[type=text]').val('')
        $("#updateAccount").find('input[type=email]').val('')
        $("#updateAccount").find('select option:selected').prop('selected', false)
    }

    function showModalUpdateAccount(userId) {
        let user = users.find(user => user.id === userId)
        $("#updateAccount").find('input[type=hidden][name=user_id]').val(user.id)
        $("#updateAccount").find('input[type=text][name=name]').val(user.name)
        $("#updateAccount").find('input[type=text][name=username]').val(user.username)
        $("#updateAccount").find('input[type=text][name=nik]').val(user.nik)
        $("#updateAccount").find('input[type=email][name=email]').val(user.email)
        $("#updateAccount").find('select[name=role]').val(user.role)
        $("div.id_100 select").val("val2");
        $("#updateAccount").modal('show')
    }

    function updateAccount() {
        let url = `{{ url('/admin/database/user') }}`
        let user_id = $("#updateAccount").find('input[type=hidden][name=user_id]').val()
        let name = $("#updateAccount").find('input[type=text][name=name]').val()
        let username = $("#updateAccount").find('input[type=text][name=username]').val()
        let nik = $("#updateAccount").find('input[type=text][name=nik]').val()
        let email = $("#updateAccount").find('input[type=email][name=email]').val()
        let role = $("#updateAccount").find('select[name=role]').val()

        let data = {
            user_id,
            name,
            nik,
            email,
            role,
            username
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
                getUsers()
                resetValue()
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
</script>
@endsection
