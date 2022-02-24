<div class="modal fade" id="createAccount" tabindex="-1" role="dialog" aria-labelledby="create Account" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createAccountTitle">Create Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="basic-form" novalidate>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Klinik</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" name="clinic">
                                <option selected disabled>Pilih klinik</option>
                                @foreach ($fullClinics['data'] as $clinic)
                                <option value="{{ $clinic['id'] }}">{{ $clinic['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
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
                <button type="button" class="btn btn-round btn-primary" onclick="craeteAccount()">Create</button>
            </div>
        </div>
    </div>
</div>
