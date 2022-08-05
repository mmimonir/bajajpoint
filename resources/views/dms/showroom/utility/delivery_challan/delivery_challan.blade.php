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
                                <select name="challan_list" style="font-weight: bold; background:#F7F7F7; border-radius:5px;" id="challan_list">

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
                                    <button class="page-item page-link bg-dark" type="submit" id="btn_create_bill">Create Bill</button>
                                </ul>
                            </nav>
                            <div style="border:1px solid #000; border-radius:5px; padding:3px 5px; margin-left:15px;">
                                <label>Challan Date</label>
                                <input type="date" name="challan_date_search" id="challan_date_search" style="margin-left:15px; background:#F7F7F7; width:100px;">
                                <select name="bill_list_search" style="font-weight: bold; background:#F7F7F7; border-radius:5px;" id="challan_list_search">
                                    <option style="font-weight:bold;" value="">Challan List</option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-md-4 d-flex mt-2" style="border:1px solid black; border-radius:5px;">
                                <label for="mc_stock_list" class="col-form-label">Availability</label>
                                <select name="mc_stock_list" id="mc_stock_list" class="selectpicker" data-live-search="true" required>

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
                                <div class="input-group mb-3" style="width: 180px;">
                                    <span class="input-group-text span_style">Challan No:</span>
                                    <input readonly type="text" name="delivery_challan_no" id="delivery_challan_no" class="form-control delivery_challan_no input_style" value="001">
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
                                    <input type="text" minlength="11" maxlength="11" pattern="[0-9]+" name="mobile" id="mobile" class="form-control mobile input_style" value="01974353555">
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Name :</span>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control customer_name input_style" value="MD MONIRUL ISLAM">
                                    <input type="hidden" name="id" id="core_id" value="">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Father's Name :</span>
                                    <input type="text" name="father_name" id="father_name" class="form-control father_name input_style" value="MD NURUL ISLAM">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Mother's Name :</span>
                                    <input type="text" name="mother_name" id="mother_name" class="form-control mother_name input_style" value="FATEMA BEGUM">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">NID No :</span>
                                    <input type="text" name="nid_no" id="nid_no" class="form-control nid_no input_style" value="00000000000000000">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Address :</span>
                                    <input type="text" name="address_one" id="address_one" class="form-control address_one input_style" value="400/B MALIBAGH CHOWDHURY PARA, DHAKA-1219">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <input type="text" name="address_two" id="address_two" class="form-control address_two input_style" value="400/B MALIBAGH CHOWDHURY PARA, DHAKA-1219">
                                </div>
                                <div style="margin-top:50px;"></div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">01. Chassis No</span><span class="span_style">:</span>
                                    <input type="text" minlength="17" maxlength="17" pattern="[A-Z0-9]+" id="full_chassis" class="form-control full_chassis input_style" value="PSUA11CYXMTD99999">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">02. Engine No</span><span class="span_style">:</span>
                                    <input type="text" minlength="11" maxlength="11" pattern="[A-Z0-9]+" id="full_engine" class="form-control full_engine input_style" value="DHXCMN66666">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">03. Make & Model of Vehicle</span><span class="span_style">:</span>
                                    <select name="model_code" class="input_style" style="margin:auto; width:683px; padding-left:10px;">
                                        <option>Select</option>
                                        <option value="1000">BAJAJ PULSAR 150 TWIN DISC MATTE</option>
                                        <option value="1001">BAJAJ PULSAR 150 TWIN DISC MATTE</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">04. Year Of Manufacture</span><span class="span_style">:</span>
                                    <input type="text" name="year_of_manufacture" id="year_of_manufacture" class="form-control year_of_manufacture input_style" value="2022">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">05. No. Of Cylinder With CC</span><span class="span_style">:</span>
                                    <input type="text" id="no_of_cylinder_with_cc" class="form-control no_of_cylinder_with_cc input_style" value="SINGLE/150 CC">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">06. Seating Capacity</span><span class="span_style">:</span>
                                    <input type="text" id="seating_capacity" class="form-control seating_capacity input_style" value="2 PERSON">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">07. Class Of Vehicle</span><span class="span_style">:</span>
                                    <input type="text" id="class_of_vehicle" class="form-control class_of_vehicle input_style" value="MOTORCYCLE">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">08. Color Of Vehicle</span><span class="span_style">:</span>
                                    <select name="color_code" class="input_style" style="margin:auto; width:683px; padding-left:10px;">
                                        <option>Select</option>
                                        <option value="500">BLACK/RED</option>
                                        <option value="501">BLACK/BLUE</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">09. Unladen Weight/Laden Weight</span><span class="span_style">:</span>
                                    <input type="text" name="weight" id="weight" class="form-control weight input_style" value="144 KG/274 KG">
                                </div>
                            </div>
                        </div>
                        <div style="margin-top:50px;"></div>
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
        $('.selectpicker').selectpicker();

        let full_chassis = $('#full_chassis').val();
        let full_engine = $('#full_engine').val();

        let eight_chassis = full_chassis.substring(0, 8);
        let one_chassis = full_chassis.substring(8, 9);
        let three_chassis = full_chassis.substring(9, 12);
        let five_chassis = full_chassis.substring(12, 17);

        let six_engine = full_engine.substring(0, 6);
        let five_engine = full_engine.substring(6, 11);



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
                        $('#mc_stock_list').append('<option style="font-weight:bold; font-size:18px;" value="">MC List</option>');
                        stock.forEach(function(item) {
                            $("#mc_stock_list").append(
                                `<option style="font-weight:bold; font-size:18px;" value="${item.id}">${item.model} CH ${item.five_chassis} EN ${item.five_engine}</option>`
                            );
                        });
                        $(".selectpicker").selectpicker("refresh");
                    }
                }
            });
        }
        mc_stock_list();

        $(document).on('change', '#mc_stock_list', function() {
            let core_id = $(this).val();
            $.ajax({
                url: "{{route('delivery_challan.get_stock_mc_details')}}",
                type: "GET",
                dataType: "json",
                data: {
                    core_id
                },
                success: function({
                    stock,
                    status
                }) {
                    if (status === 200) {
                        $('#chassis_no').val(stock.chassis_no);
                        $('#engine_no').val(stock.engine_no);
                        $('#year_of_manufacture').val(stock.year_of_manufacture);
                        $('#no_of_cylinder_with_cc').val(stock.no_of_cylinder_with_cc);
                        $('#seating_capacity').val(stock.seating_capacity);
                        $('#class_of_vehicle').val(stock.class_of_vehicle);
                        $('#weight').val(stock.weight);
                        $('#color_code').val(stock.color_code);
                    }
                }
            });
        });
    });
</script>
@endsection