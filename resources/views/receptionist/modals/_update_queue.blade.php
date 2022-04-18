<div class="modal fade" id="updateQueue" tabindex="-1" role="dialog" aria-labelledby="updateQueueLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateQueueLabel">Update Queue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('receptionist/database/queue') }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="queue_id">
                <div class="modal-body">
                    <fieldset disabled>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
                        </div>
                        <div class="form-group">
                            <label for="">Queue</label>
                            <input type="number" class="form-control" id="queue" name="queue" aria-describedby="queue">
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
                    <div class="form-group">
                        <label>Status</label>
                        <div class="input-group mb-3">
                            <select class="form-control" name="status">
                                <option selected disabled>Status</option>
                                <option value="DONE">Done</option>
                                <option value="CASHER">Casher</option>
                                <option value="CHECKIN">Checkin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
