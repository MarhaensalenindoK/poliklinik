<div class="modal fade" id="detailPayment" tabindex="-1" role="dialog" aria-labelledby="detailPaymentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailPaymentLabel">Payment History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('patient/payment/print') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="medical_history_id">
                    <fieldset disabled>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name">
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

                    </fieldset>
                    <div class="modal-header">
                        <h5 class="modal-title">Medication & Therapy</h5>
                    </div>

                    <div id="accordionPayment">

                    </div>

                    <div class="form-group">
                        <label for="totalPayment">Total harga</label>
                        <input type="text" class="form-control" id="totalPayment" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Download Struk</button>
                </div>
            </form>
        </div>
    </div>
</div>
