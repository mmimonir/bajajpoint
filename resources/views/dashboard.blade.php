@extends('layouts.app')
@section('title', 'Bajaj Point - 3S Dealer Of UttaraMotors Ltd')
@section('content')
<div class="container-fluid" style="margin-top:15px; padding:0;">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success collapsed-card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Search Together</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                            <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" style="display: block; padding:0px;">
                    <div class="card mt-1" style="box-shadow: 0 0 5px 0 lightgrey">
                        <div class="card-header bg-dark d-flex justify-content-center">
                            <h3 class="card-title">
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
                    <div class="col-md-12" style="margin-top:-15px; padding:0px;">
                        <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey; margin-bottom:0px;" id="show_search_result">

                        </div>
                    </div>
                </div>
                <div class="overlay" id="search_overlay">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Reports</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                            <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                                <div class="card-header bg-dark d-flex justify-content-center">
                                    <h3 class="card-title">CKD Pending</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <a href="{{ route('ckd.ckd_pending') }}" target="_blank">
                                                <button type="submit" class="btn btn-dark btn-block">
                                                    View List
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                                <div class="card-header bg-dark d-flex justify-content-center">
                                    <h3 class="card-title">TR Status</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <a href="{{route('tr.tr_status')}}" target="_blank">
                                                <button type="submit" class="btn btn-dark btn-block">
                                                    View List
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                                <div class="card-header bg-dark d-flex justify-content-center">
                                    <h3 class="card-title">Quotation</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <a href="{{route('quotation.create')}}" target="_blank">
                                                <button type="submit" class="btn btn-dark btn-block">
                                                    Create
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                                <div class="card-header bg-dark d-flex justify-content-center">
                                    <h3 class="card-title">Quotation List</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <a href="{{route('quotation.list')}}" target="_blank">
                                                <button type="submit" class="btn btn-dark btn-block">
                                                    List
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($data as $key => $dt)
    <div class="row">
        <div class="col-md-6">
            <div class="card card-success collapsed-card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">{{$key =='bp' ? "Bajaj Point" : '' }} {{$key =='bh' ? "Bajaj Heaven" : '' }} {{$key =='bb' ? "Bajaj Bloom" : '' }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                            <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h4>Total Lifting</h4>
                                    <h5>{{$dt['total_lifting']}}</h5>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h4>Lifting: Last Month</h4>
                                    <h5>{{$dt['lifting_previous_month']}}</h5>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h4>Lifting: This Month</h4>
                                    <h5>{{$dt['lifting_this_month']}}</h5>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h4>TR Pending</h4>
                                    <div class="d-flex">
                                        <h5 style="margin-right: 5px;">Quantity: {{$dt['tr_pending_data']['qty']}}</h5>
                                        <h5>Tk: <b class="amount">{{$dt['tr_pending_data']['amount']}}</b></h5>
                                    </div>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@include('dms.modals.modal_info')
@include('dms.modals.modal_sales_update')

@endsection

@section('datatable')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $("#search_overlay").css("visibility", "hidden");
        $("#sale_update_form").submit(function(e) {
            e.preventDefault();
            const FD = new FormData(this);
            $.ajax({
                url: "{{ route('sale.sales_update_store') }}",
                method: 'post',
                data: FD,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        $('#salesUpdateModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                    } else {
                        $('#salesUpdateModal').modal('hide');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                            footer: '<a href="">Why do I have this issue?</a>'
                        })
                    }
                }
            });
        });

        $("#sale_price2").change(function() {
            var sale_price = +$('#sale_price2').val();
            var purchage_price = +$('#purchage_price2').val();
            var sale_profit = sale_price - purchage_price;
            $('#sale_profit2').val(sale_profit);
        });

        function getCurrentFinancialYear(sale_date) {
            var financial_year = "";
            var today = new Date(sale_date);
            if ((today.getMonth() + 1) <= 3) {
                financial_year = (today.getFullYear() - 1) + "-" + today.getFullYear()
            } else {
                financial_year = today.getFullYear() + "-" + (today.getFullYear() + 1)
            }
            return financial_year;
        }

        function print_ref(print_code, year) {
            switch (print_code) {
                case 2000:
                    $('#print_ref2').val(`BAJAJ POINT/DHAKA/${year}`);
                    break;
                case 2011:
                    $('#print_ref2').val(`BAJAJ HEAVEN/DHAKA/${year}`);
                    break;
                case 2030:
                    $('#print_ref2').val(`BAJAJ BLOOM/DHAKA/${year}`);
                    break;
                default:
                    $('#print_ref2').val('');
                    break;
            }
        }

        $("#print_code2").change(function() {
            var sale_date = $('#original_sale_date2').val();
            var year = getCurrentFinancialYear(sale_date)

            var print_code = +$('#print_code2').val();
            print_ref(print_code, year);
        });
        $("#original_sale_date2").on("change", function() {
            var sale_date = $('#original_sale_date2').val();
            $('#vat_sale_date2').val(sale_date);
            $('#sale_date2').val(sale_date);
            $('#print_date2').val(sale_date);
            $('#in_stock').val('no');

            var year = getCurrentFinancialYear(sale_date)
            var print_code = +$('#print_code2').val();
            print_ref(print_code, year);

            let csrf = '{{ csrf_token() }}';
            var vat_code = +$('#vat_code2').val();
            var model_code = $('#model_code2').val();

            const date = new Date($('#vat_sale_date2').val());
            const month = date.toLocaleString('default', {
                month: 'short'
            }).toUpperCase();

            $.ajax({
                url: "{{ route('utility.assessment_year') }}",
                method: 'post',
                data: {
                    model_code: model_code,
                    _token: csrf
                },
                success: function({
                    assessment,
                    vat_mrp
                }) {
                    if (vat_code == 2000 || vat_code == 2011 || vat_code == 2030) {
                        const vat_sale_date = $('#vat_sale_date2').val();
                        const vat_month_year = new Date(vat_sale_date).getFullYear();
                        const year = getCurrentFinancialYear(vat_sale_date);

                        $('#vat_year_sale2').val(year.replace('-', ''));
                        $('#vat_month_sale2').val(month + vat_month_year);
                        $('#unit_price_vat2').val(vat_mrp[0].vat_mrp);

                        const unit_price_vat = +vat_mrp[0].vat_mrp;
                        const sale_vat = Math.round(unit_price_vat * 15 / 115);
                        const basic_price_vat = Math.round(unit_price_vat - sale_vat);

                        $('#sale_vat2').val(sale_vat);
                        $('#basic_price_vat2').val(basic_price_vat);
                    } else {
                        $('#unit_price_vat2').val(vat_mrp[0].vat_mrp);
                        const unit_price_vat = +vat_mrp[0].vat_mrp;
                        const sale_vat = Math.round(unit_price_vat * 15 / 115);
                        const basic_price_vat = Math.round(unit_price_vat - sale_vat);

                        $('#sale_vat2').val(sale_vat);
                        $('#basic_price_vat2').val(basic_price_vat);
                    }
                },
            });
        });
        $("#search_form").submit(function(e) {
            $("#search_overlay").css("visibility", "visible");
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
                    <h3 class="card-title">
                        Search Result
                    </h3>
                </div>
                <div>                
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
                            var saleDate = new Intl.DateTimeFormat('en-IN').format(new Date(data.original_sale_date)).split("/").join("-")
                            var sl = index + 1;
                            var chassis = (data.eight_chassis || '') + (data.one_chassis || '') + (data.three_chassis || '') + (data.five_chassis || '');
                            var engine = (data.six_engine || '') + (data.five_engine || '');
                            html +=
                                `<tr>                                
                                <td>${sl}</td>
                                <td>${data.model ? data.model :''}</td>
                                <td>${saleDate ? saleDate : ''}</td>
                                <td>${chassis}</td>
                                <td>${engine}</td>
                                <td>${data.customer_name ? data.customer_name.length > 15 ? data.customer_name.substring(0,15) + '.' : data.customer_name : ''}</td>
                                <td>${data.mobile ? data.mobile : ''}</td>
                                <td>
                                    <div class="d-flex justify-content-center padd text-decoration btn-group">
                                        <a href="showroom/hform/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            Hform
                                        </a>
                                        <a href="showroom/brta_stamp/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            Stamp
                                        </a>
                                        <a href="showroom/gate_pass/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            Gate Pass
                                        </a>
                                        <a href="showroom/single_file_print/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            File Print
                                        </a>
                                        <a href="#" class="btn-sm bg-dark salesUpdate" id="${data.id}" data-bs-toggle="modal" data-idUpdate="${data.id}" data-bs-target="#salesUpdateModal">
                                            Edit
                                        </a>
                                        <a href="showroom/brta_assessment_form/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            Bank Slip
                                        </a>
                                        <a href="#" class="btn-sm bg-dark cusInfo" id="${data.id}" data-bs-toggle="modal" data-idUpdate="${data.id}" data-bs-target="#showModal">
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
                    $("#show_search_result").html(html);
                    $("#search_overlay").css("visibility", "hidden");
                    $("#search_result").DataTable({
                        bPaginate: false,
                        pageLength: 10,
                        responsive: true,
                        lengthChange: true,
                        searching: false,
                        "bInfo": false,
                    });
                }
            });
        });
        $(document).on('click', '.cusInfo', function(e) {
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
                    $('#vendor').val(purchage_data ? purchage_data.vendor : core_data.vendor_name);
                    $('#factory_challan_no').val(purchage_data ? purchage_data.factory_challan_no : core_data.challan_no);
                    $('#purchage_date').val(purchage_data ? new Intl.DateTimeFormat('en-IN').format(new Date(purchage_data.purchage_date)).split("/").join("-") : new Intl.DateTimeFormat('en-IN').format(new Date(core_data.purchage_date)).split("/").join("-"));
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
                    $('#color').val(color_data ? color_data.color : core_data.color);
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
        $(document).on('click', '.salesUpdate', function(e) {
            e.preventDefault();
            var id = $(this).attr("id");
            $.ajax({
                url: "{{ route('sale.sales_update_modal') }}",
                method: 'get',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function({
                    color_data,
                    core_data,
                    pd_data,
                    print_ref,
                    purchage_data,
                    vehicle_data
                }) {
                    $('#id2').val(core_data.id);
                    $('#model_code2').val(core_data.model_code);
                    $('#model_name2').val(vehicle_data.model);
                    $('#eight_chassis2').val(core_data.eight_chassis);
                    $('#one_chassis2').val(core_data.one_chassis);
                    $('#three_chassis2').val(core_data.three_chassis);
                    $('#five_chassis2').val(core_data.five_chassis);
                    $('#six_engine2').val(core_data.six_engine);
                    $('#five_engine2').val(core_data.five_engine);
                    $('#customer_name2').val(core_data.customer_name);
                    $('#relation2').val(core_data.relation);
                    $('#father_name2').val(core_data.father_name);
                    $('#mother_name2').val(core_data.mother_name);
                    $('#address_one2').val(core_data.address_one);
                    $('#address_two2').val(core_data.address_two);
                    $('#mobile2').val(core_data.mobile);
                    $('#email2').val(core_data.email);
                    $('#dob2').val(core_data.dob);
                    $('#vat_code2').val(core_data.vat_code);
                    $('#print_code2').val(core_data.print_code);
                    $('#report_code2').val(core_data.report_code);
                    $('#nid_no2').val(core_data.nid_no);
                    $('#ckd_process2').val(core_data.ckd_process);
                    $('#approval_no2').val(core_data.approval_no);
                    $('#invoice_no2').val(core_data.invoice_no);
                    $('#vendor2').val(purchage_data ? purchage_data.vendor : core_data.vendor_name);
                    color_data.forEach(function(item) {
                        $(".color_code").append(`<option ${item.color_code === core_data.color_code ? 'selected' : ''} value="${item.color_code}">${item.color}</option>`);
                    });
                    $('#original_sale_date2').val(core_data.original_sale_date);
                    $('#vat_sale_date2').val(core_data.vat_sale_date);
                    $('#sale_date2').val(core_data.sale_date);
                    $('#print_date2').val(core_data.print_date);
                    $('#purchage_price2').val(core_data.purchage_price);
                    $('#stage2').val(core_data.stage);
                    $('#basic_price_vat2').val(core_data.basic_price_vat);
                    $('#tr_month_code2').val(core_data.tr_month_code);
                    $('#vat_month_sale2').val(core_data.vat_month_sale);
                    $('#vat_process2').val(core_data.vat_process);
                    $('#rg_number2').val(core_data.rg_number);
                    $('#mushak_date2').val(core_data.mushak_date);
                    $('#print_ref2').val(core_data.print_ref);
                    $('#evl_invoice_no2').val(core_data.evl_invoice_no);
                    $('#price_declare_id2').val((pd_data ? pd_data.id : '') + ', Date ' + (pd_data ? pd_data.submit_date : ''));
                    $('#unit_price_vat2').val(core_data.unit_price_vat);
                    $('#sale_vat2').val(core_data.sale_vat);
                    $('#vat_year_sale2').val(core_data.vat_year_sale);
                    $('#sale_price2').val(core_data.sale_price);
                    $('#dealer2').val(core_data.dealer);
                    $('#purchage_date2').val(purchage_data ? purchage_data.purchage_date : core_data.purchage_date);
                    $('#sale_mushak_no2').val(core_data.sale_mushak_no);
                    $('#uml_mushak_no2').val(core_data.uml_mushak_no);
                    $('#factory_challan_no2').val(purchage_data ? purchage_data.factory_challan_no : core_data.challan_no);
                    $('#whos_vat2').val(core_data.whos_vat);
                    $('#sale_profit2').val(core_data.sale_profit);
                    $('#note2').val(core_data.note);
                    $('#file_status2').val(core_data.file_status);
                    $('#updated_at2').val(core_data.updated_at);
                    $('#vat_mrp2').val(pd_data ? pd_data.vat_mrp : '');
                    $('#fake_sale_date2').val(core_data.fake_sale_date);
                    $('#in_stock').val(core_data.in_stock);
                    $('#tr_number2').val(core_data.tr_number);
                    $('#tr_dep_date2').val(core_data.tr_dep_date);
                    $('#year_of_manufacture2').val(core_data.year_of_manufacture);
                }
            });
        });
    });
    // $('.amount').text(new Intl.NumberFormat('en-IN').format(+$('.amount').text()))
</script>
@endsection