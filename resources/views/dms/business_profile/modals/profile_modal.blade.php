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
            <form class="form-horizontal" id="add_profile_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Code</label>
                        <div class="col-sm-9">
                            <input required type="text" id="business_code" name="business_code" class="form-control" value="" />
                            <input type="hidden" id="profile_id" name="id" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Business Name</label>
                        <div class="col-sm-9">
                            <input required type="text" id="name" name="name" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">BIN Number</label>
                        <div class="col-sm-9">
                            <input required type="text" id="bin_number" name="bin_number" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">BIN Address</label>
                        <div class="col-sm-9">
                            <input required type="text" id="bin_address" name="bin_address" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Postal Address</label>
                        <div class="col-sm-9">
                            <input required type="text" id="postal_address" name="postal_address" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input required type="email" id="email" name="email" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Mobile Sale</label>
                        <div class="col-sm-9">
                            <input required type="text" id="mobile_sale" name="mobile_sale" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Mobile Parts</label>
                        <div class="col-sm-9">
                            <input required type="text" id="mobile_parts" name="mobile_parts" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Mobile RG</label>
                        <div class="col-sm-9">
                            <input required type="text" id="mobile_rg" name="mobile_rg" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Mobile Office</label>
                        <div class="col-sm-9">
                            <input required type="text" id="mobile_office" name="mobile_office" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Web Site</label>
                        <div class="col-sm-9">
                            <input required type="text" id="web_site" name="web_site" class="form-control" value="" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" id="update_profile" name="" class="btn btn-success btn-sm  waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Add End-->