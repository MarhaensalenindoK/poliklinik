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
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createAccountSp">
                    Create Account
                </button>

                <!-- Modal -->
                <div class="modal fade" id="createAccountSp" tabindex="-1" role="dialog" aria-labelledby="createAccountSpLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="createAccountSpLabel">Add Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">

                            <form action="">
                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter name" name="name">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" aria-describedby="username" placeholder="Enter username" name="username">
                                </div>
                                <label for="username">Klinik</label>
                                <select class="custom-select mb-3">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <div class="form-group mb-3">
                                    <label for="nik">Nik</label>
                                    <input type="text" class="form-control" id="nik" aria-describedby="nik" placeholder="Enter nik" name="nik">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email" name="email">
                                </div>
                                <label for="username">Role</label>
                                <select class="custom-select mb-3">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>

                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                            </form>

                        </div>
                    </div>
                    </div>
                </div>

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
                        <th>Nik</th>
                        <th>Email</th>
                        <th>Klinik</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody >

                    @foreach ($users['data'] as $key => $item)
                    <tr>
                        <td>
                            <span>{{ $key + 1 }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:void(0)" title=>{{ $item['name'] }}</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>{{ $item['username'] }}</span>
                        </td>
                        <td>
                            <span>{{ $item['nik'] }}</span>
                        </td>
                        <td>
                            <span>{{ $item['email'] }}</span>
                        </td>
                        <td>
                            <span>{{ $item['clinic']['name'] }}</span>
                        </td>
                        <td>
                            <span>{{ $item['role'] }}</span>
                        </td>
                        <td>
                            @if ($item['status'] === 1)
                                <span class="badge badge-success ml-0 mr-0">Active</span>
                                @else
                                <span class="badge badge-warning ml-0 mr-0">Non-Active</span>
                            @endif


                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default" title="Reset Password" data-toggle="tooltip" data-placement="top"><i class="icon-reload"></i></button>

                            <!-- edit modal account -->
                            <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#editAccountSp"><i class="icon-pencil"></i></button>

                            <button type="button" class="btn btn-sm btn-default" title="Delete Account" data-toggle="tooltip" data-placement="top" onclick="deleteAccount()"><i class="icon-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editAccountSp" tabindex="-1" role="dialog" aria-labelledby="editAccountSpLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="editAccountSpLabel">Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

            <form action="">
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter name" name="name">
                </div>
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="username" placeholder="Enter username" name="username">
                </div>
                <label for="username">Klinik</label>
                <select class="custom-select mb-3">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div class="form-group mb-3">
                    <label for="nik">Nik</label>
                    <input type="text" class="form-control" id="nik" aria-describedby="nik" placeholder="Enter nik" name="nik">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email" name="email">
                </div>
                <label for="username">Role</label>
                <select class="custom-select mb-3">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
            </form>

        </div>
    </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('#manageAccTable').DataTable();
    } );
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
                    swal("Berhasil!", `Berhasil menghapus akun ${user.name}`, "success");
                }
            });
        })
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
</script>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
@endsection
