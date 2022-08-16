<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Money Receipt</title>
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

        .bill_page {
            height: 680px;
            width: 1020px;
            border: 1px solid black;
            margin: auto;
            position: relative;
            padding: 10px;
            box-sizing: border-box;
            font-size: 18px;
        }

        .input_style {
            background-color: white;
            height: 18px;
        }

        .input_group_style {
            height: 25px;
            border: 0px;
            border-bottom: 1px solid black;
            border-radius: 0;
        }
    </style>
</head>

<body>
    <div class="bill_page font-weight-bold">
        <div class="bill_header">
            <div class="header_image">
                <div class="row d-flex align-items-center">
                    <div class="col-md-12">
                        <img src="{{asset('/images/money_receipt_bp.png')}}" class="img-fluid p-1" style="width:100%;">
                    </div>
                </div>
            </div>
        </div>
        <div class="bill_body">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3" style="width: 160px;">
                        <span class="input-group-text input_style" id="basic-addon1" style="height:25px;">No:</span>
                        <input readonly type="text" name="bill_no" id="bill_no" class="form-control bill_no input_style" style="height:25px;">
                    </div>
                </div>
                <div class="col-md-3 offset-md-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text input_style" id="basic-addon1" style="height:25px;">Date:</span>
                        <input type="date" name="bill_date" id="bill_date" class="form-control bill_date input_style" style="height:25px;">
                    </div>
                </div>
                <div class="col-md-3 offset-md-9" style="margin-top:-12px;">
                    <div class="input-group mb-3">
                        <span class="input-group-text input_style" id="basic-addon1" style="height:25px;">Mobile</span>
                        <input type="text" name="client_mobile" id="client_mobile" class="form-control client_mobile input_style" style="height:25px;">
                    </div>
                </div>
                <div class="col-md-12" style="line-height:2;">
                    <div class="input-group mb-1">
                        <span>Reveived with thanks from Mr./Mrs./M/s.: </span>
                        <input type="text" id="client_name" class="form-control input_group_style">
                    </div>
                    <div class="input-group mb-1">
                        <span>An amount of Taka: </span>
                        <input type="text" id="client_address" class="form-control input_group_style">
                    </div>
                    <div class="input-group mb-1">
                        <span>In cash/by: </span>
                        <input type="text" id="client_address" class="form-control input_group_style" style="width:550px;">
                        <span>Date: </span>
                        <input type="date" id="client_address" class="form-control input_group_style">
                    </div>
                    <div class="input-group mb-1">
                        <span>Drawn on: </span>
                        <input type="text" id="client_address" class="form-control input_group_style">
                    </div>
                    <div class="input-group mb-1">
                        <span>On account of: </span>
                        <input type="text" id="client_address" class="form-control input_group_style">
                    </div>
                </div>
                <div class="col-md-7 mt-5">
                    <div class="input-group mb-1">
                        <span class="pr-2">The sum of Tk: </span>
                        <input type="text" id="client_address" style="width:224px; border-radius:5px;">
                    </div>
                </div>
                <div class="row d-flex align-items-center mt-5">
                    <div class="col-md-12">
                        <img src="{{asset('/images/money_receipt_bottom.png')}}" class="img-fluid p-3" style="width:100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>