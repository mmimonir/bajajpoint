<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Generate PDF From View</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/pdf.css') }}"> -->
    <style>
        /* @font-face {
            font-family: "Helvetica";
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            src: url("http://fonts.cdnfonts.com/css/helvetica-neue-9");
        } */

        body {
            font-family: Arial;
            font-size: 13px;
            font-weight: 500;
        }

        html {
            margin: 0px;
            padding: 0px;
        }

        .hform_page_one {
            display: block;
            margin-top: 380px;
            line-height: 80%;
        }

        .section_two,
        .section_three {
            width: 100%;
        }

        .left_content {
            width: 50%;
            float: left;
        }

        .right_content {
            width: 50%;
            float: right;
            margin-top: 97px;
        }

        .tyre_size {
            margin-top: 285px;
            margin-left: 100%;
            width: 100%;
            padding-left: 164px;
        }

        .class_of_vehicle {
            margin-top: 115px;
            padding-left: 182px;
        }

        .color {
            padding-top: 16px;
            padding-left: 210px;
        }

        .no_of_cylinders {
            padding-left: 210px;
            width: 100%;
            margin-top: -4px;
        }

        .unladen_weight {
            padding-top: 20px;
            padding-left: 200px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    @foreach ($print_data as $data)
    <div class="hform_page_one">
        <div class="section_two">
            <p class="name_of_owner" style="padding-left: 160px;">{{$data->customer_name}}</p>
            <p class="father_name" style="padding-left: 168px;">{{$data->father_name}}</p>
            <p class="owner_address" style="padding-left: 255px; padding-top:15px;">{{$data->address_one.", ".$data->address_two}}</p>
            <p class="phone_no" style="padding-left: 180px;">{{$data->mobile}}</p>
        </div>
        <div class="section_three">
            <div class="left_content">
                <p class="class_of_vehicle">MOTORCYCLE</p>
                <p class="color">{{$data->color}}</p>
                <p class="no_of_cylinders">{{$data->no_of_cylinder_with_cc}}</p>
                <p class="engine_no" style="padding-left: 175px; margin-top:-2px;">{{$data->six_engine.$data->five_engine}}</p>
                <p class="horse_power" style="padding-left: 155px; margin-top:-5px">{{$data->horse_power}}</p>
                <p class="cubic_capacity" style="padding-left: 170px; margin-top:-2px">{{$data->cubic_capacity}}</p>
                <p class="unladen_weight">{{$data->unladen_weight}}</p>
            </div>
            <div class="right_content">
                <p class="makers_name" style="padding-left: 192px;">BAJAJ AUTO LTD, INDIA</p>
                <p class="makers_country" style="padding-left: 199px;">INDIA</p>
                <p class="year_of_manufacture" style="padding-left: 220px;">{{$data->year_of_manufacture}}</p>
                <p class="chassis_no" style="padding-left: 190px; margin-top:-5px;">{{$data->eight_chassis.$data->one_chassis.$data->three_chassis.$data->five_chassis}}</p>
                <p class="fuel_used" style="padding-left:154px; margin-top:-5px;">PETROL</p>
                <p class="rpm" style="padding-left:125px;">{{$data->rpm}}</p>
                <p class="seats" style="padding-left:208px; margin-top:-2px;">2 PERSON</p>
                <p class="wheel_base" style="padding-left:164px;">{{$data->wheel_base}}</p>
                <p class="laden_weight" style="padding-left:225px;">{{$data->ladan_weight}}</p>
            </div>
        </div>
        <div class="section_four">
            <div class="right_content">
                <p class="tyre_size">{{$data->size_of_tyre}}</p>
            </div>
        </div>
    </div>


    <div class="page-break"></div>
    <div class="hform_page_two" style="margin-top:110px; font-size:14px;">
        <div class="content" style="margin-left:192px;">
            <p class="name_of_owner">{{$data->customer_name}}</p>
            <p class="father_name">{{$data->father_name}}</p>
            <p class="owner_address" style="margin-top:35px;">{{$data->address_one.", ".$data->address_two}}</p>
            <p class="phone_no" style="margin-top:50px; padding-top:18px;">{{$data->mobile}}</p>
            <p class="chassis_no" style="margin-top:160px;">{{$data->eight_chassis.$data->one_chassis.$data->three_chassis.$data->five_chassis}}</p>
            <p class="engine_no">{{$data->six_engine.$data->five_engine}}</p>
            <p class="year_of_manufacture">{{$data->year_of_manufacture}}</p>
        </div>
    </div>
    @endforeach

</body>

</html>