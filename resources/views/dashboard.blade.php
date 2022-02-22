@extends('layouts.app')
@section('title', 'Bajaj Point - 3S Dealer Of UttaraMotors Ltd')
@section('content')
<div class="container-fluid" style="margin-top:15px; padding:0;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                <div class="card-header bg-dark">
                    <h3 class="text-center rounded">
                        Sales Update, Hform, Stamp, Gate Pass, Single
                        Print
                    </h3>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <form class="form-inline" action="#" method="post" id="search_form">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="five_chassis">Chassis No</label>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" name="five_chassis" class="form-control" id="five_chassis" placeholder="Last Five Digit Chassis">
                        </div>
                        <div class="form-group mb-2">
                            <label for="five_engine">Engine No</label>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" name="five_engine" class="form-control" id="five_engine" placeholder="Last Five Digit Engine">
                        </div>
                        <button type="submit" class="btn btn-dark mb-2">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:-25px;">
            <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey" id="show_search_result">

            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner d-flex justify-content-center">
                    <a style="font-size:20px;" href="{{ route('utility.download') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-download" style="color:black; margin-right:5px;"></i>Download Backup</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Info-->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header text-write" style="padding:5px 21px;">
                <h4 class="modal-title" id="title">Customer Info</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <div class="container-fluid">
                <div class="row" style="margin-bottom:15px;">
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="vendor" class="col-sm-3 col-form-label form-control-sm">Vendor Name</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="vendor" class="form-control form-control-sm" id="vendor">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="factory_challan_no" class="col-sm-3 col-form-label form-control-sm">Challan No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="factory_challan_no" class="form-control form-control-sm" id="factory_challan_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="purchage_date" class="col-sm-3 col-form-label form-control-sm">Purchage Date</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="purchage_date" class="form-control form-control-sm" id="purchage_date">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="model" class="col-sm-3 col-form-label form-control-sm">Model</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="model" class="form-control form-control-sm" id="model">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="ckd_process" class="col-sm-3 col-form-label form-control-sm">CKD</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="ckd_process" class="form-control form-control-sm" id="ckd_process">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="approval_no" class="col-sm-3 col-form-label form-control-sm">Approval No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="approval_no" class="form-control form-control-sm" id="approval_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="invoice_no" class="col-sm-3 col-form-label form-control-sm">Invoice No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="invoice_no" class="form-control form-control-sm" id="invoice_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="sale_price" class="col-sm-3 col-form-label form-control-sm">Sale Price</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="sale_price" class="form-control form-control-sm" id="sale_price">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="uml_mushak_no" class="col-sm-3 col-form-label form-control-sm">UML Mushak No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="uml_mushak_no" class="form-control form-control-sm" id="uml_mushak_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="whos_vat" class="col-sm-3 col-form-label form-control-sm">Whos VAT</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="whos_vat" class="form-control form-control-sm" id="whos_vat">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="sale_mushak_no" class="col-sm-3 col-form-label form-control-sm">Sale Mushak No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="sale_mushak_no" class="form-control form-control-sm" id="sale_mushak_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="gate_pass" class="col-sm-3 col-form-label form-control-sm">Gate Pass</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="gate_pass" class="form-control form-control-sm" id="gate_pass">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="chassis_no" class="col-sm-3 col-form-label form-control-sm">Chassis No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="chassis_no" class="form-control form-control-sm" id="chassis_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="engine_no" class="col-sm-3 col-form-label form-control-sm">Engine No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="engine_no" class="form-control form-control-sm" id="engine_no">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="note" class="col-sm-3 col-form-label form-control-sm">Note</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="note" class="form-control form-control-sm" id="note">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="size_of_tyre" class="col-sm-3 col-form-label form-control-sm">Tyre Size</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="size_of_tyre" class="form-control form-control-sm" id="size_of_tyre">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="color" class="col-sm-3 col-form-label form-control-sm">Color</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="color" class="form-control form-control-sm" id="color">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="original_sale_date" class="col-sm-3 col-form-label form-control-sm">Sale Date</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="original_sale_date" class="form-control form-control-sm" id="original_sale_date">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="dealer" class="col-sm-3 col-form-label form-control-sm">Dealer</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="dealer" class="form-control form-control-sm" id="dealer">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="rg_number" class="col-sm-3 col-form-label form-control-sm">RG Number</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="rg_number" class="form-control form-control-sm" id="rg_number">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="customer_name" class="col-sm-3 col-form-label form-control-sm">Customer Name</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="customer_name" class="form-control form-control-sm" id="customer_name">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="father_name" class="col-sm-3 col-form-label form-control-sm">Father Name</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="father_name" class="form-control form-control-sm" id="father_name">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="mother_name" class="col-sm-3 col-form-label form-control-sm">Mother Name</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="mother_name" class="form-control form-control-sm" id="mother_name">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="mobile" class="col-sm-3 col-form-label form-control-sm">Mobile</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="mobile" class="form-control form-control-sm" id="mobile">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="vat_process" class="col-sm-3 col-form-label form-control-sm">VAT Process</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="vat_process" class="form-control form-control-sm" id="vat_process">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="address" class="col-sm-3 col-form-label form-control-sm">Full Address</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="address" class="form-control form-control-sm" id="address">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="stage" class="col-sm-3 col-form-label form-control-sm">Stage</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="stage" class="form-control form-control-sm" id="stage">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="file_status" class="col-sm-3 col-form-label form-control-sm">File Status</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="file_status" class="form-control form-control-sm" id="file_status">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Info End-->
@endsection

@section('datatable')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('script')
<script>
    $("#search_form").submit(function(e) {
        e.preventDefault();
        const FD = new FormData(this);
        $.ajax({
            url: "{{ route('print.print_list_dashboard') }}",
            method: 'post',
            data: FD,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.length > 0) {
                    var html = `
                <div class="card-header bg-dark">
                    <h3 class="text-center rounded">
                        Search Result
                    </h3>
                </div>
                <div style="padding:0px 5px;">                
                    <table id="search_result" class="table table-hover table-sm table-bordered">
                        <thead class="text-center">
                            <tr class="text-sm">
                                <th>Sl</th>
                                <th>Model</th>
                                <th>Sale Date</th>
                                <th>Chassis No</th>
                                <th>Engine No</th>
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                <th>Action (Print)</th>
                            </tr>
                        </thead>
                        <tbody>`;
                    response.forEach(function(data, index) {
                        var sl = index + 1;
                        var chassis = (data.eight_chassis ? data.eight_chassis : '') + (data.one_chassis ? data.one_chassis : '') + (data.three_chassis ? data.three_chassis : '') + (data.five_chassis ? data.five_chassis : '');
                        var engine = (data.six_engine ? data.six_engine : '') + (data.five_engine ? data.five_engine : '');
                        html +=
                            `<tr>                                
                                <td>${sl}</td>
                                <td>${data.model ? data.model :''}</td>
                                <td>${data.original_sale_date ? data.original_sale_date : ''}</td>
                                <td>${chassis}</td>
                                <td>${engine}</td>
                                <td>${data.customer_name ? data.customer_name.length > 15 ? data.customer_name.substring(0,15) + '.' : data.customer_name : ''}</td>
                                <td>${data.mobile ? data.mobile : ''}</td>
                                <td>
                                    <div class="d-flex justify-content-center padd text-decoration btn-group">
                                        <a href="/hform/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            Hform
                                        </a>
                                        <a href="#" class="btn-sm bg-dark">
                                            Stamp
                                        </a>
                                        <a href="/gate_pass/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            Gate Pass
                                        </a>
                                        <a href="/single_file_print/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            File Print
                                        </a>
                                        <a href="/sales_update/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            Edit
                                        </a>
                                        <a href="#" target="_blank" class="btn-sm bg-dark">
                                            Bank Slip
                                        </a>
                                        <a href="#" class="btn-sm bg-dark editIcon" id="${data.id}" data-bs-toggle="modal" data-idUpdate="${data.id}" data-bs-target="#showModal">
                                            Info
                                        </a>                                        
                                    </div>
                                </td>
                            </tr>`;
                    });
                    html += `</tbody></table></div>`;
                } else {
                    html = `
                    <div class="card-header bg-dark">
                    <h3 class="text-center rounded">
                        Search Result
                    </h3>
                </div>
                <div style="padding:0px 5px;">
                    <h3 class="text-center">No Data Found</h3>
                    </div>
                    `;
                }
                console.log(html);
                $("#show_search_result").html(html);
                $("#search_result").DataTable({
                    bPaginate: false,
                    pageLength: 10,
                    responsive: true,
                    lengthChange: true,
                    searching: false,
                });
            }
        });
    });
    $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        var id = $(this).attr("id");
        $.ajax({
            url: "{{ route('customer.customer_info') }}",
            method: 'get',
            data: {
                id: id
            },
            dataType: 'json',
            success: function({
                color_data,
                core_data,
                model_data,
                purchage_data
            }) {
                $('#vendor').val(purchage_data.vendor);
                $('#factory_challan_no').val(purchage_data.factory_challan_no);
                $('#purchage_date').val(new Intl.DateTimeFormat('en-IN').format(new Date(purchage_data.purchage_date)).split("/").join("-"));
                $('#model').val(model_data.model);
                $('#ckd_process').val(core_data.ckd_process);
                $('#approval_no').val(core_data.approval_no);
                $('#invoice_no').val(core_data.invoice_no);
                $('#sale_price').val(core_data.sale_price);
                $('#uml_mushak_no').val(core_data.uml_mushak_no);
                $('#whos_vat').val(core_data.whos_vat);
                $('#sale_mushak_no').val(core_data.sale_mushak_no);
                $('#gate_pass').val(core_data.gate_pass);
                $('#chassis_no').val((core_data.eight_chassis || '') + (core_data.one_chassis || '') + (core_data.three_chassis || '') + (core_data.five_chassis));
                $('#engine_no').val((core_data.six_engine || '') + (core_data.five_engine || ''));
                $('#note').val(core_data.note);
                $('#size_of_tyre').val(model_data.size_of_tyre);
                $('#color').val(color_data.color);
                $('#original_sale_date').val(new Intl.DateTimeFormat('en-IN').format(new Date(core_data.original_sale_date)).split("/").join("-"));
                $('#dealer').val(core_data.dealer);
                $('#rg_number').val(core_data.rg_number);
                $('#customer_name').val(core_data.customer_name);
                $('#father_name').val(core_data.father_name);
                $('#mother_name').val(core_data.mother_name);
                $('#mobile').val(core_data.mobile);
                $('#vat_process').val(core_data.vat_process);
                $('#address').val((core_data.address_one || '') + (core_data.address_two || ''));
                $('#stage').val(core_data.stage);
                $('#file_status').val(core_data.file_status);
            }
        });
    });
</script>
@endsection