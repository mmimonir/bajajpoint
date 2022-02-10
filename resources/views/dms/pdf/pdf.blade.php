<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Generate PDF From View</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/pdf.css') }}"> -->
    <style>
        @font-face {
            font-family: "Helvetica";
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            src: url("http://fonts.cdnfonts.com/css/helvetica-neue-9");
        }

        body {
            font-family: Helvetica, sans-serif;
        }

        html {
            margin: 0px;
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
            margin-top: 192px;
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
            padding: 25px 0px;
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
    </style>
</head>

<body>
    <div class="print_certificate margin_right">
        @foreach ($print_data as $data)
        <div class="all_code">
            <span>{{$data->challan_no}}</span><span>{{$data->uml_mushak_no}}</span><span>{{$data->approval_no}}</span><span>{{$data->invoice_no}}</span><span>{{$data->sale_mushak_no}}</span><span>{{$data->dealer}}</span><span>{{$data->vat_process}}</span><span>{{$data->tr_number}}</span>
        </div>
        <div class="certificate">
            <span>Sale Date : {{$data->original_sale_date}}</span>
            <span>Mobile No: {{$data->mobile}}</span>
            <h1 class="concern">TO WHOM IT MAY CONCERN</h1>
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
            <table class="table_first_page">
                <tbody>
                    <tr>
                        <td class="sl">1.</td>
                        <td>Model/Make of Vehicle</td>
                        <td class="colon">:</td>
                        <td>{{ $data->model_make_of_vehicle }}</td>
                    </tr>
                    <tr>
                        <td class="sl">2.</td>
                        <td>Class of Vehicle</td>
                        <td class="colon">:</td>
                        <td>Motorcycle</td>
                    </tr>
                    <tr>
                        <td class="sl">3.</td>
                        <td>Chassis No.</td>
                        <td class="colon">:</td>
                        <td>{{$data->chassis_no}}</td>
                    </tr>
                    <tr>
                        <td class="sl">4.</td>
                        <td>Engine No.</td>
                        <td class="colon">:</td>
                        <td>{{$data->engine_no}}</td>
                    </tr>
                    <tr>
                        <td class="sl">5.</td>
                        <td>Key No.</td>
                        <td class="colon">:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="sl">6.</td>
                        <td>No. of Cylinder with CC</td>
                        <td class="colon">:</td>
                        <td>{{$data->no_of_cylinder_with_cc}}</td>
                    </tr>
                    <tr>
                        <td class="sl">7.</td>
                        <td>Colour of Vehicle</td>
                        <td class="colon">:</td>
                        <td>{{$data->color}}</td>
                    </tr>
                    <tr>
                        <td class="sl">8.</td>
                        <td>Size of Tyre</td>
                        <td class="colon">:</td>
                        <td>{{$data->size_of_tyre}}</td>
                    </tr>
                    <tr>
                        <td class="sl">9.</td>
                        <td>Year of Manufacture/Assamble</td>
                        <td class="colon">:</td>
                        <td>2021</td>
                    </tr>
                    <tr>
                        <td class="sl">10.</td>
                        <td>Horse Power</td>
                        <td class="colon">:</td>
                        <td>{{$data->horse_power}}</td>
                    </tr>
                    <tr>
                        <td class="sl">11.</td>
                        <td>Ladan Weight</td>
                        <td class="colon">:</td>
                        <td>{{$data->ladan_weight}}</td>
                    </tr>
                    <tr>
                        <td class="sl">12.</td>
                        <td>Wheel Base</td>
                        <td class="colon">:</td>
                        <td>{{$data->wheel_base}}</td>
                    </tr>
                    <tr>
                        <td class="sl">13.</td>
                        <td>Seating Capacity</td>
                        <td class="colon">:</td>
                        <td>2 PERSON</td>
                    </tr>
                    <tr>
                        <td class="sl">14.</td>
                        <td>Maker's Name</td>
                        <td class="colon">:</td>
                        <td>BAJAJ AUTO LTD, INDIA</td>
                    </tr>
                    <tr>
                        <td class="sl">14.</td>
                        <td>Unit Price</td>
                        <td class="colon">:</td>
                        <td>{{$data->basic_price_vat}} + {{$data->sale_vat}} = {{$data->unit_price_vat}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div style="break-after:page"></div>
    <div class="print_challan margin_right">
        <div class="delivery_challan">
            <h2>Delivery Challan</h2>
        </div>
        <div class="challan">
            <!-- <span>Sale Date</span> -->
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

            <table class="table_first_page">
                <tbody>
                    <tr>
                        <td class="sl">1.</td>
                        <td>Model/Make of Vehicle</td>
                        <td class="colon">:</td>
                        <td>{{ $data->model_make_of_vehicle }}</td>
                    </tr>
                    <tr>
                        <td class="sl">2.</td>
                        <td>Class of Vehicle</td>
                        <td class="colon">:</td>
                        <td>Motorcycle</td>
                    </tr>
                    <tr>
                        <td class="sl">3.</td>
                        <td>Chassis No.</td>
                        <td class="colon">:</td>
                        <td>{{$data->chassis_no}}</td>
                    </tr>
                    <tr>
                        <td class="sl">4.</td>
                        <td>Engine No.</td>
                        <td class="colon">:</td>
                        <td>{{$data->engine_no}}</td>
                    </tr>
                    <tr>
                        <td class="sl">5.</td>
                        <td>Key No.</td>
                        <td class="colon">:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="sl">6.</td>
                        <td>No. of Cylinder with CC</td>
                        <td class="colon">:</td>
                        <td>{{$data->no_of_cylinder_with_cc}}</td>
                    </tr>
                    <tr>
                        <td class="sl">7.</td>
                        <td>Colour of Vehicle</td>
                        <td class="colon">:</td>
                        <td>{{$data->color}}</td>
                    </tr>
                    <tr>
                        <td class="sl">8.</td>
                        <td>Size of Tyre</td>
                        <td class="colon">:</td>
                        <td>{{$data->size_of_tyre}}</td>
                    </tr>
                    <tr>
                        <td class="sl">9.</td>
                        <td>Year of Manufacture/Assamble</td>
                        <td class="colon">:</td>
                        <td>2021</td>
                    </tr>
                    <tr>
                        <td class="sl">13.</td>
                        <td>Seating Capacity</td>
                        <td class="colon">:</td>
                        <td>2 PERSON</td>
                    </tr>
                </tbody>
                <div class="remarks">
                    <p>REMARKS:</p>
                    <div>
                        <p>Purchage Date <span>{{$data->purchage_date}}</span></p>
                        <p>VAT Sale Date <span>{{$data->vat_sale_date}}</span></p>
                    </div>
                </div>
            </table>
            <p class="foot_note">Received with thanks the above mentioned Vehicle's with perfect condition along with tools and accessories.</p>
        </div>
    </div>
    @endforeach
</body>

</html>