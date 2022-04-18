<div class="modal fade" id="createExistingQueue" tabindex="-1" role="dialog" aria-labelledby="createExistingQueueLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createExistingQueueLabel">Create Existing Queue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('receptionist/database/queue/existing') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <p class="text-muted">
                            <strong>Note</strong> : Membuat antrian baru dari akun yang sudah ada, dan pastikan pasien memilik NIK pada akunnya, jika pasien belum memiliki akun silahkan buat terlebih dahulu, <a href="{{ url('receptionist/patient-management') }}">klik disini.</a>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input required type="text" class="form-control" id="nik" name="nik" aria-describedby="nik">
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
                        <div id="hospitalizationSurgeryInput">
                            <div class="inputManyHS input-HS-1">
                                <input name="hospitalization_surgery[]" type="text" class="form-control" id="hospitalizationSurgery1" aria-describedby="hospitalizationSurgery">
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary float-right" onclick="addInputHS()">
                                Tambah input
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="anamnesis">Anamnesis</label>
                        <textarea required class="form-control" name="anamnesis" rows="7" id="anamnesis" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Doctor</label>
                        <div class="input-group mb-3">
                            <select class="form-control" name="doctor" required>
                                <option selected disabled>Doctor</option>
                                @foreach ($doctors['data'] as $doctor)
                                    <option value="{{ $doctor['id'] }}">{{ $doctor['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
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
