<!-- Modal Add-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true" style="left:-13%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="width:149%;">
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
                                    <label class="col-sm-3 col-form-label">Model Code</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="model_code" name="model_code" class="form-control" value="" />
                                        <input type="hidden" id="vehicle_id" name="id" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Model Name</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="model_name" name="model_name" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Model</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="model" name="model" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Vehicle</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="model_make_of_vehicle" name="model_make_of_vehicle" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Class Of Vehicle</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="class_of_vehicle" name="class_of_vehicle" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">No Of Cylinder</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="no_of_cylinder_with_cc" name="no_of_cylinder_with_cc" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Tyre Size</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="size_of_tyre" name="size_of_tyre" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Horse Power</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="horse_power" name="horse_power" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Ladan Weight</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="ladan_weight" name="ladan_weight" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Unladen Weight</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="unladen_weight" name="unladen_weight" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Wheel Base</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="wheel_base" name="wheel_base" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Seating Capacity</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="seating_capacity" name="seating_capacity" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="status" name="status" class="form-control" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Makers Name</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="makers_name" name="makers_name" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Makers Country</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="makers_country" name="makers_country" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Cubic Capacity</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="cubic_capacity" name="cubic_capacity" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">TRA</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="the_reg_auth" name="the_reg_auth" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">BRTA</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="brta" name="brta" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">No Of Cylinder</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="no_of_cylinder" name="no_of_cylinder" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Fuel Used</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="fuel_used" name="fuel_used" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">RPM</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="rpm" name="rpm" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Seating Capasity</label>
                                    <div class="col-sm-9">
                                        <input required type="text" id="seats_inc_driver" name="seats_inc_driver" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea style="height:125px;" type="text" id="description" name="description" class="form-control"></textarea>
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