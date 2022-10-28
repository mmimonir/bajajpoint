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
            <form action="#" method="POST" class="form-horizontal" id="add_employee_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="name" name="name" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                            <input type="text" id="mobile" name="mobile" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Position</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="roles_id" id="role">

                            </select>
                        </div>
                        <!-- <div class="col-sm-9">
                            <input type="text" id="role" name="role" class="form-control" value="" />
                        </div> -->
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Education</label>
                        <div class="col-sm-9">
                            <input type="text" id="education" name="education" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Permanent Address</label>
                        <div class="col-sm-9">
                            <input type="text" id="permanent_address" name="permanent_address" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Present Address</label>
                        <div class="col-sm-9">
                            <input type="text" id="present_address" name="present_address" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Gardian Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="gardian_name" name="gardian_name" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Gardian Mobile</label>
                        <div class="col-sm-9">
                            <input type="text" id="gardian_mobile" name="gardian_mobile" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Joining Date</label>
                        <div class="col-sm-9">
                            <input type="date" id="joining_date" name="joining_date" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">NID No</label>
                        <div class="col-sm-9">
                            <input type="text" id="nid_no" name="nid_no" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Salary</label>
                        <div class="col-sm-9">
                            <input type="text" id="salary" name="salary" class="form-control" value="" />
                            <input type="hidden" id="employee_id" name="id" class="form-control" value="" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" id="update_employee" name="" class="btn btn-success btn-sm  waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Add End-->