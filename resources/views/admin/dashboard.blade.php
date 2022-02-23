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
            <li><a href="{{ url('admin/admin-management') }}">Manage Account Admin</a></li>
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
                    <div class="col-6 border-right pb-4 pt-4">
                        <label class="mb-0">Total akun</label>
                        <h4 class="font-30 font-weight-bold text-col-blue">{{ $totalUser }}</h4>
                    </div>
                    <div class="col-6 pb-4 pt-4">
                        <label class="mb-0">Total Non-Active Account</label>
                        <h4 class="font-30 font-weight-bold text-col-blue">{{ $totalUserNonActive }}</h4>
                    </div>
                    <div class="col-6">
                        <hr style="border: 1px solid rgb(225 232 237);">
                    </div>
                    <div class="col-6">
                    </div>
                    <div class="col-6 pb-4 pt-4 border-right">
                        <label class="mb-0">Total Admin</label>
                        <h4 class="font-30 font-weight-bold text-col-blue">{{ $users['total'] }}</h4>
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
                        <th>Name</th>
                        <th style="width: 50px;">email</th>
                        <th style="width: 50px;">Status</th>
                        <th style="width: 110px;">Action</th>
                    </tr>
                </thead>
                <tbody id="renderUser">
                    <tr>
                        <td>
                            <span>1</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:void(0)" title="${user.name}">Nama</a>
                                    <p class="mb-0">username</p>
                                </div>
                            </div>
                        </td>
                        <td>email@gmail.com</td>
                        <td>
                            <span class="badge badge-success ml-0 mr-0">
                                Active
                            </span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" onclick="showModalResetPassword()" title="Reset Password" data-toggle="tooltip" data-placement="top"><i class="icon-reload"></i></button>
                            <button type="button" class="btn btn-sm btn-default" onclick="showModalUpdateAccount()" title="Update Account" data-toggle="tooltip" data-placement="top"><i class="icon-pencil"></i></button>
                            <button type="button" class="btn btn-sm btn-default" onclick="deleteAccount()" title="Delete Account" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                        </td>
                    </tr>
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

    $(document).ready( function () {
            $('#table_account').DataTable();
        } );
</script>
@endsection
