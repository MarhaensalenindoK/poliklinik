<div class="modal fade" id="editPatient" tabindex="-1" role="dialog" aria-labelledby="editPatientLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPatientLabel">Update Medical History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">


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
                    <div class="form-group">
                        <label>Medicine</label>
                        <select class="form-control w-100">
                            <option selected="selected">orange</option>
                            <option>white</option>
                            <option>purple</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sigma</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>

                    <label>Dose</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Tablet</span>
                        </div>
                        <input type="number" class="form-control" placeholder="Count" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
