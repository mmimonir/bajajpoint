<!-- Modal Add-->
<div class="modal fade" id="addMobil" tabindex="-1" role="dialog" aria-hidden="true" style="display:none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title p-1" id="title">Add</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form class="form-horizontal" id="add_mobil_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Unique ID</label>
                        <div class="col-sm-9">
                            <input required type="text" id="part_id" name="part_id" class="form-control" value="" />
                            <input type="hidden" id="id" name="id" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Mobil Description</label>
                        <div class="col-sm-9">
                            <input required type="text" id="mobil_description" name="mobil_description" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Quantity</label>
                        <div class="col-sm-9">
                            <input required type="text" id="stock_quantity" name="stock_quantity" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Mobil Brand Name</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="mobil_brand_name" name="mobil_brand_name">
                                <option value="0">Select Category</option>
                                <option value="bajaj1000">Bajaj DTSi 1000ML</option>
                                <option value="bajaj1200">Bajaj DTSi 1200ML</option>
                                <option value="super_4t">Super 4T</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">MRP</label>
                        <div class="col-sm-9">
                            <input required type="text" id="rate" name="rate" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Location</label>
                        <div class="col-sm-9">
                            <input required type="text" id="location" name="location" class="form-control" value="" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" id="add_mobil" name="" class="btn btn-success btn-sm  waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Add End -->