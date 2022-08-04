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

    .input_style {
        background-color: #F4F6F9;
        height: 18px;
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
        font-size: 16px;
        border-style: dashed;
    }

    .input_style {
        background-color: #F4F6F9;
        height: 25px;
        border: 0px;
        border-bottom: 1px solid black;
        border-radius: 0;
        font-weight: 700;
        font-size: 16px;
        border-style: dashed;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .span_underline {
        width: 280px;
        border-bottom: 1px solid black;
        border-style: dashed;
    }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12" style="margin:10px 0;">
        <form action="#" method="POST" id="create_bill">
            <input type="hidden" name="request_from" id="request_from" value="">
            <input type="hidden" name="update" id="update" value="true">
            @csrf
            <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                <div class="card-header no-print">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center" style="height:32px;">
                            <div style="border:1px solid #000; border-radius:5px; padding:3px 5px;">
                                <label style="margin-right:10px;">Bill Area</label>
                                <select name="bill_list" style="font-weight: bold; background:#F7F7F7; border-radius:5px;" id="bill_list">

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
                                <label>Bill Date</label>
                                <input type="date" name="bill_date_search" id="bill_date_search" style="margin-left:15px; background:#F7F7F7; width:100px;">
                                <select name="bill_list_search" style="font-weight: bold; background:#F7F7F7; border-radius:5px;" id="bill_list_search">
                                    <option style="font-weight:bold;" value="">Bill List</option>
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
                                <div class="input-group mb-3" style="width: 160px;">
                                    <span class="input-group-text span_style" style="height:25px; border-radius: 0;">Challan No:</span>
                                    <input readonly type="text" name="bill_no" id="bill_no" class="form-control bill_no input_style" style="height:25px; border-radius: 0;">
                                </div>
                            </div>
                            <div class="col-md-3 offset-md-3" style="padding-right: 11px;">
                                <div class="input-group mb-3">
                                    <span class="input-group-text span_style" style="height:25px; border-radius: 0;">Date:</span>
                                    <input type="date" name="bill_date" id="bill_date" class="form-control bill_date input_style" style="height:25px; border-radius: 0;">
                                </div>
                            </div>
                            <div class="col-md-3 offset-md-9" style="padding-right: 11px; margin-top:-12px;">
                                <div class="input-group mb-3">
                                    <span class="input-group-text span_style" style="height:25px; border-radius: 0;">Mobile</span>
                                    <input type="text" name="client_mobile" id="client_mobile" class="form-control client_mobile input_style" style="height:25px; border-radius: 0;">
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Name :</span>
                                    <input type="text" name="client_name" id="client_name" class="form-control client_name input_style">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Father's Name :</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address input_style">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Mother's Name :</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address input_style">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">NID No :</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address input_style">
                                </div>
                                <div class="input-group mb-3 mt-10">
                                    <span class="input-group-text span_style">Address :</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address input_style">
                                </div>
                                <div style="margin-top:50px;"></div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">01. Chassis No</span><span class="span_style">:</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">02. Engine No</span><span class="span_style">:</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">03. Make & Model of Vehicle</span><span class="span_style">:</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">04. Year Of Manufacture</span><span class="span_style">:</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">05. No. Of Cylinder With CC</span><span class="span_style">:</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">06. Seating Capacity</span><span class="span_style">:</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">07. Class Of Vehicle</span><span class="span_style">:</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">08. Color Of Vehicle</span><span class="span_style">:</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address input_style">
                                </div>
                                <div class="input-group mb-3 mt-10 fw-bold">
                                    <span class="input-group-text span_style span_underline">09. Unladen Weight/Laden Weight</span><span class="span_style">:</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address input_style">
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


    });
</script>
@endsection