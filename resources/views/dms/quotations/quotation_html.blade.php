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
            <p>Date: {{$quotations->qt_date}}</p>
        </div>
        <div style="clear:both;"></div>
        <div>
            <p class="line-spacing"">To,</p>
            <p>{{$quotations->to}}</p>
            <p>{{$quotations->address_one}}</p>
            <p>{{$quotations->address_two}}</p>            
            <p class=" line-spacing">Sub: OFFER FOR SUPPLY OF BAJAJ MOTOR CYCLE.</p>
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
                    @foreach ($quotation_items as $data)
                    <tr>

                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{$data->tb_description}}</td>
                        <td class="text-center unit">{{$data->tb_unit}}</td>
                        <td class="text-right unit_price">{{$data->tb_unit_price}}</td>
                        <td class="text-right grand_total">{{$data->tb_grand_total}}</td>

                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="text-right">
                    <tr>
                        <td colspan="4">Total</td>
                        <td class="sum_total">2,98,900/-</td>
                    </tr>
                    <tr>
                        <td colspan="4">Less Discount</td>
                        <td class="less_discount">3,000/-</td>
                    </tr>
                    <tr>
                        <td colspan="4">Grand Total</td>
                        <td class="less_discount_total">2,98,900/-</td>
                    </tr>
                </tfoot>
            </table>
            <div style="line-height:1.3;">
                <p class="line-spacing">
                    <b class="in_words">In Words: Two Hundred and eighty nine thousand nine
                        hundred only.</b>
                </p>
                <h4 class="line-spacing">TERMS & CONDITIONS</h4>
                <p>
                    1. Validity: This offers wills Remain Valid up to
                    February 10, 2022
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
                    Note: All Price is without AIT (15% Sale VAT Included)
                </p>
                <p class="line-spacing">Thanking you.</p>
                <p>Yours faithfully,</p>
                <p class="line-spacing"><b>For Bajaj Point</b></p>
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

</html>