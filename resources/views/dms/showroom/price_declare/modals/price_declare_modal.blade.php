<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title p-1" id="title">Add</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form action="#" method="POST" class="form-horizontal" id="add_pd_form">
                @csrf
                <input type="hidden" id="pd_id" name="id" class="form-control" value="" />
                <div class="modal-body">
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Dealer</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="business_profile_id" name="business_profile_id">

                            </select>
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Model</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="model_id" name="model_id">

                            </select>
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">HS Code</label>
                        <div class="col-sm-9">
                            <input required type="text" id="hs_code" name="hs_code" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <input required type="text" id="products_description" name="products_description" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">TR</label>
                        <div class="col-sm-9">
                            <input required type="text" id="tr" name="tr" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Unit</label>
                        <div class="col-sm-9">
                            <input required type="text" id="unit_of_supply" name="unit_of_supply" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Buy Price</label>
                        <div class="col-sm-9">
                            <input required type="text" id="buy_price" name="buy_price" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Percentage</label>
                        <div class="col-sm-9">
                            <input required type="text" id="percentage" name="percentage" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Value Addition</label>
                        <div class="col-sm-9">
                            <input required type="text" id="value_addition_amount" name="value_addition_amount" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">MRP</label>
                        <div class="col-sm-9">
                            <input required type="text" id="vat_mrp" name="vat_mrp" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Submit Date</label>
                        <div class="col-sm-9">
                            <input required type="date" id="submit_date" name="submit_date" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Mushak No</label>
                        <div class="col-sm-9">
                            <input required type="text" id="purchage_mushak_no" name="purchage_mushak_no" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Mushak Date</label>
                        <div class="col-sm-9">
                            <input required type="date" id="mushak_date" name="mushak_date" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <input required type="text" id="status" name="status" class="form-control" value="" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" id="add_pd" name="" class="btn btn-success btn-sm  waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>