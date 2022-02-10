<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html {
            display: table;
            margin: auto;
        }

        body,
        p {
            margin: 0;
            padding: 0;
            font-weight: 600;
            font-family: Arial, Helvetica, sans-serif;
        }

        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .center {
            margin: auto;
            width: 25%;
            border: 1px solid black;
            padding: 3px;
        }

        .center2 {
            text-align: center;
        }

        .bottom_sign {
            position: relative;
            margin-right: 20px;
        }

        .bottom_sign:after {
            content: "";
            background: black;
            position: absolute;
            bottom: 12px;
            left: 0;
            height: 1px;
            width: 120px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    @foreach ($print_data as $data)
    <div class="gate_pass" style="display:block; width:576px; margin-top:110px;">
        <div class="center" style="margin-bottom:20px;">
            <p style="text-align:center;">GATEPASS</p>
        </div>
        <div style="font-size:10px; width:100%; margin-bottom:20px; display:inline-block">
            <div style="width:50%; float:left; line-height:1.3;">
                <p>GATEPASS NO: DO-017686 /3</p>
                <p>CUSTOMER: Uttara Motors Ltd</p>
                <p>Showroom: ESKATON</p>
                <p>Address:23/KA, New Eskaton Road, Moghbazar, Dhaka</p>
            </div>
            <div style="width:50%; float:right;">
                <p style="text-align:right; margin-right:33px;">Date: <span id="purchage_date">{{date('d-M-y', strtotime($data->purchage_date))}}</span></p>
            </div>
        </div>
        <div>
            <table style="width:576px; font-size:9px;">
                <thead">
                    <tr>
                        <th style="width:29px;">SL NO.</th>
                        <th style="width:68px;">MATERIAL CODE</th>
                        <th style="width:2in;">MATERIAL DESCRIPTION</th>
                        <th style="width:29px;">QTY</th>
                        <th style="width:1.5in;">CHASIS NO</th>
                        <th style="width:96px;">ENGINE NO</th>
                        <th style="width:38px;">Battery No</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="center2">1</td>
                            <td class="center2">100000651</td>
                            <td>{{$data->description}}</td>
                            <td class="center2">1</td>
                            <td style="font-size:11px;">{{$data->eight_chassis}}{{$data->one_chassis}}{{$data->three_chassis}}{{$data->five_chassis}}</td>
                            <td style="font-size:11px;">{{$data->six_engine}}{{$data->five_engine}}</td>
                            <td></td>
                        </tr>
                    </tbody>
            </table>
        </div>
        <div style="margin-top:68px; font-size:10px;">
            <span class="bottom_sign" style="display:inline-block; width:120px; text-align:center;">Reveiver's Signature</span>
            <span class="bottom_sign" style="display:inline-block; width:120px; text-align:center; margin-left:50px;">Security Incharge</span>
            <span class="bottom_sign" style="display:inline-block; width:120px; text-align:center; margin-left:50px;">Factory Incharge</span>
        </div>
    </div>
    @endforeach
</body>

</html>