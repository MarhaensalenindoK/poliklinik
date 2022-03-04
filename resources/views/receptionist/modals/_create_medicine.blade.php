<div class="modal fade" id="createMedicine" tabindex="-1" role="dialog" aria-labelledby="createMedicineLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createMedicineLabel">Add Medicine</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('receptionist/database/medicine') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input required autocomplete="off" type="text" class="form-control" id="name" name="name" aria-describedby="name">
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label class="fancy-radio custom-color-green">
                                        <input name="amount" value="STRIP" type="radio">
                                        <span>
                                            <i></i>Strip
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    <label class="fancy-radio custom-color-green">
                                        <input name="amount" value="BOTTLE" type="radio">
                                        <span>
                                            <i></i>Bottle
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    <label class="fancy-radio custom-color-green">
                                        <input name="amount" value="OINTMENT" type="radio">
                                        <span>
                                            <i></i>Ointment
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <label class="fancy-radio custom-color-green">
                                        <input name="amount" value="TABLET" type="radio">
                                        <span>
                                            <i></i>Tablet
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    <label class="fancy-radio custom-color-green">
                                        <input name="amount" value="CAPSULE" type="radio">
                                        <span>
                                            <i></i>Capsule
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mx-2">
                                    <label for="otherAmount" class="text-muted">Other</label>
                                    <input type="text" class="form-control" id="otherAmount" name="otherAmount" onclick="$('#createMedicine').find('input[type=radio][name=amount]').prop('checked', false)" aria-describedby="amount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label class="fancy-radio custom-color-green">
                                        <input name="typeCreate" value="CAPSULE" type="radio">
                                        <span>
                                            <i></i>Capsule
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    <label class="fancy-radio custom-color-green">
                                        <input name="typeCreate" value="SYRUP" type="radio">
                                        <span>
                                            <i></i>Syrup
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    <label class="fancy-radio custom-color-green">
                                        <input name="typeCreate" value="POWDER" type="radio">
                                        <span>
                                            <i></i>Powder
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <label class="fancy-radio custom-color-green">
                                        <input name="typeCreate" value="TABLET" type="radio">
                                        <span>
                                            <i></i>Tablet
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    <label class="fancy-radio custom-color-green">
                                        <input name="typeCreate" value="OINTMENT" type="radio">
                                        <span>
                                            <i></i>Ointment
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mx-2">
                                    <label for="otherType" class="text-muted">Other</label>
                                    <input type="text" class="form-control" id="otherType" name="otherType" onclick="$('#createMedicine').find('input[type=radio][name=type]').prop('checked', false)" aria-describedby="type">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input required type="number" class="form-control" id="price" name="price" aria-describedby="price">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input required type="number" class="form-control" id="stock" name="stock" aria-describedby="stock">
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
