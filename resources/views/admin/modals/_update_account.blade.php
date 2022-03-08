<div class="modal fade" id="updateAccount" tabindex="-1" role="dialog" aria-labelledby="Update Account" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateAccountTitle">Update Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="basic-form" novalidate>
                    <input type="hidden" name="user_id">
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
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" name="role">
                                <option selected disabled>Role</option>
                                <option value="SUPERADMIN">SUPERADMIN</option>
                                <option value="ADMIN">ADMIN</option>
                                <option value="DOCTOR">DOCTOR</option>
                                <option value="RECEPTIONIST">RECEPTIONIST</option>
                                <option value="PATIENT">PATIENT</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-round btn-primary" onclick="updateAccount()">Update</button>
            </div>
        </div>
    </div>
</div>
