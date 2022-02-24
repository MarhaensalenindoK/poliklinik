@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@endsection
@section('sidebar-biodata')
    <span>Welcome,</span>
    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong></a>
    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY" style="right: auto;">
        <li><a href="{{ url('/logout') }}"><i class="icon-power"></i>Logout</a></li>
    </ul>
    @endsection

    @section('sidebar-menu')
    <li class="header">Main</li>
    <li class="active open">
        <a href="#myPage" class="has-arrow"><i class="icon-home"></i><span>My Page</span></a>
        <ul>
            <li class="active"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('admin/account-management') }}">Manage Account Admin</a></li>
        </ul>
    </li>
    @endsection
@section('content')
<div class="row clearfix mt-5">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Users</h2>
            </div>
            <div class="body">
                <div class="row text-center">
                    <div class="col col-md-6 border-right">
                        <div class="border-bottom  pb-4 pt-4">
                            <label class="mb-0">Total akun</label>
                            <h4 class="font-30 font-weight-bold text-col-blue">{{ $totalUser }}</h4>
                        </div>
                        <div class="pb-4 pt-4">
                            <label class="mb-0">Total Admin</label>
                            <h4 class="font-30 font-weight-bold text-col-blue">{{ $users['total'] }}</h4>
                        </div>
                    </div>
                    <div class="col col-md-6 mx-auto my-auto">
                        <label class="mb-0">Total Non-Active Account</label>
                        <h4 class="font-30 font-weight-bold text-col-blue">{{ $totalUserNonActive }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="table_account">
                <thead>
                    <tr>
                        <th style="width: 20px;">#</th>
                        <th>name</th>
                        <th>username</th>
                        <th>nik</th>
                        <th>email</th>
                        <th>role</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody id="renderUser">
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
                    <td colspan="7">
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
                        <td colspan="7">
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
                            <a href="javascript:void(0)" title="${user.name}">${user.name}</a>
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
            </tr>
            `;
        });

        $("#renderUser").html(html);
        $(document).ready( function () {
            $('#table_account').DataTable();
        });
    }
</script>
@endsection
