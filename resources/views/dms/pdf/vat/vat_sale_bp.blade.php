<!DOCTYPE html>
<html>

<head>

    <style>
        html {
            margin: 0px;
            padding: 0px;
            line-height: 100%;
        }

        h2,
        p {
            margin: 0px;
            padding: 0px;
        }

        body {
            /* font-family: Helvetica, sans-serif; */
            font-size: 11px;
            font-weight: normal;
            margin: 5mm;
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
    </style>
</head>

<body>
    <div style="text-align:center;">
        <h2>Bajaj Point</h2>
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
        $sl = 0;
        function bd_format($amount) {
        $fmt = new \NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
        return $fmt->format($amount);
        }
        $vat_basic_grand = 0;
        $vat_sale_grand = 0;
        $vat_unit_grand = 0;
        @endphp

        @foreach ($date_data as $key=> $data)
        <tr>
            <td colspan="11" class="center">Date: {{date('d-m-Y', strtotime($key))}}</td>
        </tr>
        @php
        $vat_basic_sum = 0;
        $vat_sale_sum = 0;
        $vat_unit_sum = 0;

        @endphp
        @foreach ($data as $item)
        <tr>
            <td class="center">{{$sl+1}}</td>
            <td>{{$item->model}}</td>
            <td class="center">{{date('d-m-Y', strtotime($item->vat_sale_date))}}</td>
            <td class="center">{{$item->five_chassis}}</td>
            <td class="center">{{$item->five_engine}}</td>
            <td class="center">{{$item->sale_mushak_no}}</td>
            <td style="font-size:10px;">{{$item->customer_name}}</td>
            <td style="font-size:10px;">{{$item->address_two}}</td>
            <td class="right">{{bd_format($item->basic_price_vat)}}</td>
            <td class="right">{{bd_format($item->sale_vat)}}</td>
            <td class="right">{{bd_format($item->unit_price_vat)}}</td>
        </tr>
        @php
        $sl++;
        $vat_basic_sum += $item->basic_price_vat;
        $vat_sale_sum += $item->sale_vat;
        $vat_unit_sum += $item->unit_price_vat;
        @endphp
        @endforeach
        @php
        $vat_basic_grand += $vat_basic_sum;
        $vat_sale_grand += $vat_sale_sum;
        $vat_unit_grand += $vat_unit_sum;
        @endphp
        <tr>
            <td colspan="8"></td>
            <td class="right"><b>{{bd_format($vat_basic_sum)}}</b></td>
            <td class="right"><b>{{bd_format($vat_sale_sum)}}</b></td>
            <td class="right"><b>{{bd_format($vat_unit_sum)}}</b></td>
        </tr>
        @endforeach
        <tr>
            <td colspan="8">Grand Total</td>
            <td class="right">{{bd_format($vat_basic_grand)}}</td>
            <td class="right">{{bd_format($vat_sale_grand)}}</td>
            <td class="right">{{bd_format($vat_unit_grand)}}</td>
        </tr>

    </table>

</body>

</html>