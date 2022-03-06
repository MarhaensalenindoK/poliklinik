<div class="modal fade" id="createQueue" tabindex="-1" role="dialog" aria-labelledby="createQueueLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createQueueLabel">Update Queue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <input type="hidden" name="medical_history_id">
                <input type="hidden" name="patient_id">
                <div class="modal-body">
                    <fieldset disabled>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="username">
                        </div>
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" aria-describedby="nik">
                        </div>
                    </fieldset>
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
                    <button type="button" class="btn btn-primary" onclick="createQueue()">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
