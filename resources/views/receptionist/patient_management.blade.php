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
            <li class="active"><a href="{{ url('receptionist/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('receptionist/patient-management') }}">Management Patient</a></li>
            <li><a href="#">Management Queue</a></li>
            <li><a href="#">Management Medicine</a></li>
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
            <table class="table table-hover table-custom spacing5">
                <thead>
                    <tr>
                        <th style="width: 20px;">#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Nik</th>
                        <th>Alergic</th>
                        <th>Diagnosed</th>
                        <th>Hospitalzation surgery</th>
                        <th>Amnanesis</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>
                            <span>1</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href= "javascript:void(0)" title=>Reski Junaedi</a>
                            </div>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <span>saekyo</span>
                        </td>
                        <td>
                            <span>61234567</span>
                        </td>
                        <td>
                            <span>Tenggorokan gatal</span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="" data-toggle="tooltip" data-placement="top"><i class="fa fa-check-square-o"></i></button> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>2</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href= "javascript:void(0)" title=>Reski Junaedi</a>
                            </div>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <span>saekyo</span>
                        </td>
                        <td>
                            <span>61234567</span>
                        </td>
                        <td>
                            <span>Tenggorokan gatal</span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="" data-toggle="tooltip" data-placement="top"><i class="fa fa-check-square-o"></i></button> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>3</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href= "javascript:void(0)" title=>Reski Junaedi</a>
                            </div>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <span>saekyo</span>
                        </td>
                        <td>
                            <span>61234567</span>
                        </td>
                        <td>
                            <span>Tenggorokan gatal</span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="" data-toggle="tooltip" data-placement="top"><i class="fa fa-check-square-o"></i></button> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>4</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href= "javascript:void(0)" title=>Reski Junaedi</a>
                            </div>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <span>saekyo</span>
                        </td>
                        <td>
                            <span>61234567</span>
                        </td>
                        <td>
                            <span>Tenggorokan gatal</span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="" data-toggle="tooltip" data-placement="top"><i class="fa fa-check-square-o"></i></button> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>5</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href= "javascript:void(0)" title=>Reski Junaedi</a>
                            </div>
                            <span>reski@gmail.com</span>
                        </td>
                        <td>
                            <span>saekyo</span>
                        </td>
                        <td>
                            <span>61234567</span>
                        </td>
                        <td>
                            <span>Tenggorokan gatal</span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <span> - </span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="" data-toggle="tooltip" data-placement="top"><i class="fa fa-check-square-o"></i></button> 
                        </td>
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
@endsection
