<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="paymentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentLabel">Create Patiet & Medical History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('receptionist/database/queue') }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="queue_id">
                <input type="hidden" name="status" value="DONE">
                <div class="modal-body">
                    <fieldset disabled>
                        <div class="form-group">
                            <label for="namePayment">Name</label>
                            <input type="text" class="form-control" id="namePayment" name="name" aria-describedby="name">
                        </div>
                        <div class="form-group">
                            <label for="usernamePayment">Username</label>
                            <input type="text" class="form-control" id="usernamePayment" name="username" aria-describedby="username">
                        </div>
                        <div class="form-group">
                            <label for="nikPayment">NIK</label>
                            <input type="text" class="form-control" id="nikPayment" name="nik" aria-describedby="nik">
                        </div>
                    </fieldset>

                    <div id="accordion">

                    </div>

                    <div class="form-group">
                        <label for="totalPayment">Total harga</label>
                        <input type="text" class="form-control" id="totalPayment" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-payment">Done Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>
