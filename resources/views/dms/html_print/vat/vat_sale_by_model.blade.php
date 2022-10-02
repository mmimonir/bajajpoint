<!DOCTYPE html>
<html>

<head>
    <title>VAT Sale</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            font-weight: normal;
            margin: 5mm;
        }

        html {
            display: table;
            margin: auto;
            line-height: 1.3;
        }

        h2,
        p {
            margin: 0px;
            padding: 0px;
        }

        table,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table {
            width: 100%;
            /* border-collapse: collapse; */
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        td {
            padding: 3px;
        }

        .vat_sale {
            width: 29.7cm;
            height: 21cm;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="vat_sale">
        <div style="text-align:center;">
            <h2>{{$vat_code == 2000 ? "Bajaj Point" : ($vat_code == 2011 ? "Bajaj Heaven" : ($vat_code == 2030 ? "Bajaj Bloom" : ''))}}</h2>
            <p style="margin:5px 0px;">Daily Sale (VAT)</p>
        </div>
        <table>
            <tr>
                <th>Sl</th>
                <th>Model</th>
                <th>Sale Date</th>
                <th>Chassis</th>
                <th>Engine</th>
                <th>M.Sl</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Basic Price</th>
                <th>VAT</th>
                <th>MRP</th>
            </tr>
            @php
            $master_total_basic = 0;
            $master_total_vat = 0;
            $master_total_mrp = 0;

            $total_basic = 0;
            $total_vat = 0;
            $total_mrp = 0;

            $sl=1;
            @endphp
            @foreach ($vat_data as $key=> $data)
            @foreach ($data as $key => $item)
            @php
            $count = 0;
            $basic = 0;
            $vat = 0;
            $mrp = 0;
            @endphp
            <tr>
                <td colspan="11" style="font-weight:bold; text-align:center;">
                    {{date('F Y', mktime(0, 0, 0, $key, 10))}}
                </td>
            </tr>
            @foreach ($item as $itm)
            <tr>
                <td class="center">{{$sl++}}</td>
                </td>
                <td>{{$itm->model}}</td>
                <td class="center">{{date('d-m-Y', strtotime($itm->vat_sale_date))}}</td>
                <td class="center">{{$itm->five_chassis}}</td>
                <td class="center">{{$itm->five_engine}}</td>
                <td class="center">{{$itm->sale_mushak_no}}</td>
                <td style="font-size:10px;">{{substr($itm->customer_name, 0, 30)}}</td>
                <td style="font-size:10px;">{{substr($itm->full_address, -30)}}</td>
                <td class="right bd_taka">{{$itm->basic_price_vat}}</td>
                <td class="right bd_taka">{{$itm->sale_vat}}</td>
                <td class="right bd_taka">{{$itm->unit_price_vat}}</td>
            </tr>
            @php
            $count++;
            $basic += $itm->basic_price_vat;
            $vat += $itm->sale_vat;
            $mrp += $itm->unit_price_vat;            
            @endphp
            @endforeach
            @php
            $total_basic += $basic;
            $total_vat += $vat;
            $total_mrp += $mrp;
            @endphp
            
            <tr>
                <td style="text-align:center; font-weight:bold;">Total</td>
                <td style="text-align:center; font-weight:bold;">{{$count}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="right bd_taka bold">{{$basic}}</td>
                <td class="right bd_taka bold">{{$vat}}</td>
                <td class="right bd_taka bold">{{$mrp}}</td>
            </tr>
            
            @endforeach                        
            <tr>
                <td colspan="8" style="font-weight:bold; text-align:center;">
                    Grand Total
                </td>
                <td class="right bd_taka bold">{{$total_basic}}</td>
                <td class="right bd_taka bold">{{$total_vat}}</td>
                <td class="right bd_taka bold">{{$total_mrp}}</td>
            </tr>
            @php
            $master_total_basic += $total_basic;
            $master_total_vat += $total_vat;
            $master_total_mrp += $total_mrp;

            $total_basic = 0;
            $total_vat = 0;
            $total_mrp = 0;
            @endphp
            @endforeach            
            <tr>
                <td colspan="8" style="font-weight:bold; text-align:center;">
                    Master Total
                </td>
                <td class="right bd_taka bold">{{$master_total_basic}}</td>
                <td class="right bd_taka bold">{{$master_total_vat}}</td>
                <td class="right bd_taka bold">{{$master_total_mrp}}</td>
            </tr>
            
        </table>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $('.bd_taka').each(function() {
        var monetary_value = $(this).text();
        var i = new Intl.NumberFormat('en-IN', {
            maximumFractionDigits: 0,
        }).format(monetary_value);
        $(this).text(i);
    });
</script>

</html>