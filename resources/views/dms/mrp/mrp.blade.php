@extends('layouts.app')

@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header">
                <h3 class="bg-primary text-center p-2 text-white mt-2 rounded">Product Price Details</h3>
                <a class="m-r-15 text-muted edit float-right btn btn-primary text-white mb-1" id="add" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus"></i>
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

<!-- Modal Update-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title p-1" id="title">Update</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form action="#" method="POST" class="form-horizontal" id="edit_mrp_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Code</label>
                        <div class="col-sm-9">
                            <input type="text" id="e_model_code" name="model_code" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Model</label>
                        <div class="col-sm-9">
                            <input type="text" id="e_model" name="model" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">VAT Pur MRP</label>
                        <div class="col-sm-9">
                            <input type="text" id="e_vat_purchage_mrp" name="vat_purchage_mrp" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">MRP</label>
                        <div class="col-sm-9">
                            <input type="text" id="e_mrp" name="mrp" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">VAT MRP</label>
                        <div class="col-sm-9">
                            <input type="text" id="e_vat_mrp" name="vat_mrp" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Basic (VAT)</label>
                        <div class="col-sm-9">
                            <input type="text" id="e_basic_vat" name="basic_vat" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Sale Vat</label>
                        <div class="col-sm-9">
                            <input type="text" id="e_sale_vat" name="sale_vat" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Commission</label>
                        <div class="col-sm-9">
                            <input type="text" id="e_commission" name="commission" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">TR</label>
                        <div class="col-sm-9">
                            <input type="text" id="e_tr" name="tr" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Purchage Price</label>
                        <div class="col-sm-9">
                            <input type="text" id="e_purchage_price" name="purchage_price" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Reabate Basic</label>
                        <div class="col-sm-9">
                            <input type="text" id="e_rebate_basic" name="rebate_basic" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Reabate</label>
                        <div class="col-sm-9">
                            <input type="text" id="e_rebate" name="rebate" class="form-control" value="" />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" id="update_mrp" name="" class="btn btn-success btn-sm  waves-light">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Update End-->

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
            <form action="#" method="POST" class="form-horizontal" id="add_mrp_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Code</label>
                        <div class="col-sm-9">
                            <input type="text" id="a_model_code" name="model_code" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Model</label>
                        <div class="col-sm-9">
                            <input type="text" id="a_model" name="model" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">VAT Pur MRP</label>
                        <div class="col-sm-9">
                            <input type="text" id="a_vat_purchage_mrp" name="vat_purchage_mrp" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">MRP</label>
                        <div class="col-sm-9">
                            <input type="text" id="a_mrp" name="mrp" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">VAT MRP</label>
                        <div class="col-sm-9">
                            <input type="text" id="a_vat_mrp" name="vat_mrp" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Basic (VAT)</label>
                        <div class="col-sm-9">
                            <input type="text" id="a_basic_vat" name="basic_vat" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Sale Vat</label>
                        <div class="col-sm-9">
                            <input type="text" id="a_sale_vat" name="sale_vat" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Commission</label>
                        <div class="col-sm-9">
                            <input type="text" id="a_commission" name="commission" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">TR</label>
                        <div class="col-sm-9">
                            <input type="text" id="a_tr" name="tr" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Purchage Price</label>
                        <div class="col-sm-9">
                            <input type="text" id="a_purchage_price" name="purchage_price" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Reabate Basic</label>
                        <div class="col-sm-9">
                            <input type="text" id="a_rebate_basic" name="rebate_basic" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Reabate</label>
                        <div class="col-sm-9">
                            <input type="text" id="a_rebate" name="rebate" class="form-control" value="" />
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
    $(function() {
        $("input").prop('required', true);
        $(document).on('click', '.editIcon', function() {
            var _this = $(this).parents('tr');
            $('#e_model_code').val(_this.find('.model_code').text());
            $('#e_model').val(_this.find('.model').text());
            $('#e_vat_purchage_mrp').val(_this.find('.vat_purchage_mrp').text().replace(/,/g, ''));
            $('#e_mrp').val(_this.find('.mrp').text().replace(/,/g, ''));
            $('#e_vat_mrp').val(_this.find('.vat_mrp').text().replace(/,/g, ''));
            $('#e_basic_vat').val(_this.find('.basic_vat').text().replace(/,/g, ''));
            $('#e_sale_vat').val(_this.find('.sale_vat').text().replace(/,/g, ''));
            $('#e_commission').val(_this.find('.commission').text().replace(/,/g, ''));
            $('#e_tr').val(_this.find('.tr').text().replace(/,/g, ''));
            $('#e_purchage_price').val(_this.find('.purchage_price').text().replace(/,/g, ''));
            $('#e_rebate_basic').val(_this.find('.rebate_basic').text().replace(/,/g, ''));
            $('#e_rebate').val(_this.find('.rebate').text().replace(/,/g, ''));
        });

        function vat_calculate_add() {
            let mrp = $('#a_mrp').val();
            let commission = $('#a_commission').val();
            let tr = $('#a_tr').val();
            let purchage_price_tr = mrp - commission
            let purchage_price = purchage_price_tr - (commission * 0.15);
            $('#a_basic_vat').val(Math.round((mrp * 100) / 115));
            $('#a_sale_vat').val(Math.round((mrp * 15) / 115));
            $('#a_tr').val(commission * 0.15);
            $('#a_purchage_price').val(purchage_price);
            $('#a_rebate_basic').val(Math.round((purchage_price * 100) / 115));
            $('#a_rebate').val(Math.round((purchage_price * 15) / 115));
        }

        function vat_calculate_edit() {
            let mrp = $('#e_mrp').val();
            let commission = $('#e_commission').val();
            let tr = $('#e_tr').val();
            let purchage_price_tr = mrp - commission
            let purchage_price = purchage_price_tr - (commission * 0.15);
            $('#e_basic_vat').val(Math.round((mrp * 100) / 115));
            $('#e_sale_vat').val(Math.round((mrp * 15) / 115));
            $('#e_tr').val(commission * 0.15);
            $('#e_purchage_price').val(purchage_price);
            $('#e_rebate_basic').val(Math.round((purchage_price * 100) / 115));
            $('#e_rebate').val(Math.round((purchage_price * 15) / 115));
        }
        $("#add_mrp_form").on("input", function() {
            console.log('input vat calculate called.');
            vat_calculate_add();
        });
        $("#edit_mrp_form").on("input", function() {
            vat_calculate_edit();
        });

        // add new employee ajax request
        $("#add_mrp_form").submit(function(e) {
            e.preventDefault();
            console.log('add_mrp_form');
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
                    }
                    $("#addModal").modal("hide");
                },
            });
        });

        // update employee ajax request
        $("#edit_mrp_form").submit(function(e) {
            console.log('edit_mrp_form');
            e.preventDefault();
            const FD = new FormData(this);
            $("#update_mrp").text('Updating...');
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
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        fetchAllMrp();
                    }
                    $("#updateModal").modal('hide');
                }
            });
        });

        fetchAllMrp();

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
                        url: "{{ route('mrp.delete') }}",
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
                                <th class="align-middle">Code</th>
                                <th class="align-middle">Model</th>
                                <th class="align-middle">VAT Pur</th>
                                <th class="align-middle">MRP</th>
                                <th class="align-middle">VMRP</th>
                                <th class="align-middle">Basic</th>
                                <th class="align-middle">VAT</th>
                                <th class="align-middle">Comm</th>
                                <th class="align-middle">TR</th>
                                <th class="align-middle">Buy</th>
                                <th class="align-middle">Basic</th>
                                <th class="align-middle">Reabate</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        response.forEach(function(data, index) {
                            console.log(data);
                            html +=
                                `<tr>                                
                                <td class="model_code">${data.model_code}</td>
                                <td class="model">${data.model_name}</td>
                                <td class="vat_purchage_mrp text-right">${BDFormat.format(data.vat_purchage_mrp)}</td>
                                <td class="mrp text-right">${BDFormat.format(data.mrp)}</td>
                                <td class="vat_mrp text-right">${BDFormat.format(data.vat_mrp)}</td>
                                <td class="basic_vat">${BDFormat.format(data.basic_vat)}</td>
                                <td class="sale_vat text-right">${BDFormat.format(data.sale_vat)}</td>
                                <td class="commission text-right">${BDFormat.format(data.commission)}</td>
                                <td class="tr text-right">${BDFormat.format(data.tr)}</td>
                                <td class="purchage_price text-right">${BDFormat.format(data.purchage_price)}</td>
                                <td class="rebate_basic text-right">${BDFormat.format(data.rebate_basic)}</td>
                                <td class="rebate text-right">${BDFormat.format(data.rebate)}</td>
                                <td class="text-center">
                                    <a href="#" class="m-r-15 text-muted editIcon" id="${data.model_code}" data-bs-toggle="modal" data-idUpdate="${data.model_code}" data-bs-target="#updateModal">
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
                    console.log(html);
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