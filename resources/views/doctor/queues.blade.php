@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

    <style>
        .light_version .nav.nav-tabs .nav-link.active, .light_version .nav.nav-tabs .nav-link:hover, .light_version .nav.nav-tabs .nav-link:focus{
            background-color: #17C2D7;
            border: #17C2D7;
            color: white;
        }
    </style>

@endsection
@section('sidebar-biodata')
    <span>Welcome,</span>
    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Doctor</strong></a>
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
            <li><a href="{{ url('doctor/dashboard') }}">Dashboard</a></li>
            <li class="active"><a href="{{ url('doctor/medical-history/queues') }}">My Patient</a></li>
        </ul>
    </li>
    @endsection
@section('content')

<div class="row clearfix mt-5">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header d-flex justify-content-between">
                <h2>Medical History</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">List Patient</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">History Patient</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="table-responsive">
                    <table class="table table-hover table-custom spacing5" id="patient">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Queue</th>
                                <th>Username</th>
                                <th>Nik </th>
                                <th>Allergic</th>
                                <th>Diagnosed</th>
                                <th>Hospitalization Surgery</th>
                                <th>Anamnesis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="renderUser">
                            <tr>
                                <td>1</td>
                                <td>
                                    <div>
                                        <a href="javascript:void(0)" id="name">Acil</a>
                                    </div>
                                    <div>
                                        <p id="email">reski@gmail.com</p>
                                    </div>
                                </td>
                                <td><span id="queue">4</span></td>
                                <td><span id="username">reski123</span></td>
                                <td><span id="nik">612981989</span></td>
                                <td><span id="allergic">Tenggorokan gatal</span></td>
                                <td><span id="diagnosed">-</span></td>
                                <td><span id="hospitalizationSurgery">-</span></td>
                                <td><span id="Anamnesis">-</span></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-default" onclick="" title="Update Account" data-toggle="modal" data-target="#editPatient"><i class="icon-pencil"></i></button>
                                    <button type="button" class="btn btn-sm btn-default" onclick="deleteAccount('${user.id}')" title="Delete Account" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <div class="table-responsive">
                    <table class="table table-hover table-custom spacing5" id="historyPatient">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Nik</th>
                                <th>Anamnesis </th>
                                <th>Diagnosis</th>
                                <th>Physical exam</th>
                                <th>Vital Sign</th>
                                <th>Desc</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="renderUser">
                            <tr>
                                <td>1</td>
                                <td>
                                    <div>
                                        <a href="javascript:void(0)" id="name">Acil</a>
                                    </div>
                                    <div>
                                        <p id="email">reski@gmail.com</p>
                                    </div>
                                </td>
                                <td><span id="queue">4</span></td>
                                <td><span id="username">reski123</span></td>
                                <td><span id="nik">612981989</span></td>
                                <td><span id="allergic">Tenggorokan gatal</span></td>
                                <td><span id="diagnosed">-</span></td>
                                <td><span id="hospitalizationSurgery">-</span></td>
                                <td><span id="Anamnesis">-</span></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-default" onclick="deleteAccount('${user.id}')" title="Delete Account" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="editPatient" tabindex="-1" role="dialog" aria-labelledby="editPatientLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editPatientLabel">Update Medical History</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                <form action="">

                    <fieldset disabled>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="username" >
                        </div>

                        <div class="form-group">
                            <label for="nik">Nik</label>
                            <input type="text" class="form-control" id="nik" aria-describedby="nik">
                        </div>

                        <div class="form-group">
                            <label for="alergic">alergic</label>
                            <input type="text" class="form-control" id="alergic" aria-describedby="alergic">
                        </div>

                        <div id="accordion">
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                Been Diagnosed
                              </div>

                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                  <ul>
                                      <li>Diabetes</li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" id="headingTwo">
                                Hospitalization Surgery (reason)
                              </div>
                              <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                  <ol>
                                      <li>Operasi kanker kulit</li>
                                  </ol>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="anamnesis">Anamnesis</label>
                            <textarea class="form-control" id="anamnesis" rows="3"></textarea>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <label for="diagnosis">Diagnosis</label>
                        <textarea class="form-control" id="diagnosis" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="physicalExam">Physical Exam</label>
                        <textarea class="form-control" id="physicalExam" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="vitalSign">Vital Sign</label>
                        <textarea class="form-control" id="vitalSign" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="desc">Desc</label>
                        <textarea class="form-control" id="desc" rows="3"></textarea>
                    </div>

                    <div class="modal-header mb-3">
                        <h5 class="modal-title">Medication & Therapy</h5>
                    </div>

                    <label for="desc">Drug</label>
                    <select class="custom-select mb-3" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                    <label for="desc">Sigma</label>
                    <select class="custom-select mb-3" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                    <label for="desc">Dose</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Tablet</span>
                        </div>
                        <input type="number" class="form-control" placeholder="Count" aria-label="Username" aria-describedby="basic-addon1">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>



            </div>
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
        $('#patient').DataTable();
    } );

    $(document).ready( function () {
        $('#historyPatient').DataTable();
    } );

</script>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
@endsection
