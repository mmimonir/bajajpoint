<!-- Modal Add-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true" style="display:none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title p-1" id="title">Add</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form action="#" method="POST" class="form-horizontal" id="add_mrp_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Code</label>
                        <div class="col-sm-9">
                            <input required type="text" id="model_code" name="model_code" class="form-control" value="" />
                            <input type="hidden" id="mrp_id" name="id" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Model</label>
                        <div class="col-sm-9">
                            <input required type="text" id="model_name" name="model_name" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">VAT Purchage MRP</label>
                        <div class="col-sm-9">
                            <input required type="text" id="vat_purchage_mrp" name="vat_purchage_mrp" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">MRP</label>
                        <div class="col-sm-9">
                            <input required type="text" id="mrp" name="mrp" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">VAT MRP</label>
                        <div class="col-sm-9">
                            <input required type="text" id="vat_mrp" name="vat_mrp" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Basic (VAT)</label>
                        <div class="col-sm-9">
                            <input required type="text" id="basic_vat" name="basic_vat" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Sale Vat</label>
                        <div class="col-sm-9">
                            <input required type="text" id="sale_vat" name="sale_vat" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Commission</label>
                        <div class="col-sm-9">
                            <input required type="text" id="commission" name="commission" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">TR</label>
                        <div class="col-sm-9">
                            <input required type="text" id="tr" name="tr" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Purchage Price</label>
                        <div class="col-sm-9">
                            <input required type="text" id="purchage_price" name="purchage_price" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Reabate Basic</label>
                        <div class="col-sm-9">
                            <input required type="text" id="rebate_basic" name="rebate_basic" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Reabate</label>
                        <div class="col-sm-9">
                            <input required type="text" id="rebate" name="rebate" class="form-control" value="" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" id="update_mrp" name="" class="btn btn-success btn-sm  waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Add End -->