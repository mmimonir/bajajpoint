@extends('layouts.app')
@section('title', 'Price Declare')
@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header">
                <h3 class="bg-dark text-center p-2 text-white mt-2 rounded">Price Declare (VAT)</h3>
                <a class="m-r-15 text-muted edit float-right btn btn-dark text-white mb-1" id="add" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <div id="show_all_pd" class="container h-100 d-flex justify-content-center">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add-->
@extends('dms.showroom.price_declare.modals.price_declare_modal')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
@endsection

@section('script')
<script>
    $(document).ready(function() {

        $(document).on('click', '#add', function() {
            $("#addModal").modal('show');
            $("form#add_pd_form").prop('id', 'add_pd_form');
            $("form#edit_pd_form").prop('id', 'add_pd_form');
            $("#addModal :input").prop("readOnly", false);
            $("form").trigger("reset");
            $("#addModal").find('#title').text('Create Price Declare File');
            $("#add_pd").text('Create');
            $("#pd_id").val('');
            $.ajax({
                url: "{{ route('pd.get_business_profile') }}",
                type: "get",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function({
                    profile_data,
                    vehicles
                }) {
                    if (profile_data) {
                        $("#business_profile_id").empty();
                        $("#business_profile_id").append('<option value="">Select Business Profile</option>');
                        profile_data.forEach(function(data) {
                            $("#business_profile_id").append(`<option value="${data.id}">${data.name}</option>`);
                        });
                        $('#model_id').empty();
                        $('#model_id').append('<option value="">Select Model</option>');
                        vehicles.forEach(function(data) {
                            $('#model_id').append(`<option value="${data.id}">${data.model}</option>`);
                        });

                    }

                }
            });

        });


        // add new employee ajax request
        $(document).on('submit', "#add_pd_form", function(e) {
            e.preventDefault();
            const FD = new FormData(this);

            $.ajax({
                url: "{{ route('pd.add') }}",
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
                        fetchAllPd();
                    } else {
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "Something went wrong",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                    $("#addModal").modal("hide");
                },
            });
        });

        // view single pd start
        $(document).on('click', '.viewIcon', function() {
            var _this = $(this).parent().parent();
            const id = _this.find('.id').val();

            $.ajax({
                url: "{{ route('pd.get_single_pd') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id
                },
                success: function(data) {
                    console.log(data);

                    Object.keys(data).forEach(function(key) {
                        $("#addModal").find(`#${key}`).val(data[key]);
                    });

                    $("#addModal").find("#business_profile_id").empty();
                    $("#addModal").find("#business_profile_id").append(`<option value="">${data.name}</option>`);

                    $("#addModal").find("#model_id").empty();
                    $("#addModal").find("#model_id").append(`<option value="">${data.model_name}</option>`);

                    $("#addModal").modal('show');
                    $("#addModal").find('#title').text('View MRP');
                    $("#addModal :input").prop("readOnly", true);
                }
            });
        });
        // view single pd end

        // edit single mrp start
        $(document).on('click', '.editIcon', function() {

            $("form").trigger("reset");
            $("form#add_pd_form").prop('id', 'edit_pd_form');
            $("#add_pd").text('Update');

            var _this = $(this).parent().parent();
            const id = _this.find('.id').val();

            $.ajax({
                url: "{{ route('pd.get_single_pd') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id
                },
                success: function(data) {
                    Object.keys(data).forEach(function(key) {
                        $("#addModal").find(`#${key}`).val(data[key]);
                    });

                    $("#addModal").modal('show');
                    $("#pd_id").val(data.id);
                    $("#addModal :input").prop("readOnly", false);
                    $("#addModal").find('#title').text('Update MRP');
                }
            });
        });
        // edit single mrp end

        // update employee ajax request
        $(document).on('submit', '#edit_pd_form', function(e) {

            e.preventDefault();
            const FD = new FormData(this);

            $.ajax({
                url: "{{ route('pd.update') }}",
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
                        fetchAllPd();
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                    $("#addModal").modal('hide');
                }
            });
        });

        fetchAllPd();

        // delete employee ajax request
        $(document).on('click', '.deleteIcon', function(e) {

            e.preventDefault();
            var _this = $(this).parent().parent();
            const id = _this.find('.id').val();
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
                        url: "{{ route('pd.delete') }}",
                        method: 'delete',
                        data: {
                            id,
                            _token: csrf
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: response.success,
                                    type: 'success',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.error,
                                    type: 'error',
                                    confirmButtonText: 'OK'
                                })
                            }
                            fetchAllPd();
                        }
                    });
                }
            })
        });

        function fetchAllPd() {
            const BDFormat = new Intl.NumberFormat("en-IN", {
                maximumFractionDigits: 0
            });
            $.ajax({
                url: "{{ route('pd.get') }}",
                method: 'get',
                success: function(response) {
                    if (response.length > 0) {
                        var html = `<table id="example" class="table table-hover table-responsive table-striped text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="text-center">Sl</th>
                                <th class="text-center">Dealer Name</th>                                                                
                                <th class="text-center">Model</th>                                
                                <th class="text-center">Buy Price</th>                                                                
                                <th class="text-center">MRP</th>
                                <th class="text-center">Submit Date</th>                                                                
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        response.forEach(function(data, index) {
                            html +=
                                `<tr style="height:30px;">                                
                                <td class="dealer_name text-center">${index + 1}</td>
                                <td class="dealer_name">${data.name}</td>                                                                
                                <td class="model_name">${data.model_name}</td>
                                <td class="buy_price text-right">${BDFormat.format(data.buy_price)}</td>
                                <td class="vat_mrp text-right">${BDFormat.format(data.vat_mrp)}</td>
                                <td class="submit_date text-center">${data.submit_date}</td>                                                                
                                <td class="text-center">
                                <input class="id" type="hidden" name="id" value="${data.pd_id}">
                                    <a href="#" class="m-r-15 text-muted viewIcon">
                                        <i class="fa fa-eye" style="color: #2196f3;font-size:16px;"></i>                                    
                                    </a>
                                    <a href="#" class="m-r-15 text-muted editIcon">
                                        <i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i>
                                    </a>                                    
                                    <a href="#" class="deleteIcon">
                                        <i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:16px;">
                                        </i>
                                    </a>
                                </td>
                            </tr>`;
                        });
                        html += `</tbody></table>`;
                    } else {
                        html = `<h3 class="text-center">No Data Found</h3>`;
                    }
                    $("#show_all_pd").html(html);
                    $("#example").DataTable({
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