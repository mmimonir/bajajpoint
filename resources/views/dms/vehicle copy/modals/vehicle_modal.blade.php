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
            <form action="#" method="POST" class="form-horizontal" id="add_vehicle_form">
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Code</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_model_code" name="model_code" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_model_name" name="model_name" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Model</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_model" name="model" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Vehicle</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_model_make_of_vehicle" name="model_make_of_vehicle" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Class</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_class_of_vehicle" name="class_of_vehicle" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Cylinder</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_no_of_cylinder_with_cc" name="no_of_cylinder_with_cc" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Tyre</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_size_of_tyre" name="size_of_tyre" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Power</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_horse_power" name="horse_power" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">LW</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_ladan_weight" name="ladan_weight" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">UW</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_unladen_weight" name="unladen_weight" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Wheel</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_wheel_base" name="wheel_base" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">SC</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_seating_capacity" name="seating_capacity" class="form-control" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Makers</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_makers_name" name="makers_name" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_makers_country" name="makers_country" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">CC</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_cubic_capacity" name="cubic_capacity" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">TRA</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_the_reg_auth" name="the_reg_auth" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">BRTA</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_brta" name="brta" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">NOC</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_no_of_cylinder" name="no_of_cylinder" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Fuel</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_fuel_used" name="fuel_used" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">RPM</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_rpm" name="rpm" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">SID</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_seats_inc_driver" name="seats_inc_driver" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_description" name="description" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="e_status" name="status" class="form-control" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" id="update_vehicle" name="" class="btn btn-success btn-sm  waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Add End-->