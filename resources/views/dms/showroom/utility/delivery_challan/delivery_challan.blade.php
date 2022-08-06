@extends('layouts.app')
@section('title', 'Delivery Challan')
@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection
@push('page_css')
<style>
    @media print {

        .no-print,
        .no-print * {
            display: none !important;
        }
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }

    .img-width {
        width: 33.33%;
    }

    .bill_page {
        height: 1470px;
        width: 1020px;
        border: 1px solid black;
        margin: auto;
        position: relative;
        padding: 10px;
        box-sizing: border-box;
    }


    table {
        border-collapse: collapse;
    }

    table,
    td,
    th {
        border: 1px solid;
    }

    textarea,
    input {
        border: none;
    }

    .span_style {
        background-color: #F4F6F9;
        height: 25px;
        border: 0px;
        border-radius: 0;
        font-weight: 700;
        font-size: 18px;
        border-style: dashed;
    }

    .input_style {
        background-color: #F4F6F9;
        height: 25px;
        border: 0px;
        border-bottom: 1px solid black;
        border-radius: 0;
        font-weight: 700;
        font-size: 18px;
        border-style: dashed;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .span_underline {
        width: 310px;
        border-bottom: 1px solid black;
        border-style: dashed;
    }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12" style="margin:10px 0;">
        <form id="create_challan">
            @csrf
            <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                <div class="card-header no-print">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center" style="height:32px;">
                            <div style="border:1px solid #000; border-radius:5px; padding:3px 5px;">
                                <label style="margin-right:10px;">Challan Area</label>
                                <select style="font-weight: bold; background:#F7F7F7; border-radius:5px;" id="challan_list">

                                </select>
                            </div>
                            <nav aria-label="Page navigation example" style="padding-left:15px;">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item active"><a class="page-link first_jb_record" href="#">First</a></li>
                                    <li class="page-item"><a class="page-link previous_jb_record" href="#">Prev</a></li>
                                    <li class="page-item"><a class="page-link next_jb_record" href="#">Next</a></li>
                                    <li class="page-item"><a class="page-link last_jb_record" href="#">Last</a></li>
                                    <li class="page-item"><a class="page-link new_bill_record bg-success" href="#">New</a></li>
                                    <li class="page-item print"><a class="page-link" href="#">Print</a></li>
                                    <button class="page-item page-link bg-dark" type="submit" id="btn_create_challan">Create Challan</button>
                                </ul>
                            </nav>
                            <div style="border:1px solid #000; border-radius:5px; padding:3px 5px; margin-left:15px;">
                                <label>Challan Date</label>
                                <input type="date" id="challan_date_search" style="margin-left:15px; background:#F7F7F7; width:100px;">
                                <select style="font-weight: bold; background:#F7F7F7; border-radius:5px;" id="challan_list_search">
                                    <option style="font-weight:bold;" value="">Challan List</option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-md-4 d-flex mt-2" style="border:1px solid black; border-radius:5px;">
                                <label for="mc_stock_list" class="col-form-label">Availability</label>
                                <select id="mc_stock_list" class="selectpicker" data-live-search="true" required>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bill_page">
                    <div class="bill_header">
                        <div class="header_image">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-12">
                                    <img src="{{asset('/images/delivery_challan_bp.png')}}" class="img-fluid p-1" style="width:100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top:50px;"></div>
                    <div class="bill_body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3" style="width: 185px;">
                                    <span class="input-group-text span_style">Challan No:</span>
                                    <input readonly type="text" id="delivery_challan_no" class="form-control delivery_challan_no input_style" value="">
                                </div>
                            </div>
                            <div class="col-md-3 offset-md-3" style="padding-right: 11px;">
                                <div class="input-group mb-3">
                                    <span class="input-group-text span_style">Date:</span>
                                    <input type="date" name="sale_date" id="sale_date" class="form-control sale_date input_style" value="">
                                </div>
                            </div>
                            <div class="col-md-3 offset-md-9" style="padding-right: 11px; margin-top:-12px;">
                                <div class="input-group mb-3">
                                    <span class="input-group-text span_style">Mobile</span>
                                    <input type="text" minlength="11" maxlength="11" pattern="[0-9]+" name="mobile" id="mobile" class="form-control mobile input_style" value="">
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Name :</span>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control customer_name input_style" value="">
                                    <input type="hidden" name="id" id="core_id" value="">
                                    <input type="hidden" name="model_code" id="model_code" value="">
                                    <input type="hidden" name="purchage_price" id="purchage_price" value="">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Father's Name :</span>
                                    <input type="text" name="father_name" id="father_name" class="form-control father_name input_style" value="">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Mother's Name :</span>
                                    <input type="text" name="mother_name" id="mother_name" class="form-control mother_name input_style" value="">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">NID No :</span>
                                    <input type="text" name="nid_no" id="nid_no" class="form-control nid_no input_style" value="">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Address :</span>
                                    <input type="text" name="address_one" id="address_one" class="form-control address_one input_style" value="">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <input type="text" name="address_two" id="address_two" class="form-control address_two input_style" value="">
                                </div>
                                <div style="margin-top:50px;"></div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">01. Chassis No</span><span class="span_style">:</span>
                                    <input type="text" minlength="17" maxlength="17" pattern="[A-Z0-9]+" id="full_chassis" class="form-control full_chassis input_style" value="">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">02. Engine No</span><span class="span_style">:</span>
                                    <input type="text" minlength="11" maxlength="11" pattern="[A-Z0-9]+" id="full_engine" class="form-control full_engine input_style" value="">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">03. Make & Model of Vehicle</span><span class="span_style">:</span>
                                    <input type="text" id="model" class="form-control model input_style" value="">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">04. Year Of Manufacture</span><span class="span_style">:</span>
                                    <input type="text" name="year_of_manufacture" id="year_of_manufacture" class="form-control year_of_manufacture input_style" value="">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">05. No. Of Cylinder With CC</span><span class="span_style">:</span>
                                    <input type="text" id="no_of_cylinder_with_cc" class="form-control no_of_cylinder_with_cc input_style" value="">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">06. Seating Capacity</span><span class="span_style">:</span>
                                    <input type="text" id="seating_capacity" class="form-control seating_capacity input_style" value="">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">07. Class Of Vehicle</span><span class="span_style">:</span>
                                    <input type="text" id="class_of_vehicle" class="form-control class_of_vehicle input_style" value="">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">08. Color Of Vehicle</span><span class="span_style">:</span>
                                    <select name="color_code" id="color_code" class="input_style" style="margin:auto; width:683px; padding-left:10px;">

                                    </select>
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">09. Unladen Weight/Laden Weight</span><span class="span_style">:</span>
                                    <input type="text" id="weight" class="form-control weight input_style" value="">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">10. Vehicle MRP</span><span class="span_style">:</span>
                                    <input type="text" name="unit_price_vat" id="unit_price_vat" class="form-control unit_price_vat input_style" value="">
                                    <input type="hidden" name="sale_vat" id="sale_vat" value="">
                                    <input type="hidden" name="basic_price_vat" id="basic_price_vat" value="">
                                </div>
                            </div>
                        </div>
                        <div style="margin-top:30px;"></div>
                        <div class="row d-flex align-items-center" style="margin-top: 20px;">
                            <div class="col-md-12">
                                <img src="{{asset('/images/delivery_challan_bottom.png')}}" class="img-fluid p-1" style="width:100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {

        $(document).on('change', '#unit_price_vat', function() {
            let unit_price_vat = +$(this).val();
            let basic = Math.round((unit_price_vat * 100) / 115);
            let sale_vat = unit_price_vat - basic;

            $('#sale_vat').val(sale_vat);
            $('#basic_price_vat').val(basic);
        });

        $(document).on('blur', "input[type=text]", function() {
            $(this).val(function(_, val) {
                return val.toUpperCase();
            });
        });

        $('.selectpicker').selectpicker();

        // load stock list for sale, select desire model from list start
        function mc_stock_list() {
            $.ajax({
                url: "{{route('delivery_challan.get_stock_mc')}}",
                type: "GET",
                dataType: "json",
                success: function({
                    stock,
                    status
                }) {
                    if (status === 200) {
                        $('#mc_stock_list').empty();
                        $('#mc_stock_list').append('<option style="font-weight:bold; font-size:14px;" value="">MC List</option>');
                        stock.forEach(function(item) {
                            $("#mc_stock_list").append(
                                `<option style="font-weight:bold; font-size:14px;" value="${item.id}">${item.model} CH ${item.five_chassis} EN ${item.five_engine}</option>`
                            );
                        });
                        $(".selectpicker").selectpicker("refresh");
                    }
                }
            });
        }
        mc_stock_list();
        // load stock list for sale, select desire model from list end

        // when select desire model from list start
        $(document).on('change', '#mc_stock_list', function() {
            let core_id = $(this).val();
            $.ajax({
                url: "{{route('delivery_challan.get_stock_mc_details')}}",
                type: "GET",
                dataType: "json",
                data: {
                    id: core_id
                },
                success: function({
                    mc_details,
                    color_details,
                    status,
                    mrp_details
                }) {
                    if (status === 200) {
                        $('#full_chassis').val(mc_details.five_chassis);
                        $('#full_engine').val(mc_details.five_engine);
                        $('#model').val(mc_details.model_make_of_vehicle);
                        $('#year_of_manufacture').val(mc_details.year_of_manufacture);
                        $('#no_of_cylinder_with_cc').val(mc_details.no_of_cylinder_with_cc);
                        $('#seating_capacity').val(mc_details.seating_capacity);
                        $('#class_of_vehicle').val(mc_details.class_of_vehicle);
                        $('#weight').val(`${mc_details.ladan_weight} /${mc_details.unladen_weight}`);
                        $('#core_id').val(mc_details.id);
                        $('#model_code').val(mc_details.model_code);

                        $('#sale_vat').val(mrp_details.sale_vat);
                        $('#unit_price_vat').val(mrp_details.vat_mrp);
                        $('#basic_price_vat').val(mrp_details.basic_vat);

                        $('#color_code').empty();
                        $('#color_code').append('<option style="font-weight:bold; font-size:14px;" value="">Select Color</option>');
                        color_details.forEach(function(item) {
                            $("#color_code").append(
                                `<option style="font-weight:bold; font-size:14px;" value="${item.color_code}">${item.color}</option>`
                            );
                        });
                    }
                }
            });
        });
        // when select desire model from list end

        // auto generate challan no start
        function create_delivery_challan_no() {
            $.ajax({
                url: "{{route('delivery_challan.create_delivery_challan_no')}}",
                type: "GET",
                dataType: "json",
                success: function({
                    challan_no,
                    status
                }) {
                    if (status === 200) {
                        if (challan_no < 9) {
                            $('#delivery_challan_no').val(`000${challan_no}`);
                        } else if (challan_no < 99) {
                            $('#delivery_challan_no').val(`000${challan_no}`);
                        } else if (challan_no < 999) {
                            $('#delivery_challan_no').val(`00${challan_no}`);
                        } else if (challan_no < 9999) {
                            $('#delivery_challan_no').val(`0${challan_no}`);
                        } else {
                            $('#delivery_challan_no').val(`DCH-${challan_no}`);
                        }

                    }
                }
            });
        }
        create_delivery_challan_no();
        // auto generate challan no end

        // when submit create_challan form start
        $(document).on('submit', '#create_challan', function(e) {
            e.preventDefault();
            let delivery_challan_no = +$('#delivery_challan_no').val();

            // get full chassis and engine no
            let full_chassis = $('#full_chassis').val();
            let full_engine = $('#full_engine').val();

            // split full chassis
            let eight_chassis = full_chassis.substring(0, 8);
            let one_chassis = full_chassis.substring(8, 9);
            let three_chassis = full_chassis.substring(9, 12);
            let five_chassis = full_chassis.substring(12, 17);

            // split full engine
            let six_engine = full_engine.substring(0, 6);
            let five_engine = full_engine.substring(6, 11);

            const FD = new FormData(this);
            // append data to form data
            FD.append('eight_chassis', eight_chassis);
            FD.append('one_chassis', one_chassis);
            FD.append('three_chassis', three_chassis);
            FD.append('five_chassis', five_chassis);
            FD.append('six_engine', six_engine);
            FD.append('five_engine', five_engine);
            FD.append('delivery_challan_no', delivery_challan_no);


            $.ajax({
                url: "{{ route('delivery_challan.store_created_challan') }}",
                method: 'post',
                data: FD,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    return;
                    if (response.status === 200) {
                        $('#create_bill').trigger("reset");
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        $('#bill_list').empty();
                        $('#bill_list').append('<option style="font-weight:bold;" value="">Bill List</option>');

                        load_bill_list();
                    } else {
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
        // when submit create_challan form end

    });
</script>
@endsection