<!-- Modal Add-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title p-1" id="title">Add</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form class="form-horizontal" id="add_bank_account_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Bank Name</label>
                        <div class="col-sm-9">
                            <input required type="text" id="bank_name" name="bank_name" class="form-control" value="" />
                            <input type="hidden" id="bank_account_id" name="id" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Branch</label>
                        <div class="col-sm-9">
                            <input type="text" id="branch_name" name="branch_name" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Account Title</label>
                        <div class="col-sm-9">
                            <input type="text" id="account_title" name="account_title" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Account No</label>
                        <div class="col-sm-9">
                            <input type="text" id="account_number" name="account_number" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Routing No</label>
                        <div class="col-sm-9">
                            <input type="text" id="routing_number" name="routing_number" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Merchant ID</label>
                        <div class="col-sm-9">
                            <input type="text" id="merchant_id" name="merchant_id" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Account Address</label>
                        <div class="col-sm-9">
                            <input type="text" id="account_address" name="account_address" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Opening Date</label>
                        <div class="col-sm-9">
                            <input type="text" id="opening_date" name="opening_date" class="form-control" value="" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" id="create" name="" class="btn btn-success btn-sm  waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Add End-->