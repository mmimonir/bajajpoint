<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quotation</title>
    <style>
        html,
        body {
            display: table;
            margin: auto;
            line-height: 1.2;
            font-size: 16px;

        }

        p,
        h4 {
            margin: 0;
            line-height: 1.3;
        }

        .quotation {
            width: 20.5cm;
            height: 28.194cm;
            margin-left: 1.6in;
            margin-top: 1.5in;
            margin-right: .8in;
        }

        .line-spacing {
            margin-top: 15px;
        }

        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 2px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="quotation">
        <div class="container">
            <p>{{$quotations->ref}}</p>
            <p>Date: {{date('d-m-Y', strtotime($quotations->qt_date))}}</p>
        </div>
        <div style="clear:both;"></div>
        <div>
            <p class="line-spacing"">To,</p>
            <p>{{$quotations->to}}</p>
            <p>{{$quotations->address_one}}</p>
            <p>{{$quotations->address_two}}</p>            
            <p class=" line-spacing"><b>Sub: OFFER FOR SUPPLY OF BAJAJ MOTOR CYCLE.</b></p>
            <p class="line-spacing" style="text-align:justify;">
                Thank you very much for your kind interest in Bajaj vehicles
                produced in India by Bajaj Auto Ltd. India. we, being the
                authorized dealer of Uttara Motors Ltd. in Dhaka are pleased
                to submit our best price along with terms and condition for
                your kind consideration:
            </p>
            <table class=" line-spacing" style="width:100%;">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Description</th>
                        <th>Unit</th>
                        <th>Unit Price</th>
                        <th>Grand Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $sum = 0;
                    @endphp
                    @foreach ($quotation_items as $data)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{$data->tb_description}}</td>
                        <td class="text-center unit">{{$data->tb_unit}}</td>
                        <td class="text-right unit_price bd_taka">{{$data->tb_unit_price}}</td>
                        <td class="text-right grand_total bd_taka">{{$data->tb_grand_total}}</td>
                    </tr>
                    @php
                    $sum += $data->tb_grand_total;
                    @endphp
                    @endforeach
                </tbody>
                <tfoot class="text-right">
                    <tr>
                        <td colspan="4">Total</td>
                        <td class="sum_total"><b>{{preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sum)}}</b></td>
                    </tr>
                    <tr>
                        <td colspan="4">Less Discount</td>
                        <td class="less_discount bd-taka">{{preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $quotations->discount)}}</td>
                    </tr>
                    <tr>
                        <td colspan="4">Grand Total</td>
                        <td class="less_discount_total"><b>{{preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", ($sum - $quotations->discount))}}</b></td>
                    </tr>
                </tfoot>
            </table>
            <div style="line-height:1.3;">
                <p class="line-spacing">
                <p><b>In Words: </b><b class="in_words"></b><b>Only</b></p>
                </p>
                <h4 class="line-spacing">TERMS & CONDITIONS</h4>
                <p>
                    1. Validity: This offers wills Remain Valid up to
                    <b>{{date('M d, Y', strtotime($quotations->validity))}}</b>
                </p>
                <p>
                    2. Delivery: Delivery of vehicle will be made to you
                    from our stock after receipt of you confirmed payment
                </p>
                <p>
                    3. Payment: 100% payment shall have to be made cash/pay
                    order to us at the time of taking delivery.
                </p>
                <p class="line-spacing" style="text-align:justify;">
                    If you have any query on anything, please call us any
                    time without any hesitation and we will be too glad to
                    answer all of you queries.
                </p>
                <p class="line-spacing">
                    <b>{{$quotations->notes}}</b>
                </p>
                <p class="line-spacing">Thanking you.</p>
                <p>Yours faithfully,</p>
                <p class="line-spacing"><b>For {{$quotations->for}}</b></p>
                <p style="margin-top:25px;">___________________</p>
                <p>
                    <b>Free Offer:</b>
                </p>
                <p> (1). 2 (Two) Years or 20000 km Engine
                    warranty, (2). 4 Nos free service in 9 (nine) month,
                    (3). 1 (One) Tool Box, (4). 1 (one) Document Cover.</p>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.bd_taka').each(function() {
            var monetary_value = $(this).text();
            var i = new Intl.NumberFormat('en-IN', {
                maximumFractionDigits: 0,
            }).format(monetary_value);
            $(this).text(i);
        });

        var number = +$('.less_discount_total').text().replace(/,/g, '');



        var a = ['', 'One ', 'Two ', 'Three ', 'Four ', 'Five ', 'Six ', 'Seven ', 'Eight ', 'Nine ', 'Ten ', 'Eleven ', 'Twelve ', 'Thirteen ', 'Fourteen ', 'Fifteen ', 'Sixteen ', 'Seventeen ', 'Eighteen ', 'Nineteen '];
        var b = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

        function inWords(num) {
            if ((num = num.toString()).length > 9) return 'overflow';
            n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return;
            var str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Crore ' : '';
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Lakh ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'Only ' : '';
            return str;
        }
        $('.in_words').text(inWords(number));
    });
</script>

</html>