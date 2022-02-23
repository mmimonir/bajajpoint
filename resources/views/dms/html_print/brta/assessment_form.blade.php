<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRTA Assessment Form</title>
    <style>
        html {
            display: table;
            margin: auto;
            line-height: 1.3;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 2mm;
        }

        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        .main_page {
            height: 11.6in;
            width: 8.1in;
            /* border: 1px solid black; */
        }

        .top_text {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            align-items: center;
            padding: 2px;
        }

        table {
            width: 8in;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }

        .text-center {
            text-align: center;
        }

        .h3-format {
            font-size: 18px;
            text-align: center;
            margin: 10px;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="main_page">
        <div class="top_text" style="margin-top:20px; font-weight:bold;">
            <p>Government of the People's Republic of Bangladesh</p>
            <p>Bangladesh Road Transport Authority</p>
            <p>Allenbury, Tejgaon, Dhaka-1215</p>
            <p>(Assessment Form)</p>
        </div>
        <table class="center" style="margin-top:15px;">
            <tr class="text-center">
                <td style="width:25%;">Name of Circle/Zone</td>
                <td style="width:25%;"></td>
                <td style="width:25%;">District</td>
                <td style="width:25%;"></td>
            </tr>
            <tr class="text-center">
                <td>Branch Name</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <table class="center" style="margin-top:15px;">
            <tr>
                <td style="width:25%; font-weight:bold;">Vehicle Information</td>
                <td style="width:25%;"></td>
                <td style="width:25%; font-weight:bold;">Permit Information</td>
                <td style="width:25%;"></td>
            </tr>
            <tr>
                <td style="width:25%;">Registration No</td>
                <td style="width:25%;"></td>
                <td style="width:25%;">No of Districts</td>
                <td style="width:25%;"></td>
            </tr>
            <tr>
                <td style="width:25%;">Chassis No</td>
                <td style="width:25%; font-weight:bold;">{{$data->eight_chassis}}{{$data->one_chassis}}{{$data->three_chassis}}{{$data->five_chassis}}</td>
                <td style="width:25%;">No of Routes</td>
                <td style="width:25%;"></td>
            </tr>
            <tr>
                <td style="width:25%;">Engine No</td>
                <td style="width:25%; font-weight:bold;">{{$data->six_engine}}{{$data->five_engine}}</td>
                <td style="width:25%;">Driving Licence Information</td>
                <td style="width:25%;"></td>
            </tr>
            <tr>
                <td style="width:25%;">Vehicle Type</td>
                <td style="width:25%; font-weight:bold;">{{$data->class_of_vehicle}}</td>
                <td style="width:25%;">Licence No</td>
                <td style="width:25%;"></td>
            </tr>
            <tr>
                <td style="width:25%;">Owner Name</td>
                <td style="width:25%; font-weight:bold;">{{$data->customer_name}}</td>
                <td style="width:25%;">Licence Type</td>
                <td style="width:25%;"></td>
            </tr>
            <tr>
                <td style="width:25%;">Father's Name & Address</td>
                <td style="width:25%; font-weight:bold;">{{$data->father_name}}</td>
                <td style="width:25%;">Person Name</td>
                <td style="width:25%;"></td>
            </tr>
            <tr>
                <td style="width:25%;">Owner Mobile</td>
                <td style="width:25%; font-weight:bold;">{{$data->mobile}}</td>
                <td style="width:25%;">Father's Name & Address</td>
                <td style="width:25%;"></td>
            </tr>
            <tr>
                <td style="width:25%;">Seating Capacity/Weight</td>
                <td style="width:25%; font-weight:bold;">{{$data->cubic_capacity}}/{{$data->seating_capacity}}, {{$data->ladan_weight}}</td>
                <td style="width:25%;"></td>
                <td style="width:25%;"></td>
            </tr>
            <tr>
                <td style="width:25%;">Address/Owner Mobile No</td>
                <td colspan=3 style="font-weight:bold;">{{$data->address_two}}</td>
            </tr>
        </table>
        <h3 class="h3-format">Fee Assessment</h3>
        <table class="center fee_assessment">
            <tr style="text-align:center;">
                <th>SL No</th>
                <th style="width:250px;">Fee Particulars</th>
                <th>Main Fee</th>
                <th>Inspection Fee</th>
                <th>Label Fee</th>
                <th>Application Fee</th>
                <th>Law Fee</th>
                <th>Other Fee</th>
                <th style="width: 80px;">Total Fee</th>
            </tr>
            <tbody>
                <tr>
                    <td rowspan="2" class="text-center">1</td>
                    <td>a) New Registration</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>b) Coaversion of Registration</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td>Transfer of Ownership (T.O)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2" class="text-center">3</td>
                    <td>a) Issue of tex token</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>b) Renewal of tax token</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2" class="text-center">4</td>
                    <td>a) Issue of Certificate of Fitness(C.F.)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>b) Renewal of Certificate of Fitness</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2" class="text-center">5</td>
                    <td>a) Issue of Route Permit (R.P) Contract Carriage/private Temporary of Permanent</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>b) Renewal of Route Permit</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="7" class="text-center">6</td>
                    <td>a) Issue of Driving Licence (D.L) Professional/non professional</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>b) Renewal of Driving Licence (D.L) Professional/non professional</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>c) Issue/Renewal of Learner Licence</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>d) Issue/Renewal of Conductor Licence</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>e) Registration of Driving School</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>f) Issue of Instructor Licence</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>g) Other</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="11" class="text-center">7</td>
                    <td>a) Engine Charge</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>b) Color/Address Change</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>c) Endorsment</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>d) any Correction</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>e) i) Issue of New Trade Certificate</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>ii) Renewal of Trade Certificate</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>(Garage Number)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>f) Issue of Duplicate Registration</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Certificate/Duplicate C.F, Duplicate C.F Tax Token</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>g) Others (khat any...........)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>