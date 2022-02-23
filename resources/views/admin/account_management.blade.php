@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@endsection
@section('sidebar-biodata')
    <span>Welcome,</span>
    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Admin</strong></a>
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
            <li><a>Dashboard</a></li>
            <li><a href="{{ url('/account-management2') }}">Managemen Account Admin</a></li>
        </ul>
    </li>
    @endsection
@section('content')
<div class="row clearfix mt-5">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header d-flex justify-content-between">
                <h2>Account</h2>
                <button class="btn btn-primary float-right">
                    Create Account
                </button>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing5"">
                <thead>
                    <tr>
                        <th style="width: 20px;">#</th>
                        <th>name</th>
                        <th>username</th>
                        <th>nic</th>
                        <th>email</th>
                        <th>role</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <td>
                            <span>01</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:void(0)" title=>Reski</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>Saekyo</span>
                        </td>
                        <td>
                            <span>612981989</span>
                        </td>
                        <td>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <span>Admin</span>
                        </td>
                        <td>
                            <span class="badge badge-success ml-0 mr-0">Active</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="Reset Password" data-toggle="tooltip" data-placement="top"><i class="icon-reload"></i></button>
                            <button type="button" class="btn btn-sm btn-default" title="Update Account" data-toggle="tooltip" data-placement="top"><i class="icon-pencil"></i></button>
                            <button type="button" class="btn btn-sm btn-default" title="Delete Account" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>03</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:void(0)" title=>Reski</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>Saekyo</span>
                        </td>
                        <td>
                            <span>612981989</span>
                        </td>
                        <td>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <span>Admin</span>
                        </td>
                        <td>
                            <span class="badge badge-success ml-0 mr-0">Active</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="Reset Password" data-toggle="tooltip" data-placement="top"><i class="icon-reload"></i></button>
                            <button type="button" class="btn btn-sm btn-default" title="Update Account" data-toggle="tooltip" data-placement="top"><i class="icon-pencil"></i></button>
                            <button type="button" class="btn btn-sm btn-default" title="Delete Account" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>04</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:void(0)" title=>Reski</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>Saekyo</span>
                        </td>
                        <td>
                            <span>612981989</span>
                        </td>
                        <td>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <span>Admin</span>
                        </td>
                        <td>
                            <span class="badge badge-success ml-0 mr-0">Active</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="Reset Password" data-toggle="tooltip" data-placement="top"><i class="icon-reload"></i></button>
                            <button type="button" class="btn btn-sm btn-default" title="Update Account" data-toggle="tooltip" data-placement="top"><i class="icon-pencil"></i></button>
                            <button type="button" class="btn btn-sm btn-default" title="Delete Account" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>05</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:void(0)" title=>Reski</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>Saekyo</span>
                        </td>
                        <td>
                            <span>612981989</span>
                        </td>
                        <td>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <span>Admin</span>
                        </td>
                        <td>
                            <span class="badge badge-success ml-0 mr-0">Active</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="Reset Password" data-toggle="tooltip" data-placement="top"><i class="icon-reload"></i></button>
                            <button type="button" class="btn btn-sm btn-default" title="Update Account" data-toggle="tooltip" data-placement="top"><i class="icon-pencil"></i></button>
                            <button type="button" class="btn btn-sm btn-default" title="Delete Account" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
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

@endsection
