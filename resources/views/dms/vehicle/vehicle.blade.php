@extends('layouts.app')

@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <h3 class="bg-primary text-center p-2 text-white mt-2 rounded">Motorcycle Details</h3>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a class="m-r-15 text-muted edit float-right btn btn-primary text-white mb-1" id="add" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i>
                </a>
                <div id="show_all_vehicle">
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title p-1" id="title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form action="#" method="POST" class="form-horizontal" id="edit_vehicle_form">
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_model_code" name="model_code" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_model_name" name="model_name" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Model</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_model" name="model" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Vehicle</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_model_make_of_vehicle" name="model_make_of_vehicle" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Class</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_class_of_vehicle" name="class_of_vehicle" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Cylinder</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_no_of_cylinder_with_cc" name="no_of_cylinder_with_cc" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Tyre</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_size_of_tyre" name="size_of_tyre" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Power</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_horse_power" name="horse_power" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">LW</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_ladan_weight" name="ladan_weight" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">UW</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_unladen_weight" name="unladen_weight" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Wheel</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_wheel_base" name="wheel_base" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">SC</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_seating_capacity" name="seating_capacity" class="form-control" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Makers</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_makers_name" name="makers_name" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_makers_country" name="makers_country" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">CC</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_cubic_capacity" name="cubic_capacity" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">TRA</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_the_reg_auth" name="the_reg_auth" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">BRTA</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_brta" name="brta" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">NOC</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_no_of_cylinder" name="no_of_cylinder" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Fuel</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_fuel_used" name="fuel_used" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">RPM</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_rpm" name="rpm" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">SID</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_seats_inc_driver" name="seats_inc_driver" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_description" name="description" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_status" name="status" class="form-control" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" id="update_mrp" name="" class="btn btn-success btn-sm  waves-light">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Update End-->

<!-- Modal Add-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title p-1" id="title">Add</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                        <input type="text" id="e_model_code" name="model_code" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_model_name" name="model_name" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Model</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_model" name="model" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Vehicle</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_model_make_of_vehicle" name="model_make_of_vehicle" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Class</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_class_of_vehicle" name="class_of_vehicle" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Cylinder</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_no_of_cylinder_with_cc" name="no_of_cylinder_with_cc" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Tyre</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_size_of_tyre" name="size_of_tyre" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Power</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_horse_power" name="horse_power" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">LW</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_ladan_weight" name="ladan_weight" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">UW</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_unladen_weight" name="unladen_weight" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Wheel</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_wheel_base" name="wheel_base" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">SC</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_seating_capacity" name="seating_capacity" class="form-control" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Makers</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_makers_name" name="makers_name" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_makers_country" name="makers_country" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">CC</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_cubic_capacity" name="cubic_capacity" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">TRA</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_the_reg_auth" name="the_reg_auth" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">BRTA</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_brta" name="brta" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">NOC</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_no_of_cylinder" name="no_of_cylinder" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Fuel</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_fuel_used" name="fuel_used" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">RPM</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_rpm" name="rpm" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">SID</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_seats_inc_driver" name="seats_inc_driver" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_description" name="description" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group-sm row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="e_status" name="status" class="form-control" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" id="update_vehicle" name="" class="btn btn-success btn-sm  waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Add End-->
@endsection

@section('datatable')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('script')
<script>
    $(function() {
        $(document).on('click', '.editIcon', function() {
            var _this = $(this).parents('tr');
            $('#e_model_code').val(_this.find('.model_code').text());
            $('#e_model_name').val(_this.find('.model_name').text());
            $('#e_model').val(_this.find('.model').text());
            $('#e_model_make_of_vehicle').val(_this.find('.model_make_of_vehicle').text());
            $('#e_class_of_vehicle').val(_this.find('.class_of_vehicle').text());
            $('#e_no_of_cylinder_with_cc').val(_this.find('.no_of_cylinder_with_cc').text());
            $('#e_size_of_tyre').val(_this.find('.size_of_tyre').text());
            $('#e_horse_power').val(_this.find('.horse_power').text());
            $('#e_ladan_weight').val(_this.find('.ladan_weight').text());
            $('#e_unladen_weight').val(_this.find('.unladen_weight').text());
            $('#e_wheel_base').val(_this.find('.wheel_base').text());
            $('#e_seating_capacity').val(_this.find('.seating_capacity').text());
            $('#e_makers_name').val(_this.find('.makers_name').text());
            $('#e_makers_country').val(_this.find('.makers_country').text());
            $('#e_cubic_capacity').val(_this.find('.cubic_capacity').text());
            $('#e_the_reg_auth').val(_this.find('.the_reg_auth').text());
            $('#e_brta').val(_this.find('.brta').text());
            $('#e_no_of_cylinder').val(_this.find('.no_of_cylinder').text());
            $('#e_fuel_used').val(_this.find('.fuel_used').text());
            $('#e_rpm').val(_this.find('.rpm').text());
            $('#e_seats_inc_driver').val(_this.find('.seats_inc_driver').text());
            $('#e_description').val(_this.find('.description').text());
            $('#e_status').val(_this.find('.status').text());

        });
        // add new employee ajax request
        $("#add_vehicle_form").submit(function(e) {
            e.preventDefault();
            console.log('add_vehicle_form');
            const FD = new FormData(this);
            $.ajax({
                url: "{{ route('vehicle.add') }}",
                method: "post",
                data: FD,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Your work has been saved",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        fetchAll();
                    }
                    $("#addModal").modal("hide");
                },
            });
        });
        // update employee ajax request
        $("#edit_vehicle_form").submit(function(e) {
            console.log('edit_vehicle_form');
            e.preventDefault();
            const FD = new FormData(this);
            $("#update_vehicle").text('Updating...');
            $.ajax({
                url: "{{ route('vehicle.update') }}",
                method: 'post',
                data: FD,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        fetchAll();
                    }
                    $("#updateModal").modal('hide');
                }
            });
        });
        // delete employee ajax request
        $(document).on('click', '.deleteIcon', function(e) {
            e.preventDefault();
            let model_code = $(this).attr('id');
            let csrf = '{{ csrf_token() }}';
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('vehicle.delete') }}",
                        method: 'delete',
                        data: {
                            model_code: model_code,
                            _token: csrf
                        },
                        success: function(response) {
                            // console.log(response);
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Data Deleted Successfully",
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            fetchAll();
                        }
                    });
                }
            })
        });

        fetchAll();

        function fetchAll() {
            const BDFormat = new Intl.NumberFormat("en-IN", {
                maximumFractionDigits: 0
            });
            $.ajax({
                url: "{{ route('vehicle.get') }}",
                method: 'get',
                success: function(response) {
                    if (response.length > 0) {
                        var html = `<table id="vehicle" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">Code</th>                                
                                <th class="align-middle">Model Name</th>
                                <th class="align-middle">Model</th>
                                <th class="align-middle">Vehicle</th>
                                <th class="align-middle">Class</th>
                                <th class="align-middle">Cylinder</th>
                                <th class="align-middle">Tyre</th>
                                <th class="align-middle">Power</th>
                                <th class="align-middle">LW</th>
                                <th class="align-middle">UW</th>
                                <th class="align-middle">Wheel</th>
                                <th class="align-middle">SC</th>
                                <th class="align-middle">Makers</th>
                                <th class="align-middle">Country</th>
                                <th class="align-middle">CC</th>
                                <th class="align-middle">TRA</th>
                                <th class="align-middle">BRTA</th>
                                <th class="align-middle">NOC</th>
                                <th class="align-middle">Fuel</th>
                                <th class="align-middle">RPM</th>
                                <th class="align-middle">SID</th>
                                <th class="align-middle">Description</th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Action</th>                                
                            </tr>
                        </thead>
                        <tbody>`;
                        response.forEach(function(data, index) {
                            html +=
                                `<tr>                                
                                <td class="model_code">${data.model_code}</td>                                
                                <td class="model_name">${data.model_name}</td>                                
                                <td class="model">${data.model}</td>                                
                                <td class="model_make_of_vehicle"><textarea readonly>${data.model_make_of_vehicle}</textarea></td>                                
                                <td class="class_of_vehicle">${data.class_of_vehicle}</td>                                
                                <td class="no_of_cylinder_with_cc">${data.no_of_cylinder_with_cc}</td>                                
                                <td class="size_of_tyre"><textarea readonly>${data.size_of_tyre}</textarea></td>                                
                                <td class="horse_power">${data.horse_power}</td>                                
                                <td class="ladan_weight">${data.ladan_weight}</td>                                
                                <td class="unladen_weight">${data.unladen_weight}</td>                                
                                <td class="wheel_base">${data.wheel_base}</td>                                
                                <td class="seating_capacity">${data.seating_capacity}</td>                                
                                <td class="makers_name"><textarea readonly>${data.makers_name}</textarea></td>                                
                                <td class="makers_country">${data.makers_country}</td>                                
                                <td class="cubic_capacity">${data.cubic_capacity}</td>                                
                                <td class="the_reg_auth">${data.the_reg_auth}</td>                                
                                <td class="brta"><textarea readonly>${data.brta}</textarea></td>                                
                                <td class="no_of_cylinder">${data.no_of_cylinder}</td>                                
                                <td class="fuel_used">${data.fuel_used}</td>                                
                                <td class="rpm">${data.rpm}</td>                                
                                <td class="seats_inc_driver">${data.seats_inc_driver}</td>                                
                                <td class="description"><textarea readonly>${data.description}</textarea></td>                                
                                <td class="status">${data.status}</td>                                
                                <td class="text-center">
                                    <a href="#" class="m-r-15 text-muted editIcon" id="${data.model_code}" data-toggle="modal" data-idUpdate="${data.model_code}" data-target="#updateModal">
                                        <i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i>
                                    </a>
                                    <a href="#" class="deleteIcon" id="${data.model_code}">
                                        <i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:16px;">
                                        </i>
                                    </a>
                                </td>
                            </tr>`;
                        });
                        html += `</tbody></table>`;
                    } else {
                        html = `<h3 class="text-center">No MRP Found</h3>`;
                    }
                    // console.log(html);
                    $("#show_all_vehicle").html(html);
                    $("#vehicle").DataTable({
                        pageLength: 10,
                        responsive: true,
                        lengthChange: true,
                        dom: '<"html5buttons"B>lTfgitp',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                }
            });
        };
    });
</script>
@endsection