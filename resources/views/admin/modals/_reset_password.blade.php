<div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="Reset Password" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetPaswordTitle">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="userId">
                <p>Anda yakin untuk mereset password <span id="username" class="text-bold"></span> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-round btn-danger" onclick="resetPassword()">Confirm</button>
            </div>
        </div>
    </div>
</div>
