@extends('service_layouts.app')
@section('title', 'Generate Bill/Invoice')

@push('page_css')
<style>
    @media print {

        .no-print,
        .no-print * {
            display: none !important;
        }
    }

    .img-width {
        width: 33.33%;
    }

    .bill_page {
        height: 73rem;
        width: 59rem;
        border: 1px solid black;
        margin: auto;
        position: relative;
        padding: 10px;
        box-sizing: border-box;
    }

    .input_style {
        background-color: #F4F6F9;
        height: 25px;
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
</style>
@endpush
@push('page_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12" style="margin:10px 0;">
        <div class="bill_page">
            <div class="bill_header">
                <div class="header_image">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-5" style="padding-left:0px;">
                            <img src="{{asset('/images/authorized_dealer.png')}}" class="img-fluid p-1" style="width:80%;">
                        </div>
                        <div class="col-md-2">
                            <img src="{{asset('/images/bill.png')}}" class="img-fluid p-1" style="width:80%;">
                        </div>
                        <div class="col-md-5" style="padding-right:0px;">
                            <img src="{{asset('/images/bp_service_address.png')}}" class="img-fluid p-1 float-right" style="width:90%;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bill_body">
                <div class="row">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3" style="width: 160px;">
                            <span class="input-group-text" id="basic-addon1" style="height:25px; border-radius: 0;">Bill No:</span>
                            <input type="text" class="form-control" style="height:25px; border-radius: 0;">
                        </div>
                    </div>
                    <div class="col-md-3 offset-md-3" style="padding-right: 0px;">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1" style="height:25px;">Date:</span>
                            <input type="date" class="form-control" style="height:25px;">
                        </div>
                    </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1" style="background-color:#F4F6F9; height:25px; border:0px; border-radius: 0;">Name :</span>
                            <input type="text" class="form-control" style="background-color:#F4F6F9; height:25px; border:0px; border-bottom: 1px solid black; border-radius:0;">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1" style="background-color:#F4F6F9; height:25px; border:0px; border-radius: 0;">Address :</span>
                            <input type="text" class="form-control" style="background-color:#F4F6F9; height:25px; border:0px; border-bottom: 1px solid black; border-radius:0;">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table align="center" style="width:100%;" id="tbl">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">Sl</th>
                                    <th style="text-align:center;">Parts Name</th>
                                    <th style="text-align:center;">Parts No</th>
                                    <th style="text-align:center;">Quantity</th>
                                    <th style="text-align:center;">Rate</th>
                                    <th style="text-align:center;">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i=0; $i<=20; $i++) <tr>
                                    <td>
                                        <input style="width:38px;" required type="text" class="input_style text-center" id="" name="" placeholder="">
                                    </td>
                                    <td>
                                        <input style="width:250px;" required type="text" class="input_style text-center" id="" name="" placeholder="">
                                    </td>
                                    <td>
                                        <input required type="text" class="input_style text-center" id="" name="" placeholder="">
                                    </td>
                                    <td>
                                        <input style="width:78px;" required type="text" class="input_style text-center" id="" name="" placeholder="">
                                    </td>
                                    <td>
                                        <input required type="text" class="input_style text-center" id="" name="" placeholder="">
                                    </td>
                                    <td>
                                        <input required type="text" class="input_style text-center" id="" name="" placeholder="">
                                    </td>
                                    </tr>
                                    @endfor
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td rowspan="3" colspan="4" style="vertical-align: top;">
                                        <p><strong>In Words:</strong></p>
                                    </td>
                                    <td>Total Amount</td>
                                    <td><input required type="text" class="input_style text-center" id="" name="" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td>Less/Advance</td>
                                    <td><input required type="text" class="input_style text-center" id="" name="" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td>Balance</td>
                                    <td><input required type="text" class="input_style text-center" id="" name="" placeholder=""></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row d-flex align-items-center" style="margin-top: 20px;">
                        <div class="col-md-12" style="padding-left:0px;">
                            <img src="{{asset('/images/for_bajajpoint.png')}}" class="img-fluid p-1" style="width:100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection
        @section('script')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>

        </script>
        @endsection
