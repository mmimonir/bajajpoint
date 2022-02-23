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
            @foreach ($vat_data as $key=> $data)


            @foreach ($data as $item)
            <tr>
                <td class="center">{{1}}</td>
                <td>{{$item->model}}</td>
                <td class="center">{{date('d-m-Y', strtotime($item->vat_sale_date))}}</td>
                <td class="center">{{$item->five_chassis}}</td>
                <td class="center">{{$item->five_engine}}</td>
                <td class="center">{{$item->sale_mushak_no}}</td>
                <td style="font-size:10px;">{{substr($item->customer_name, 0, 30)}}</td>
                <td style="font-size:10px;">{{substr($item->full_address, -30)}}</td>
                <td class="right bd_taka">{{$item->basic_price_vat}}</td>
                <td class="right bd_taka">{{$item->sale_vat}}</td>
                <td class="right bd_taka">{{$item->unit_price_vat}}</td>
            </tr>
            @endforeach
            <tr>
                <td style="text-align:center; font-weight:bold;">Total</td>
            </tr>
            <tr>
                <td colspan="11" style="text-align:center; font-weight:bold;">{{$key}}</td>
            </tr>
            @endforeach
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