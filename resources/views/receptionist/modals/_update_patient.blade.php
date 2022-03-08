<div class="modal fade" id="updatePatient" tabindex="-1" role="dialog" aria-labelledby="updatePatientLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePatientLabel">Update Patiet & Medical History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('receptionist/database/patient') }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="user_id">
                <input type="hidden" name="medical_history_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Status</label>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label class="fancy-radio custom-color-green">
                                        <input name="status" value="true" type="radio" checked>
                                        <span>
                                            <i></i>Aktive
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <label class="fancy-radio custom-color-green">
                                        <input name="status" value="false" type="radio">
                                        <span>
                                            <i></i>Non-Aktive
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nameUpdate">Name</label>
                        <input required type="text" class="form-control" id="nameUpdate" name="name" aria-describedby="name">
                    </div>
                    <div class="form-group">
                        <label for="usernameUpdate">Username</label>
                        <input required type="text" class="form-control" id="usernameUpdate" name="username" aria-describedby="username">
                    </div>
                    <div class="form-group">
                        <label for="nikUpdate">NIK</label>
                        <input required type="text" class="form-control" id="nikUpdate" name="nik" aria-describedby="nik">
                    </div>
                    <div class="form-group">
                        <label for="emailEmail">Email</label>
                        <input type="email" class="form-control" id="emailEmail" name="email" aria-describedby="email">
                    </div>
                    <div class="form-group">
                        <label>Allergic</label>
                        <div class="row">
                            <div class="col-6">
                                <div class="fancy-checkbox">
                                    <label><input name="allergic[]" type="checkbox" value="Eksim (dermatitis)"><span>Eksim (dermatitis)</span></label>
                                </div>
                                <div class="fancy-checkbox">
                                    <label><input name="allergic[]" type="checkbox" value="Urtikaria (Biduran)"><span>Urtikaria (Biduran)</span></label>
                                </div>
                                <div class="fancy-checkbox">
                                    <label><input name="allergic[]" type="checkbox" value="Angiodema"><span>Angiodema</span></label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="otherAllergic" class="text-muted">Other</label>
                                    <input name="allergic[]" type="text" class="form-control" id="otherAllergic" aria-describedby="otherAllergic">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Been Diagnosed</label>
                        <div class="row">
                            <div class="col-6">
                                <div class="fancy-checkbox">
                                    <label><input name="diagnosed[]" type="checkbox" value="Rheumatic Fever"><span>Rheumatic Fever</span></label>
                                </div>
                                <div class="fancy-checkbox">
                                    <label><input name="diagnosed[]" type="checkbox" value="Heart Murmurs"><span>Heart Murmurs</span></label>
                                </div>
                                <div class="fancy-checkbox">
                                    <label><input name="diagnosed[]" type="checkbox" value="High Blood Pressure"><span>High Blood Pressure</span></label>
                                </div>
                                <div class="fancy-checkbox">
                                    <label><input name="diagnosed[]" type="checkbox" value="Heart Disease"><span>Heart Disease</span></label>
                                </div>
                                <div class="fancy-checkbox">
                                    <label><input name="diagnosed[]" type="checkbox" value="Tuberculosis"><span>Tuberculosis</span></label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="fancy-checkbox">
                                    <label><input name="diagnosed[]" type="checkbox" value="Asthma/Hay Fever"><span>Asthma/Hay Fever</span></label>
                                </div>
                                <div class="fancy-checkbox">
                                    <label><input name="diagnosed[]" type="checkbox" value="Difficulty in Breathing"><span>Difficulty in Breathing</span></label>
                                </div>
                                <div class="fancy-checkbox">
                                    <label><input name="diagnosed[]" type="checkbox" value="Pneumonia"><span>Pneumonia</span></label>
                                </div>
                                <div class="fancy-checkbox">
                                    <label><input name="diagnosed[]" type="checkbox" value="Diabetes"><span>Diabetes</span></label>
                                </div>
                                <div class="fancy-checkbox">
                                    <label><input name="diagnosed[]" type="checkbox" value="Stomach Problems"><span>Stomach Problems</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mx-2">
                                    <label for="otherDiagnosed" class="text-muted">Other</label>
                                    <input name="diagnosed[]" type="text" class="form-control" id="otherDiagnosed" aria-describedby="otherDiagnosed">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group py-3">
                        <label for="hospitalizationSurgery1">Hospitalization Surgery</label>
                        <div id="hospitalizationSurgeryInputUpdate">
                            <div class="inputManyHS input-HS-1">
                                <input name="hospitalization_surgery[]" type="text" class="form-control" id="hospitalizationSurgery1" aria-describedby="hospitalizationSurgery">
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary float-right" onclick="addInputHSUpdate()">
                                Tambah input
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="anamnesisUpdate">Anamnesis</label>
                        <textarea required class="form-control" name="anamnesis" rows="7" id="anamnesisUpdate" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
