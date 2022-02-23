<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRTA Stamp</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            display: table;
            margin: auto;
            line-height: 1.3;

        }

        .main_page {
            /* height: 13.2in; */
            width: 8.2in;
        }
    </style>
</head>

<body>
    <div class="main_page">
        <p style="margin-top: 545px; margin-left:3.7in">{{$data->customer_name}}</p>
        <p style="margin-left:1.5in; padding-top:10px;">{{$data->father_name}}</p>
        <p style="margin-left: 1.2in; margin-top:10px;">{{$data->address_one}} {{$data->address_two}}</p>
        <p style="margin-left:1.5in; margin-top:1.1in;">{{$data->eight_chassis}}{{$data->one_chassis}}{{$data->three_chassis}}{{$data->five_chassis}}</p>
        <p style="margin-left:4.5in; margin-top:-.230in;">{{$data->six_engine}}{{$data->five_engine}}</p>
        <P style="margin-left:3in;margin-top:15px;">BAJAJ POINT</P>
        <P style="margin-left: 1.8in; margin-top:14px;">67/B DIT ROAD, MALIBAGH CHOWDHURY PARA, DHAKA-1219</P>
    </div>

</body>

</html>