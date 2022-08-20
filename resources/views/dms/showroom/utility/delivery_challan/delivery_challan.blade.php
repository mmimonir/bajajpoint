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
        height: 1410px;
        width: 1020px;
        /* border: 1px solid black; */
        margin: auto;
        position: relative;
        padding: 10px;
        box-sizing: border-box;
        box-shadow: 0 0 25px 0 lightgrey;
        margin: 15px auto;
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
        /* background-color: #F4F6F9; */
        background-color: white;
        height: 25px;
        border: 0px;
        border-radius: 0;
        font-weight: 700;
        font-size: 18px;
        border-style: dashed;
    }

    .input_style {
        /* background-color: #F4F6F9; */
        background-color: white;
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
                            <nav aria-label="Page navigation example" style="padding-left:15px;">
                                <ul class="pagination justify-content-center" id="top_menu">
                                    <li class="page-item"><a class="page-link new_challan_record bg-success" href="#">New</a></li>
                                    <li class="page-item"><a class="page-link disabled" id="btn_edit" href="#">Edit</a></li>
                                    <li class="page-item print"><a class="page-link" href="#">Print</a></li>
                                    <li class="page-item mc_return"><a class="page-link disabled" id="mc_return" href="#">Delivery Return</a></li>
                                    <button class="page-item page-link bg-dark" type="submit" id="btn_create_challan">Create Challan</button>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card-header no-print" style="padding:0; margin-top:-4px; height:50px;">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center" style="align-items:baseline; margin-left:15px;">
                            <div class="col-md-4 d-flex mt-2" style="border:1px solid black; border-radius:5px; margin-left:15px;">
                                <label for="mc_stock_list" class="col-form-label">Availability</label>
                                <select id="mc_stock_list" class="selectpicker" data-live-search="true">

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header no-print">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center" style="height:22px; width:950px; margin:auto;">
                            <div class="d-flex justify-content-center" style="align-items:baseline; margin-left:15px; width:475px;">
                                <label style="margin-right:10px;">Challan Area</label>
                                <select style="font-weight: bold; background:#F7F7F7; border-radius:5px; width:238px;" id="challan_list">

                                </select>
                            </div>
                            <div class="d-flex justify-content-center" style="align-items:baseline; margin-left:15px; width:475px;">
                                <label>Challan Date</label>
                                <input type="date" id="challan_date_search" style="margin-left:5px; margin-right:5px; background:#F7F7F7; width:100px;">
                                <select style="font-weight: bold; background:#F7F7F7; border-radius:5px; width:238px;" id="challan_list_search">
                                    <option style="font-weight:bold;">Challan List</option>
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
                                    <input style="background-color:white;" readonly type="text" id="delivery_challan_no" class="form-control delivery_challan_no input_style">
                                </div>
                            </div>
                            <div class="col-md-3 offset-md-3" style="padding-right: 11px;">
                                <div class="input-group mb-3">
                                    <span class="input-group-text span_style">Date:</span>
                                    <input type="date" name="sale_date" id="sale_date" class="form-control sale_date input_style">
                                </div>
                            </div>
                            <div class="col-md-3 offset-md-9" style="padding-right: 11px; margin-top:-12px;">
                                <div class="input-group mb-3">
                                    <span class="input-group-text span_style">Mobile</span>
                                    <input type="text" minlength="11" maxlength="11" pattern="[0-9]+" name="mobile" id="mobile" class="form-control mobile input_style">
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Name :</span>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control customer_name input_style">
                                    <input type="hidden" name="id" id="core_id">
                                    <input type="hidden" name="model_code" id="model_code">
                                    <input type="hidden" id="receipt_id">
                                    <input type="hidden" id="receipt_no">
                                    <input type="hidden" name="receipt_status" id="receipt_status" value="no">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Father's Name :</span>
                                    <input type="text" name="father_name" id="father_name" class="form-control father_name input_style">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Mother's Name :</span>
                                    <input type="text" name="mother_name" id="mother_name" class="form-control mother_name input_style">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">NID No :</span>
                                    <input type="text" name="nid_no" id="nid_no" class="form-control nid_no input_style">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Address :</span>
                                    <input type="text" name="address_one" id="address_one" class="form-control address_one input_style">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <input type="text" name="address_two" id="address_two" class="form-control address_two input_style">
                                </div>
                                <div style="margin-top:50px;"></div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">01. Chassis No</span><span class="span_style">:</span>
                                    <input type="text" name="full_chassis" minlength="17" maxlength="17" pattern="[A-Z0-9]+" id="full_chassis" class="form-control full_chassis input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">02. Engine No</span><span class="span_style">:</span>
                                    <input type="text" name="full_engine" minlength="11" maxlength="11" pattern="[A-Z0-9]+" id="full_engine" class="form-control full_engine input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">03. Make & Model of Vehicle</span><span class="span_style">:</span>
                                    <input type="text" id="model" class="form-control model input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">04. Year Of Manufacture</span><span class="span_style">:</span>
                                    <input type="text" name="year_of_manufacture" id="year_of_manufacture" class="form-control year_of_manufacture input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">05. No. Of Cylinder With CC</span><span class="span_style">:</span>
                                    <input type="text" id="no_of_cylinder_with_cc" class="form-control no_of_cylinder_with_cc input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">06. Seating Capacity</span><span class="span_style">:</span>
                                    <input type="text" id="seating_capacity" class="form-control seating_capacity input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">07. Class Of Vehicle</span><span class="span_style">:</span>
                                    <input type="text" id="class_of_vehicle" class="form-control class_of_vehicle input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">08. Color Of Vehicle</span><span class="span_style">:</span>
                                    <select name="color_code" id="color_code" class="input_style" style="margin:auto; width:683px; padding-left:10px;">

                                    </select>
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">09. Unladen Weight/Laden Weight</span><span class="span_style">:</span>
                                    <input type="text" id="weight" class="form-control weight input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">10. Vehicle MRP</span><span class="span_style">:</span>
                                    <input type="text" id="unit_price_vat" class="unit_price_vat input_style" style="padding-left:12px;">

                                    <span class=" input-group-text span_style span_underline" style="width:169px; padding:0; margin-left:9px;">11. Sale Price</span><span class="span_style">:</span>
                                    <input type="text" id="sale_price" class="sale_price input_style" style="padding-left:12px;">

                                    <input type="hidden" name="sale_vat" id="sale_vat">
                                    <input type="hidden" name="basic_price_vat" id="basic_price_vat">
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
        $('#full_chassis').change(function() {
            let value = $(this).val();
            if (value.length > 5) {
                $("#sale_price").prop('required', true);
            } else {
                $("#sale_price").prop('required', false);
            }
        });

        $('#unit_price_vat, #sale_price').change(function() {
            let value = +$(this).val();
            $(this).val(`${value.toLocaleString('en-IN')}/-`);
        });

        $(document).on('click', '#mc_return', function(e) {
            let id = $('#core_id').val();
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Edit it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('delivery_challan.mc_return')}}",
                        type: "GET",
                        data: {
                            id
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                new_challan_record();
                            }
                        }
                    });
                }
            })
        });

        $(document).on('click', '#btn_edit', function(e) {
            let model_code = $('#model_code').val();
            let core_id = $('#core_id').val();
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Edit it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('delivery_challan.color_list')}}",
                        type: "GET",
                        data: {
                            model_code,
                            core_id
                        },
                        success: function({
                            color_list,
                            color_code
                        }) {
                            if (color_list) {
                                $('#color_code').empty();
                                $('#color_code').append(`<option >Select Color</option>`);
                                color_list.forEach(function(item) {
                                    $('#color_code').append(`<option ${color_code == item.color_code ? 'selected': ''} value="${item.color_code}">${item.color}</option>`);
                                });
                            }
                        }
                    });
                    $("#create_challan :input").prop("disabled", false);
                    $('#btn_create_challan').attr('disabled', false);
                    $('#color_code').attr('disabled', false);
                }
            })
        })

        $(document).on('change', '#unit_price_vat', function() {
            let unit_price_vat = +$(this).val().replace("/-", "").replace(/,/g, "");
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
                        $('#mc_stock_list').append('<option style="font-weight:bold; font-size:14px;" >MC List</option>');
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
                        $('#customer_name').val(mc_details.dealer);
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
                        $('#receipt_id').val(mc_details.receipt_id);
                        $('#receipt_status').val('yes');

                        $('#sale_vat').val(Math.round(mrp_details.sale_vat));
                        $('#unit_price_vat').val(`${mrp_details.vat_mrp.toLocaleString('en-IN')}/-`);
                        $('#basic_price_vat').val(Math.round(mrp_details.basic_vat));

                        $('#color_code').empty();
                        $('#color_code').append('<option style="font-weight:bold; font-size:14px;" >Select Color</option>');
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
                            $('#delivery_challan_no').val(`00${challan_no}`);
                        } else if (challan_no < 999) {
                            $('#delivery_challan_no').val(`0${challan_no}`);
                        } else if (challan_no < 9999) {
                            $('#delivery_challan_no').val(challan_no);
                        } else {
                            $('#delivery_challan_no').val('');
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
            let receipt_id = +$('#receipt_id').val() || '';
            let receipt_no = +$('#receipt_no').val() || '';
            let unit_price_vat = +$('#unit_price_vat').val().trim().replace("/-", "").replace(/,/g, "");
            let sale_price = +$('#sale_price').val().trim().replace("/-", "").replace(/,/g, "") || '';


            // get full chassis and engine no
            let full_chassis = $('#full_chassis').val();
            let full_engine = $('#full_engine').val();


            let eight_chassis = '';
            let one_chassis = '';
            let three_chassis = '';
            let five_chassis = '';
            let six_engine = '';
            let five_engine = '';
            // split full chassis

            var FD = new FormData(this);

            if (full_chassis.length == 5 && full_engine.length == 5) {
                five_chassis = full_chassis;
                five_engine = full_engine;
                FD.append('five_chassis', five_chassis);
                FD.append('five_engine', five_engine);
            } else if (full_chassis.length > 5 && full_engine.length > 5) {
                eight_chassis = full_chassis.substring(0, 8);
                three_chassis = full_chassis.substring(9, 12);
                one_chassis = full_chassis.substring(8, 9);
                five_chassis = full_chassis.substring(12, 17);
                six_engine = full_engine.substring(0, 6);
                five_engine = full_engine.substring(6, 11);

                FD.append('eight_chassis', eight_chassis);
                FD.append('one_chassis', one_chassis);
                FD.append('three_chassis', three_chassis);
                FD.append('five_chassis', five_chassis);
                FD.append('six_engine', six_engine);
                FD.append('five_engine', five_engine);
                FD.append('receipt_id', receipt_id);
                FD.append('receipt_no', receipt_no);
            }
            FD.append('delivery_challan_no', delivery_challan_no);
            FD.append('unit_price_vat', unit_price_vat);
            FD.append('sale_price', sale_price);

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
                    // return;
                    if (response.status === 200) {
                        if (response.receipt_id) {
                            let receipt_id = response.receipt_id;
                            let receipt_no = response.receipt_no;
                            $('#receipt_id').val(receipt_id);
                            $('#receipt_no').val(receipt_no);
                            const url = "{{ route('receipt.money_receipt') }}?receipt_id=" + receipt_id;
                            $('#top_menu').find('.print_receipt').remove();
                            $('#top_menu').append(`<a target="_blank" href="${url}" class="print_receipt page-item page-link bg-secondary disable" id="print_receipt">Print Receipt</a>`)
                        }
                        // $('#create_challan').trigger("reset");
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        $('#challan_list').empty();
                        $('#challan_list').append('<option style="font-weight:bold;" >Challan List</option>');

                        load_challan_list();
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

        // Load job card list on same day start
        function load_challan_list() {
            $.ajax({
                url: "{{ route('delivery_challan.load_challan_list') }}",
                method: 'get',
                dataType: 'json',
                success: function({
                    challan_list
                }) {
                    if (challan_list) {
                        $('#challan_list').empty();
                        $('#challan_list').append('<option style="font-weight:bold;" >Challan List</option>');
                        challan_list.forEach(function(item) {
                            $("#challan_list").append(
                                `<option style="font-weight:bold;" value="${item.id}">Chl- ${item.delivery_challan_no + ' ' + item.customer_name}</option>`
                            );
                        });
                    }
                }
            });
        }
        load_challan_list();

        function new_challan_record() {
            $('#create_challan').trigger('reset');
            $('#btn_create_challan').text('Create Challan');
            $("#create_challan :input").prop("disabled", false);
            $('#receipt_status').val('no');
            $('#color_code').empty();
            load_challan_list();
            create_delivery_challan_no();
            $(".selectpicker").selectpicker("refresh");
        }
        $('.new_challan_record').on('click', function() {
            new_challan_record();
        })
        // Load job card list on same day end

        // After select job card start
        $('#challan_list, #challan_list_search').on('change', function() {
            let id = $(this).val();
            $.ajax({
                url: "{{ route('delivery_challan.load_single_challan') }}",
                method: 'get',
                dataType: 'json',
                data: {
                    id
                },
                success: function({
                    challan_details
                }) {
                    console.log(challan_details);
                    $("#create_challan").trigger("reset");
                    if (challan_details) {
                        $('#core_id').val(challan_details.core_id);
                        $('#model_code').val(challan_details.model_code);
                        $('#color_code').val(challan_details.color_code);
                        $('#delivery_challan_no').val(challan_details.delivery_challan_no);
                        $('#sale_date').val(challan_details.sale_date);
                        $('#mobile').val(challan_details.mobile);
                        $('#customer_name').val(challan_details.customer_name);
                        $('#father_name').val(challan_details.father_name);
                        $('#mother_name').val(challan_details.mother_name);
                        $('#nid_no').val(challan_details.nid_no);
                        $('#address_one').val(challan_details.address_one);
                        $('#address_two').val(challan_details.address_two);
                        $('#full_chassis').val(challan_details.eight_chassis + challan_details.one_chassis + challan_details.three_chassis + challan_details.five_chassis);
                        $('#full_engine').val(challan_details.six_engine + challan_details.five_engine);
                        $('#model').val(challan_details.model_make_of_vehicle);
                        $('#year_of_manufacture').val(challan_details.year_of_manufacture);
                        $('#no_of_cylinder_with_cc').val(challan_details.no_of_cylinder_with_cc);
                        $('#seating_capacity').val(challan_details.seating_capacity);
                        $('#class_of_vehicle').val(challan_details.class_of_vehicle);
                        $('#weight').val(`${challan_details.ladan_weight} / ${challan_details.unladen_weight}`);
                        $('#unit_price_vat').val(`${challan_details.unit_price_vat.toLocaleString('en-IN')}/-`);
                        $('#basic_price_vat').val(Math.round(challan_details.basic_price_vat));
                        $('#sale_vat').val(Math.round(challan_details.sale_vat));
                        $("#color_code").append(`<option selected value="${challan_details.color_code}">${challan_details.color}</option>`);

                        $("#create_challan :input").prop("disabled", true);
                        $('#btn_create_challan').attr('disabled', true);
                        $('#challan_list').attr('disabled', false);
                        $('#challan_list_search').attr('disabled', false);
                        $('#challan_date_search').attr('disabled', false);
                        $('#btn_create_challan').addClass('bg-dark');
                        $('#btn_create_challan').removeClass('bg-secondary');
                        $('#btn_edit').removeClass('disabled');
                        $('#mc_return').removeClass('disabled');
                        $('#btn_create_challan').text('Update Challan');
                        $('#receipt_status').val('no');
                    }
                    if (challan_details.receipt_id) {
                        let receipt_id = challan_details.receipt_id;
                        let receipt_no = challan_details.receipt_no;
                        $('#receipt_id').val(receipt_id);
                        $('#receipt_no').val(receipt_no);
                        const url = "{{ route('receipt.money_receipt') }}?receipt_id=" + receipt_id;
                        $('#top_menu').find('.print_receipt').remove();
                        $('#top_menu').append(`<a target="_blank" href="${url}" class="print_receipt page-item page-link bg-secondary disable" id="print_receipt">Print Receipt</a>`)
                    }
                }
            });
        })
        // After select job card end        

        $('#challan_date_search').on('change', function() {
            let sale_date = $(this).val();
            $.ajax({
                url: "{{ route('delivery_challan.load_challan_list') }}",
                method: 'get',
                data: {
                    sale_date
                },
                dataType: 'json',
                success: function({
                    challan_list
                }) {

                    if (challan_list) {
                        $('#challan_list_search').empty();
                        $('#challan_list_search').append('<option style="font-weight:bold;" >Challan List</option>');
                        challan_list.forEach(function(item) {
                            $("#challan_list_search").append(
                                `<option style="font-weight:bold;" value="${item.id}">Chl- ${item.delivery_challan_no + ' ' + item.customer_name}</option>`
                            );
                        });
                    }
                }
            });
        })

    });
</script>
@endsection