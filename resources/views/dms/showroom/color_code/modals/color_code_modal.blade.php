<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true" style="display:none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title p-1" id="title">Add</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form action="#" method="POST" class="form-horizontal" id="add_color_code_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Combine</label>
                        <div class="col-sm-9">
                            <input required type="text" id="combine" name="combine" class="form-control" value="" />
                            <input type="hidden" id="color_code_id" name="id" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Color Code</label>
                        <div class="col-sm-9">
                            <input required type="text" id="color_code" name="color_code" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Model Code</label>
                        <div class="col-sm-9">
                            <input required type="text" id="model_code" name="model_code" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Model Name</label>
                        <div class="col-sm-9">
                            <input required type="text" id="model_name" name="model_name" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Color</label>
                        <div class="col-sm-9">
                            <input required type="text" id="color" name="color" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <input required type="text" id="description" name="description" class="form-control" value="" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" id="add_color_code" name="" class="btn btn-success btn-sm  waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>