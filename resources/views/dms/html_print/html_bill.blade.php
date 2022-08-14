<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Quotation</title>
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
            height: 76rem;
            width: 59rem;
            border: 1px solid black;
            margin: auto;
            position: relative;
            padding: 10px;
            box-sizing: border-box;
        }

        .input_style {
            background-color: white;
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
    </style>
</head>

<body>
    <div class="bill_page">
        <div class="bill_header">
            <div class="header_image">
                <div class="row d-flex align-items-center">
                    <div class="col-md-5">
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
                <div class="col-md-6">
                    <div class="input-group mb-3" style="width: 160px;">
                        <span class="input-group-text input_style" id="basic-addon1" style="height:25px;">Bill No:</span>
                        <input value="{{$bill_data[0]->bill_no}}" readonly type="text" name="bill_no" id="bill_no" class="form-control bill_no input_style" style="height:25px;">
                    </div>
                </div>
                <div class="col-md-3 offset-md-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text input_style" id="basic-addon1" style="height:25px;">Date:</span>
                        <input value="{{$bill_data[0]->bill_date}}" type="date" name="bill_date" id="bill_date" class="form-control bill_date input_style" style="height:25px;">
                    </div>
                </div>
                <div class="col-md-3 offset-md-9" style="margin-top:-12px;">
                    <div class="input-group mb-3">
                        <span class="input-group-text input_style" id="basic-addon1" style="height:25px;">Mobile</span>
                        <input value="{{$bill_data[0]->client_mobile}}" type="text" name="client_mobile" id="client_mobile" class="form-control client_mobile input_style" style="height:25px;">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-group mb-3" style="margin-top:-14px;">
                        <span class="input-group-text input_style" id="basic-addon1" style="height:25px; border:0px; border-radius: 0;">Name :</span>
                        <input value="{{$bill_data[0]->client_name}}" value="" type="text" name="client_name" id="client_name" class="form-control client_name input_style" style=" height:25px; border:0px; border-bottom: 1px solid black; border-radius:0;">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-group mb-3" style="margin-top:-10px;">
                        <span class="input-group-text input_style" id="basic-addon1" style="height:25px; border:0px; border-radius: 0;">Address :</span>
                        <input value="{{$bill_data[0]->client_address}}" type="text" name="client_address" id="client_address" class="form-control client_address input_style" style="height:25px; border:0px; border-bottom: 1px solid black; border-radius:0;">
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
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($bill_data as $key => $value)
                            <tr>
                                <td>
                                    <input value="{{$key + 1}}" type="text" name="sl" style="width:38px;" class="input_style text-center">
                                </td>
                                <td>
                                    <input value="{{$value->part_name}}" type="text" style="width:250px;" class="input_style text-center">
                                </td>
                                <td>
                                    <input value="{{$value->part_id}}" type="text" class="input_style text-center">
                                </td>
                                <td>
                                    <input value="{{$value->quantity}}" type="text" style="width:78px;" class="input_style text-center">
                                </td>
                                <td>
                                    <input value="{{$value->rate}}" type="text" style="width:115px;" class="input_style text-right">
                                </td>
                                <td>
                                    <input value="{{$value->quantity * $value->rate}}" type="text" class="input_style text-right">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                @php
                                $f = new NumberFormatter("bd", NumberFormatter::SPELLOUT);
                                $in_words = $f->format($bill_data[0]->bill_amount);
                                @endphp
                                <td rowspan="7" colspan="4" style="vertical-align: top;">
                                    <p>
                                        <strong>In Words: <span id="in_words">{{ucfirst(trans($in_words)).' only.'}}</span></strong>
                                    </p>
                                </td>
                                <td>Total Amount</td>
                                <td><input value="{{$bill_data[0]->bill_amount}}" type="text" class="input_style text-right"></td>
                            </tr>
                            <tr>
                                <td>Discount</td>
                                <td><input value="{{$bill_data[0]->discount}}" type="text" class="input_style text-right"></td>
                            </tr>
                            <tr>
                                <td>Balance</td>
                                <td><input value="{{$bill_data[0]->bill_amount - $bill_data[0]->discount}}" type="text" class="input_style text-right"></td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td><input value="{{$bill_data[0]->vat}}" type="text" class="input_style text-right"></td>
                            </tr>
                            <tr>
                                <td>Grand Total</td>
                                <td><input value="{{($bill_data[0]->bill_amount - $bill_data[0]->discount) + $bill_data[0]->vat}}" type="text" class="input_style text-right"></td>
                            </tr>
                            <tr>
                                <td>Paid Amount</td>
                                <td><input value="{{(($bill_data[0]->bill_amount - $bill_data[0]->discount) + $bill_data[0]->vat) - $bill_data[0]->due_amount}}" type="text" class="input_style text-right"></td>
                            </tr>
                            <tr>
                                <td>Due</td>
                                <td><input value="{{$bill_data[0]->due_amount}}" type="text" class="input_style text-right"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row d-flex align-items-center" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <img src="{{asset('/images/for_bajajpoint_two.png')}}" class="img-fluid p-1" style="width:100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>