<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Generate PDF From View</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/pdf.css') }}"> -->
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        html {
            display: table;
            margin: auto;
            line-height: 1.3;
        }

        .concern {
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            margin-top: 0px;
            margin-bottom: 20px;
            padding: 0px;
        }

        .sl {
            padding-right: 10px;
        }

        .model {
            width: 25px;
        }

        .colon {
            width: 5px;
        }

        .description {
            width: 30px;
        }

        .certificate,
        .challan {
            margin-left: 50px;
            margin-top: 175px;
        }

        .margin_right {
            margin-right: 20px;
        }

        .table_first_page td {
            padding-bottom: 5px;
        }

        h1,
        h2,
        p,
        h3,
        span {
            margin: 0px;
            padding: 0px;
        }

        .margin {
            margin-bottom: 0px;
        }

        .certify {
            padding: 10px 0px;
        }

        .all_code {
            margin-left: 50px;
            /* padding: 25px 0px; */
        }

        .all_code span {
            padding-right: 25px;
        }

        .colon {
            padding: 0 10px;
        }

        .delivery_challan {
            font-weight: bold;
            font-size: 15px;
            margin-top: 10px;
            text-align: center;
        }

        .remarks {
            border: 1px solid black;
            margin-bottom: 10px;
            height: 116px;
        }

        .remarks>p {
            padding: 10px;
        }

        .remarks p {
            padding: 5px;
        }

        .remarks div {
            margin-left: 150px;
        }

        .foot_note {
            padding-top: 15px;
        }

        .please {
            margin-top: 35px;
            margin-bottom: 10px;
        }

        .table_second_page>div,
        .table_first_page>div {
            padding: 3px 0px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>

</head>

<body>
    <div class="print_certificate margin_right" style="height:11.3in; width:8.2in;">
        @php
        function bd_format($amount) {
        $fmt = new \NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
        return $fmt->format($amount);
        }
        @endphp
        @foreach ($print_data as $data)
        <div class="all_code">
            <span>{{$data->challan_no ? $data->challan_no : 0 }}</span>
            <span>{{$data->uml_mushak_no ? $data->uml_mushak_no : 0}}</span>
            <span>{{$data->approval_no ? $data->approval_no : 0}}</span>
            <span>{{$data->invoice_no ? $data->invoice_no : 0}}</span>
            <span>{{$data->sale_mushak_no ? $data->sale_mushak_no : 0}}</span>
            <span>{{$data->dealer ? $data->dealer : 0}}</span>
            <span>{{$data->vat_process ? $data->vat_process : 0}}</span>
            <span>{{$data->tr_number ? $data->tr_number : 0}}</span>
        </div>
        <div class="certificate">
            <p style="margin-left:630px; margin-top:30px; margin-bottom:30px;">{{date('d-m-Y', strtotime($data->original_sale_date))}}</p>
            <h1 class="concern">TO WHOM IT MAY CONCERN</h1>
            <p style="text-align:right;">Mobile No: {{$data->mobile}}</p>
            <table>
                <tr>
                    <td>
                        <p class="margin">Ref:</p>
                    </td>
                    <td>
                        <p class="margin">{{$data->print_ref}}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="margin">To:</p>
                    </td>
                    <td>
                        <p class="margin">The Registration Authority,</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="margin"></p>
                    </td>
                    <td>
                        <p class="margin">Bangladesh Road Transport Authority</p>
                    </td>
                </tr>
            </table>

            <h2 class="certify">This is to certify that we have sold new vehicle to:</h2>
            <span style="margin-right: 35px;">{{$data->customer_name}}</span><span>S/O. {{$data->father_name}}</span>
            <p>{{$data->address_one}}, {{$data->address_two}}</p>
            <h2 class="certify">On the following particulars</h2>
            <div class="table_first_page">
                <div>
                    <span class="sl">01.</span>
                    <span style="width:220px; display:inline-block;">Model/Make of Vehicle</span>
                    <span class="colon">:</span>
                    <span>{{ $data->model_make_of_vehicle }}</span>
                </div>
                <div>
                    <span class="sl">02.</span>
                    <span style="width:220px; display:inline-block;">Class of Vehicle</span>
                    <span class="colon">:</span>
                    <span>Motorcycle</span>
                </div>
                <div>
                    <span class="sl">03.</span>
                    <span style="width:220px; display:inline-block;">Chassis No.</span>
                    <span class="colon">:</span>
                    <span>{{$data->chassis_no}}</span>
                </div>
                <div>
                    <span class="sl">04.</span>
                    <span style="width:220px; display:inline-block;">Engine No.</span>
                    <span class="colon">:</span>
                    <span>{{$data->engine_no}}</span>
                </div>
                <div>
                    <span class="sl">05.</span>
                    <span style="width:220px; display:inline-block;">Key No.</span>
                    <span class="colon">:</span>
                    <span></span>
                </div>
                <div>
                    <span class="sl">06.</span>
                    <span style="width:220px; display:inline-block;">No. of Cylinder with CC</span>
                    <span class="colon">:</span>
                    <span>{{$data->no_of_cylinder_with_cc}}</span>
                </div>
                <div>
                    <span class="sl">07.</span>
                    <span style="width:220px; display:inline-block;">Colour of Vehicle</span>
                    <span class="colon">:</span>
                    <span>{{$data->color}}</span>
                </div>
                <div>
                    <span class="sl">08.</span>
                    <span style="width:220px; display:inline-block;">Size of Tyre</span>
                    <span class="colon">:</span>
                    <span>{{$data->size_of_tyre}}</span>
                </div>
                <div>
                    <span class="sl">09.</span>
                    <span style="width:220px; display:inline-block;">Year of Manufacture/Assamble</span>
                    <span class="colon">:</span>
                    <span>2021</span>
                </div>
                <div>
                    <span class="sl">10.</span>
                    <span style="width:220px; display:inline-block;">Horse Power</span>
                    <span class="colon">:</span>
                    <span>{{$data->horse_power}}</span>
                </div>
                <div>
                    <span class="sl">11.</span>
                    <span style="width:220px; display:inline-block;">Ladan Weight</span>
                    <span class="colon">:</span>
                    <span>{{$data->ladan_weight}}</span>
                </div>
                <div>
                    <span class="sl">12.</span>
                    <span style="width:220px; display:inline-block;">Wheel Base</span>
                    <span class="colon">:</span>
                    <span>{{$data->wheel_base}}</span>
                </div>
                <div>
                    <span class="sl">13.</span>
                    <span style="width:220px; display:inline-block;">Seating Capacity</span>
                    <span class="colon">:</span>
                    <span>2 PERSON</span>
                </div>
                <div>
                    <span class="sl">14.</span>
                    <span style="width:220px; display:inline-block;">Maker's Name</span>
                    <span class="colon">:</span>
                    <span>BAJAJ AUTO Lspan, INDIA</span>
                </div>

                <div>
                    <span class="sl">14.</span>
                    <span style="width:220px; display:inline-block;">Unit Price</span>
                    <span class="colon">:</span>
                    <span class="basic_price_vat">{{$data->basic_price_vat}}</span> + <span class="basic_price_vat">{{$data->sale_vat}}</span> = <span class="basic_price_vat">{{$data->unit_price_vat}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="page-break"></div>
    <div class="print_challan margin_right" style="height:11.3in; width:8.2in;">
        <div class="delivery_challan">
            <h2>Delivery Challan</h2>
        </div>
        <div class="challan">
            <!-- <span>Sale Date</span> -->
            <p style="margin-left:630px; margin-top:-30px; margin-bottom:30px;">{{date('d-m-Y', strtotime($data->original_sale_date))}}</p>
            <table>
                <tr>
                    <td>
                        <p class="margin">No:</p>
                    </td>
                    <td>
                        <p class="margin">{{$data->print_ref}}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="margin">M/s:</p>
                    </td>
                    <td>
                        <p class="margin">{{$data->customer_name}}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="margin"></p>
                    </td>
                    <td>
                        <p class="margin">S/O. {{$data->father_name}}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="margin"></p>
                    </td>
                    <td>
                        <p class="margin">{{$data->address_one}}, {{$data->address_two}}</p>
                    </td>
                </tr>
            </table>

            <p class="please">Please receive the undermentioned vehicles/with standart/Extra tools with spare wheel and accessories on the following particulars:</p>

            <div class="table_second_page">
                <div>
                    <span class="sl">01.</span>
                    <span style="width:220px; display:inline-block;">Model/Make of Vehicle</span>
                    <span class="colon">:</span>
                    <span>{{ $data->model_make_of_vehicle }}</span>
                </div>
                <div>
                    <span class="sl">02.</span>
                    <span style="width:220px; display:inline-block;">Class of Vehicle</span>
                    <span class="colon">:</span>
                    <span>Motorcycle</span>
                </div>
                <div>
                    <span class="sl">03.</span>
                    <span style="width:220px; display:inline-block;">Chassis No.</span>
                    <span class="colon">:</span>
                    <span>{{$data->chassis_no}}</span>
                </div>
                <div>
                    <span class="sl">04.</span>
                    <span style="width:220px; display:inline-block;">Engine No.</span>
                    <span class="colon">:</span>
                    <span>{{$data->engine_no}}</span>
                </div>
                <div>
                    <span class="sl">05.</span>
                    <span style="width:220px; display:inline-block;">Key No.</span>
                    <span class="colon">:</span>
                    <span></span>
                </div>
                <div>
                    <span class="sl">06.</span>
                    <span style="width:220px; display:inline-block;">No. of Cylinder with CC</span>
                    <span class="colon">:</span>
                    <span>{{$data->no_of_cylinder_with_cc}}</span>
                </div>
                <div>
                    <span class="sl">07.</span>
                    <span style="width:220px; display:inline-block;">Colour of Vehicle</span>
                    <span class="colon">:</span>
                    <span>{{$data->color}}</span>
                </div>
                <div>
                    <span class="sl">08.</span>
                    <span style="width:220px; display:inline-block;">Size of Tyre</span>
                    <span class="colon">:</span>
                    <span>{{$data->size_of_tyre}}</span>
                </div>
                <div>
                    <span class="sl">09.</span>
                    <span style="width:220px; display:inline-block;">Year of Manufacture/Assamble</span>
                    <span class="colon">:</span>
                    <span>2021</span>
                </div>
                <div>
                    <span class="sl">13.</span>
                    <span style="width:220px; display:inline-block;">Seating Capacity</span>
                    <span class="colon">:</span>
                    <span>2 PERSON</span>
                </div>
                <div class="remarks">
                    <p>REMARKS:</p>
                    <div>
                        <p>Purchage Date <span>{{date('d-m-Y', strtotime($data->purchage_date))}}</span></p>
                        <p>VAT Sale Date <span>{{date('d-m-Y', strtotime($data->vat_sale_date))}}</span></p>
                    </div>
                </div>
            </div>
            <p class="foot_note">Received with thanks the above mentioned Vehicle's with perfect condition along with tools and accessories.</p>
        </div>
    </div>
    @endforeach
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $('.basic_price_vat').each(function() {
        var monetary_value = $(this).text();
        var i = new Intl.NumberFormat('en-IN', {
            maximumFractionDigits: 0,
        }).format(monetary_value);
        $(this).text(i);
    });
</script>

</html>