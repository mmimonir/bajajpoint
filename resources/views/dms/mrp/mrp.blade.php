@extends('layouts.app')
@section('title', 'MRP List')
@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header">
                <h3 class="bg-dark text-center p-2 text-white mt-2 rounded">Product Price Details</h3>
                <a class="m-r-15 text-muted edit float-right btn btn-dark text-white mb-1" id="add">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <div id="show_all_mrp" class="container h-100 d-flex justify-content-center">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mrp Modal Start -->
@extends('dms.mrp.modals.mrp_modal')
<!-- Mrp Modal End -->
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
            $("form#add_mrp_form").prop('id', 'add_mrp_form');
            $("#addModal :input").prop("readOnly", false);
            $("form").trigger("reset");
            $("#addModal").find('#title').text('Create MRP');
            $("#update_mrp").text('Create');
        });

        function vat_calculate_add() {
            let mrp = +$('#mrp').val();
            let commission = +$('#commission').val();
            let tr = +$('#tr').val();
            let purchage_price_tr = mrp - commission
            let purchage_price = purchage_price_tr - (commission * 0.15);
            $('#basic_vat').val(Math.round((mrp * 100) / 115));
            $('#sale_vat').val(Math.round((mrp * 15) / 115));
            $('#tr').val(commission * 0.15);
            $('#purchage_price').val(purchage_price);
            $('#rebate_basic').val(Math.round((purchage_price * 100) / 115));
            $('#rebate').val(Math.round((purchage_price * 15) / 115));
        }

        $(document).on('input', "#add_mrp_form", function() {
            vat_calculate_add();
        });
        $(document).on('input', "#update_mrp_form", function() {
            vat_calculate_add();
        });

        // add new employee ajax request
        $(document).on('submit', "#add_mrp_form", function(e) {
            e.preventDefault();
            const FD = new FormData(this);
            $.ajax({
                url: "{{ route('mrp.add') }}",
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
                        fetchAllMrp();
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

        // view single mrp start
        $(document).on('click', '.viewIcon', function() {
            var _this = $(this).parent().parent();
            const id = _this.find('.id').val();
            $.ajax({
                url: "{{ route('mrp.get_single_mrp') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id
                },
                success: function(data) {
                    $("#addModal").modal('show');
                    $("#addModal").find('#title').text('View MRP');
                    $("#addModal").find('#model_code').val(data.model_code);
                    $("#addModal").find('#model_name').val(data.model_name);
                    $("#addModal").find('#vat_purchage_mrp').val(data.vat_purchage_mrp);
                    $("#addModal").find('#mrp').val(data.mrp);
                    $("#addModal").find('#vat_mrp').val(data.vat_mrp);
                    $("#addModal").find('#basic_vat').val(data.basic_vat);
                    $("#addModal").find('#sale_vat').val(data.sale_vat);
                    $("#addModal").find('#commission').val(data.commission);
                    $("#addModal").find('#tr').val(data.tr);
                    $("#addModal").find('#purchage_price').val(data.purchage_price);
                    $("#addModal").find('#rebate_basic').val(data.rebate_basic);
                    $("#addModal").find('#rebate').val(data.rebate);
                    $("#addModal :input").prop("readOnly", true);
                }
            });
        });
        // view single mrp end

        // edit single mrp start
        $(document).on('click', '.editIcon', function() {
            $("form").trigger("reset");
            $("form#add_mrp_form").prop('id', 'update_mrp_form');
            $("#update_mrp").text('Update MRP');
            var _this = $(this).parent().parent();
            const id = _this.find('.id').val();
            $.ajax({
                url: "{{ route('mrp.get_single_mrp') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id
                },
                success: function(data) {
                    $("#addModal").modal('show');
                    $("#addModal :input").prop("readOnly", false);
                    $("#addModal").find('#title').text('Update MRP');
                    $("#addModal").find('#model_code').val(data.model_code);
                    $("#addModal").find('#mrp_id').val(data.id);
                    $("#addModal").find('#model_name').val(data.model_name);
                    $("#addModal").find('#vat_purchage_mrp').val(data.vat_purchage_mrp);
                    $("#addModal").find('#mrp').val(data.mrp);
                    $("#addModal").find('#vat_mrp').val(data.vat_mrp);
                    $("#addModal").find('#basic_vat').val(data.basic_vat);
                    $("#addModal").find('#sale_vat').val(data.sale_vat);
                    $("#addModal").find('#commission').val(data.commission);
                    $("#addModal").find('#tr').val(data.tr);
                    $("#addModal").find('#purchage_price').val(data.purchage_price);
                    $("#addModal").find('#rebate_basic').val(data.rebate_basic);
                    $("#addModal").find('#rebate').val(data.rebate);
                    // $("#addModal :input").prop("readOnly", true);
                }
            });
        });
        // edit single mrp end

        // update employee ajax request
        $(document).on('submit', '#update_mrp_form', function(e) {
            e.preventDefault();
            const FD = new FormData(this);
            $.ajax({
                url: "{{ route('mrp.update') }}",
                method: 'post',
                data: FD,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        $("#addModal").modal('hide');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        fetchAllMrp();
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }

                }
            });
        });
        fetchAllMrp();

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
                        url: "{{ route('mrp.delete') }}",
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
                            fetchAllMrp();
                        }
                    });
                }
            })
        });

        function fetchAllMrp() {
            const BDFormat = new Intl.NumberFormat("en-IN", {
                maximumFractionDigits: 0
            });
            $.ajax({
                url: "{{ route('mrp.get') }}",
                method: 'get',
                success: function(response) {
                    if (response.length > 0) {
                        var html = `<table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">Sl</th>
                                <th class="align-middle">Model Name</th>                                
                                <th class="align-middle">MRP</th>                                
                                <th class="align-middle">Basic</th>
                                <th class="align-middle">Sale VAT</th>
                                <th class="align-middle">VAT MRP</th>
                                <th class="align-middle">Commission</th>
                                <th class="align-middle">Rebate</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        response.forEach(function(data, index) {
                            html +=
                                `<tr style="height:30px;">                                
                                <td class="sl text-center">${index + 1}</td>
                                <td class="model_name">${data.model_name}</td>                                
                                <td class="mrp text-right">${BDFormat.format(data.mrp)}</td>
                                <td class="basic_vat text-right">${BDFormat.format(data.basic_vat)}</td>
                                <td class="sale_vat text-right">${BDFormat.format(data.sale_vat)}</td>
                                <td class="vat_mrp text-right">${BDFormat.format(data.vat_mrp)}</td>
                                <td class="commission text-right">${BDFormat.format(data.commission)}</td>                                
                                <td class="rebate text-right">${BDFormat.format(data.rebate)}</td>
                                <td class="text-center">
                                <input class="id" type="hidden" name="id" value="${data.id}">
                                <a href="#" class="m-r-15 text-muted viewIcon" data-bs-toggle="modal" data-idUpdate="${data.id}" data-bs-target="#updateModal">
                                        <i class="fa fa-eye" style="color: #2196f3;font-size:16px;"></i>                                    
                                    </a>
                                    <a href="#" class="m-r-15 text-muted editIcon" data-bs-toggle="modal" data-idUpdate="${data.id}" data-bs-target="#updateModal">
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
                        html = `<h3 class="text-center">No MRP Found</h3>`;
                    }
                    $("#show_all_mrp").html(html);
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