<div class="modal fade" id="editPatient" tabindex="-1" role="dialog" aria-labelledby="editPatientLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPatientLabel">Update Medical History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('doctor/medical-history') }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" id="medical_history_id" name="medical_history_id">
                <input type="hidden" id="queue_id" name="queue_id">
                <input type="hidden" id="patient_id" name="patient_id">
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
                            <label for="allergic">allergic</label>
                            <input type="text" class="form-control" id="allergic" aria-describedby="allergic">
                        </div>

                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    Been Diagnosed
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <ul id="been-diagnosed">

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
                                    <ol id="hosp-surgery">

                                    </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="anamnesis">Anamnesis</label>
                            <textarea class="form-control" rows="7" id="anamnesis" rows="3"></textarea>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <label for="diagnosis">Diagnosis</label>
                        <textarea required class="form-control" name="diagnosis" rows="7" id="diagnosis" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="physicalExam">Physical Exam</label>
                        <textarea required class="form-control" name="physicalExam" rows="7" id="physicalExam" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="vitalSign">Vital Sign</label>
                        <textarea required class="form-control" name="vitalSign" rows="7" id="vitalSign" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="desc">Deskripsi Tindakan</label>
                        <textarea    class="form-control" name="descAction" rows="7" id="desc" rows="3"></textarea>
                    </div>

                    <div class="modal-header">
                        <h5 class="modal-title">Medication & Therapy</h5>
                    </div>
                    <button type="button" class="btn btn-primary my-3" onclick="addInputAction()">
                        Tambah Tindakan
                    </button>
                    <div class="" id="action">
                        <div class="many-action action-1">
                            <div class="form-group">
                                <label for="medicine">Medicine</label>
                                <select class="form-control w-100" name="medicine[]" id="medicine" onchange="doseMedicine(this, 1)">
                                    <option selected="selected" value="null">Medicine</option>
                                    @foreach ($medicines['data'] as $medicine)
                                        <option value="{{ $medicine['id'] }}">{{ $medicine['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sigma</label>
                                <input type="text" name="sigma[]" id="sigma" class="form-control">
                            </div>

                            <label>Dose</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text amount-1">-</span>
                                </div>
                                <input type="number" name="count[]" class="form-control" placeholder="Count" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
