<!DOCTYPE html>
<html>

<head>

    <title>Complete HForm</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* color: white; */
        }

        body {
            font-family: TimesNewRoman;
            font-size: 22px;
            font-weight: 500;
        }

        html {
            display: table;
            margin: auto;
            line-height: 1.2;
        }

        .hform_page_one {
            height: 1546px;
            width: 1060px;
            /* border: 1px solid black; */
        }

        .section_one {
            display: flex;
            flex-direction: column;
        }

        .content_part_one {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0;

        }

        td {
            padding-right: 5px;
        }

        input {
            border: none;
            font-size: 15px;
            font-weight: 700;
            width: 100%;
            text-transform: uppercase;
            /* color: black; */
        }

        tr {
            vertical-align: baseline;
        }

        .button-42 {
            background-color: initial;
            background-image: linear-gradient(-180deg, #FF7E31, #E62C03);
            border-radius: 6px;
            box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: Inter, -apple-system, system-ui, Roboto, "Helvetica Neue", Arial, sans-serif;
            height: 40px;
            line-height: 40px;
            outline: 0;
            overflow: hidden;
            padding: 0 10px;
            pointer-events: auto;
            position: relative;
            text-align: center;
            touch-action: manipulation;
            user-select: none;
            /* -webkit-user-select: none; */
            vertical-align: top;
            white-space: nowrap;
            width: 100%;
            z-index: 9;
            border: 0;
            transition: box-shadow .2s;
        }

        .button-42:hover {
            box-shadow: rgba(253, 76, 0, 0.5) 0 3px 8px;
        }

        @media print {
            .page-break {
                display: block;
                /* height: 900px; */
            }

            .no_print {
                display: none;
            }
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin: auto;
            margin-bottom: 10px;
            width: 300px;
        }

        nav button {
            margin-left: 5px;
        }

        .toggle_color {
            color: white;
        }

        .toggle_input_color {
            color: white;
        }

        .sign {
            width: 350px;
            height: 60px;
            border: 1px solid black;
            display: inline-block;
        }

        .element {
            display: flex;
        }

        .specimen_signature {
            display: flex;
        }

        .sl {
            padding-right: 15px;
        }

        .photograph {
            width: 130px;
            height: 300px;
            text-align: center;
            position: absolute;
            top: 100px;
            right: 150px;
        }

        .top_text {
            margin-bottom: 10px;
        }

        .stamp_size {
            width: 130px;
            height: 150px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <nav class="no_print">
        <button id="hform" class="button-42">HForm</button>
        <button id="data" class="button-42">Data</button>
        <button id="both" class="button-42">Both</button>
        <button id="print" class="button-42">Print</button>
    </nav>

    <div class="hform_page_one">
        <div class="section_one">
            <div class="content_part_one" style="margin-top:15px;">
                <p>FORM OF APPLICATION FOR THE REGISTRATION OF MOTOR VEHICLE</p>
                <p style="margin-top:15px; text-decoration:underline;">To be filled in by the office</p>
                <p>Section-I</p>
            </div>
            <div>
                <table>
                    <tr>
                        <td style="width:170px;">Regn No</td>
                        <td>:</td>
                        <td style="width:180px;"></td>
                        <td>Date</td>
                        <td style="width:180px;">:</td>
                        <td></td>
                        <td>Prev. Regn No. (if any)</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Issue No</td>
                        <td>:</td>
                        <td></td>
                        <td>Date</td>
                        <td>:</td>
                        <td></td>
                        <td>Issued By</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Dairy No</td>
                        <td>:</td>
                        <td></td>
                        <td>Date</td>
                        <td>:</td>
                        <td></td>
                        <td>Received By</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Customer ID</td>
                        <td>:</td>
                        <td></td>
                        <td>District</td>
                        <td>:</td>
                        <td></td>
                        <td>Vehicle ID</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Veh. Description</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="class_of_vehicle" value="" />
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Call on date</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Refusal Date</td>
                        <td>:</td>
                        <td></td>
                        <td>Refusal Code</td>
                        <td>:</td>
                        <td></td>
                        <td>Refused by</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>P.O./Bank</td>
                        <td>:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Index No</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Remarks (if any)</td>
                        <td>:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="content_part_one">
                <p style="text-decoration:underline;">To be filled in by the owner</p>
                <p>Section-II</p>
                <p>(Owner Information)</p>
            </div>
            <div>
                <table>
                    <tr>
                        <td>1. Name of owner</td>
                        <td>:</td>
                        <td style="width:280px;">
                            <input type="text" class="customer_name" />
                        </td>
                        <td style="width:253px;">2. Date of birth</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="dob" />
                        </td>
                    </tr>
                    <tr>
                        <td>3. Father/Husband</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="father_name" />
                        </td>
                        <td>4. Nationality</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="nationality" value="bangladeshi" />
                        </td>
                    </tr>
                    <tr>
                        <td>5. Sex</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="sex" value="MALE" />
                        </td>
                        <td>6. Guardian's Name</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width:295px;">7. Owner's Address (One Only)</td>
                        <td>:</td>
                        <td colspan="4">
                            <input type="text" class="full_address" />
                        </td>
                    </tr>
                    <tr>
                        <td>8. Phone No. (if any)</td>
                        <td>:</td>
                        <td><input type="text" class="mobile" />
                        </td>
                        <td>9. P.O./Bank</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10. Joint owner</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="joint_owner" value="NO" />
                        </td>
                        <td>11. Owner type</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="owner_type" value="PRIVATE" />
                        </td>
                    </tr>
                    <tr>
                        <td>12. Hire</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="hire" value="NO" />
                        </td>
                        <td>13. Hire purchage</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="hire_purchage" value="NO" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div class="content_part_one">
                                <p>Section-II</p>
                                <p>(Vehicle Information)</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>14. Vehicle or trailer</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="vehicle_or_trailer" value="vehicle" />
                        </td>
                        <td>15. Prev. Regn. No. (if any)</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="prev_rg_no" value="NO" />
                        </td>
                    </tr>
                    <tr>
                        <td>14 a. Class of vehicle</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="class_of_vehicle" />
                        </td>
                        <td>15 a. Makers name</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="makers_name" />
                        </td>
                    </tr>
                    <tr>
                        <td>16. Type of body</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="type_of_body" />
                        </td>
                        <td>17. Makers country</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="makers_country" />
                        </td>
                    </tr>
                    <tr>
                        <td>18. Colour (cabin/body)</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="color" />
                        </td>
                        <td>19. Year of manufacture</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="year_of_manufacture" />
                        </td>
                    </tr>
                    <tr>
                        <td>20. Number of cylinders</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="no_of_cylinder_with_cc" value="1" />
                        </td>
                        <td>21. Chassis number</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="chassis_no" />
                        </td>
                    </tr>
                    <tr>
                        <td>22. Engine number</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="engine_no" />
                        </td>
                        <td>23. Fuel used</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="fuel_used" />
                        </td>
                    </tr>
                    <tr>
                        <td>24. Horse power</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="horse_power" />
                        </td>
                        <td>25. RPM</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="rpm" />
                        </td>
                    </tr>
                    <tr>
                        <td>26. Cubic capacity</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="cubic_capacity" />
                        </td>
                        <td>27. Seats (incl. driver)</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="seats_inc_driver" />
                        </td>
                    </tr>
                    <tr>
                        <td>28. No. of Standee</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="no_of_standee" />
                        </td>
                        <td>29. Wheel Base</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="wheel_base" />
                        </td>
                    </tr>
                    <tr>
                        <td>30. Unladen Weight (Kgs)</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="unladen_weight" />
                        </td>
                        <td>31. Maximum laden/<br>train weight (kgs)</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="ladan_weight" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div class="content_part_one">
                                <p>Section-IV</p>
                                <p>(Additional information for transport vehicle)</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>32. No. of tyres</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="no_of_tyres" value="2" />
                        </td>
                        <td>33. Tyres size</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="size_of_tyre" />
                        </td>
                    </tr>
                    <tr>
                        <td>34. No. of axle</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="no_of_axle" value="1" />
                        </td>
                        <td style="font-size:19px;">35. Maximum axle weight (kgs)</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="max_axle_weight" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>a) Front Axle (1)</td>
                        <td></td>
                        <td>
                            (2)
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>b) Central Axle (1)</td>
                        <td></td>
                        <td>
                            (2)
                            <span style="padding-left:89px;">(3)</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>c) Rear Axle (1)</td>
                        <td></td>
                        <td>
                            (2)
                            <span style="padding-left:89px;">(3)</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top:20px;">36. Dimentions(mm)</td>
                        <td>:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span style="padding-left:40px;">a. Overall Length</span></td>
                        <td style="text-align:right;">b) Overall Width</td>
                        <td colspan="3" style="text-align:center;"><span style="padding-left:116px;">c) Overall Height</span></td>
                    </tr>
                    <tr>
                        <td>37. Overhangs (%)</td>
                        <td>:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span style="padding-left:40px;">a. Front</span></td>
                        <td> <span style="margin-left:126px;">b) Rear</span> </td>
                        <td colspan="3"><span style="padding-left:233px;">c) Other</span></td>
                    </tr>
                    <tr>
                        <td colspan="6" style="padding-top:38px;">
                            38. A copy of the drawing showing the vehicle dimension specifications of the body and of the seating
                            arrangements approved by ....................................................on...............................................................is attached herewith
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div style="page-break-before: always"></div>
    <div class="hform_page_one">
        <div class="section_one">
            <div class="content_part_one" style="margin-top:0; margin-bottom:10px;">
                <p>Section V</p>
            </div>
            <div>
                <table width="100%">
                    <tbody>
                        <tr>
                            <td style="width:0;">39.</td>
                            <td colspan="7">Hire purchase/hypothecation information :</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="7">The vehicle is subject to hire purchase/hypothecation with :</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="width:170px;">a) Name</td>
                            <td>:</td>
                            <td colspan="5" style="text-align:right; padding-right:175px;">b) Date:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>c) Address</td>
                            <td colspan="6">:</td>
                        </tr>
                        <tr>
                            <td>40.</td>
                            <td colspan="7">Insurance information :</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>a) Policy no</td>
                            <td>:</td>
                            <td></td>
                            <td style="text-align:right; padding-left:25px;">b) Type of policy</td>
                            <td style="padding-left:25px;">:</td>
                            <td></td>
                            <td style="text-align:right; padding-right:65px;">c) Insurer's name & address :</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>d) Date of expiry</td>
                            <td colspan="6">:</td>
                        </tr>
                        <tr>
                            <td>41.</td>
                            <td colspan="7">Joint owner information :</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>a) Name</td>
                            <td>:</td>
                            <td colspan="5" style="padding-left: 355px;">b) Name :</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Father/Husband</td>
                            <td>:</td>
                            <td colspan="5" style="padding-left: 355px;">Father/Husband :</td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <div class="content_part_one" style="margin-top:15px; margin-bottom:15px;">
                                    <p>Section-VI</p>
                                    <p>(Declaration, Certificates and documents)</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>42.</td>
                            <td colspan="7">Declaration by owner :</td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%;">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>a)</td>
                        <td></td>
                        <td style="text-align:justify;">I the undersigned do hereby declare that to the best of my knowledge and belief, the information given and the
                            <span></span> documents enclosed (as per list attached) are true. I also declare that in case the papers/documents and information
                            furnished are found to be incorrect at any later stage, I shall be liable for legal action.
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top:30px;">Date</td>
                        <td>:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div style="text-align:center; padding-left:740px;">
                                <p>Signature of owner</p>
                                <p>Seal</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="9">Encl : List of documents</td>
                    </tr>
                    <tr>
                        <td colspan="9">43. Registered dealer's certificate :</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="8" style="text-align:justify;">I the undersigned do hereby certify that the vehicle in question has been sold by me/my firm and the ownership
                            documents attached with the application for registration are true. The information/specifications pertaining to the vehicle
                            are correct and the vehicle complies with all the requirements of the registration.</td>
                    </tr>
                    <tr>
                        <td style="padding-top:47px;">Date</td>
                        <td>:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div style="text-align:center; padding-left:650px;">
                                <p>Signature of registered dealer</p>
                                <p>Seal</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="9">Encl : List of documents</td>
                    </tr>
                    <tr>
                        <td colspan="9">44. Certificate by the Inspector of Motor Vehicles :</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="8" style="text-align:justify;">Certificate that the particulars pertaining to the owner and the vehicle (Chassis No.
                            <input style="display:inline-block; width:60px; font-size:18px;" type="text" class="five_chassis" /> Engine
                            No <input style="display:inline-block; width:60px; font-size:18px;" type="text" class="five_engine" /> ) given in the application match with the ownership documents attached to this
                            application. It is further certified that the vehicle complies with the registration requirements specified in the MV Act
                            and the Rules and/or Regulations made thereunder and the vehicle is not mechanically defective. The necessary
                            documents/papers are available as per list enclosed.
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top:52px;">Date</td>
                        <td>:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div style="text-align:center; padding-left:540px;">
                                <p>Signature of Inspector of Motor Vehicles</p>
                                <p>Official Seal</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="9">Encl : List of documents</td>
                    </tr>
                    <tr>
                        <td style="padding-top:22px;" colspan="9">45. Registration Status :</td>
                    </tr>
                </table>
                <table style="width:100%;">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Registration allowed/not allowed</td>
                        <td>
                            <div style="text-align:center; padding-left:350px;">
                                <p>Signature of Registering Authority</p>
                                <p>Seal</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top:20px;" colspan="6">46. Fees and Tax Accounts :</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="6" style="padding-left:45px; text-align:justify;">Necessary fees and taxes amounting to taka.............................................................................................has been paid to
                            PO/Bank...................................................................vide vouchers and receipts enclosed.</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td style="padding-top:55px;" colspan="5">
                            <div style="text-align:center;">
                                <p>Signature of owner</p>
                                <p>of his representative</p>
                            </div>
                        </td>
                        <td colspan="5" style="padding-left:560px;">Signature of dealing assistant</td>
                    </tr>
                    <tr>
                        <td colspan="10" style="text-align:center;">Counter signature by the registering authority</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div style="page-break-before: always"></div>
    <div class="hform_page_one" style="line-height:2.5; position:relative;">
        <div class="section_one">
            <div class="content_part_one" style="margin-top:0; margin-bottom:10px;">
                <h2 style="margin-bottom:200px;">OWNER'S PARTICULARS/SPECIMEN SIGNATURE</h2>
            </div>
            <table>
                <tbody>
                    <tr>
                        <td style="width:40px;">1.</td>
                        <td style="width:300px;">NAME</td>
                        <td>:</td>
                        <td><input type="text" class="customer_name" /></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td style="line-height:1.2;">FATHER/<br>HUSBAND</td>
                        <td>:</td>
                        <td><input type="text" class="father_name" /></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>ADDRESS</td>
                        <td>:</td>
                        <td><input type="text" class="full_address" /></td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>SEX</td>
                        <td>:</td>
                        <td><input type="text" class="sex" value="MALE" /></td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>PHONE NO</td>
                        <td>:</td>
                        <td><input type="text" class="mobile" /></td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>NATIONALITY</td>
                        <td>:</td>
                        <td><input type="text" class="nationality" value="bangladeshi" /></td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>DATE OF BIRTH</td>
                        <td>:</td>
                        <td><input type="text" class="dob" /></td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>GUARDIAN'S NAME</td>
                        <td>:</td>
                        <td><input type="text" class="guardian_name" /></td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>CHASSIS NO</td>
                        <td>:</td>
                        <td><input type="text" class="chassis_no" /></td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>ENGINE NO</td>
                        <td>:</td>
                        <td><input type="text" class="engine_no" /></td>
                    </tr>
                    <tr>
                        <td>11.</td>
                        <td>YEAR OF MFG</td>
                        <td>:</td>
                        <td><input type="text" class="year_of_manufacture" /></td>
                    </tr>
                    <tr>
                        <td>12.</td>
                        <td>PREV. REGN. NO. (IF ANY)</td>
                        <td>:</td>
                        <td><input type="text" class="prev_rg_no" /></td>
                    </tr>
                    <tr>
                        <td>13.</td>
                        <td>P.O./BANK</td>
                        <td>:</td>
                        <td><input type="text" class="po_bank" value="N/A" /></td>
                    </tr>
                </tbody>
            </table>
            <h3 style="margin-bottom:70px; margin-top:50px;">SPECIMEN SIGNATURE</h3>
            <div class="specimen_signature_parent">
                <div class="specimen_signature" style="margin-bottom:65px;">
                    <div class="element" style="margin-right:120px;">
                        <span class="sl">1.</span>
                        <span class="sign"></span>
                    </div>
                    <div class="element">
                        <span class="sl">2.</span>
                        <span class="sign"></span>
                    </div>
                </div>
                <div class="specimen_signature">
                    <div class="element" style="margin-right:120px;">
                        <span class="sl">3.</span>
                        <span class="sign"></span>
                    </div>
                    <div class="element">
                        <span class="sl">4.</span>
                        <span class="sign"></span>
                    </div>
                </div>
            </div>
            <div class="photograph" style="line-height:1.2;">
                <div class="top_text">
                    <p>3 Copies <br> Photograph</p>
                </div>
                <div class="stamp_size">
                    <p>Stamp</p>
                    <p>Size</p>
                    <p>Color Pic</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function() {
            function get_url_param() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                return id;
            }

            function fetchHformData() {
                var id = get_url_param();

                $.ajax({
                    url: "{{ route('print.get_data') }}",
                    type: "get",
                    data: {
                        id
                    },
                    success: function({
                        hform_data
                    }) {
                        Object.keys(hform_data).forEach(function(key) {
                            $(".hform_page_one").find(`.${key}`).val(hform_data[key]);
                        });
                        let chassis_no = `${hform_data.eight_chassis}${hform_data.one_chassis}${hform_data.three_chassis}${hform_data.five_chassis}`;
                        let engine_no = `${hform_data.six_engine}${hform_data.five_engine}`;
                        let full_address = `${hform_data.address_one} ${hform_data.address_two}`
                        $(".hform_page_one").find(`.chassis_no`).val(chassis_no);
                        $(".hform_page_one").find(`.engine_no`).val(engine_no);
                        $(".hform_page_one").find(`.full_address`).val(full_address);
                        $(".hform_page_one").find(`.nationality`).val('bangladeshi');
                    }
                });
            }
            fetchHformData();

            $('#hform').click(function() {
                $('.hform_page_one').removeClass('toggle_color');
                $("input").css({
                    "color": "#fff",
                });
            });
            $('#data').click(function() {
                $('.hform_page_one').addClass('toggle_color');
                $("input").css({
                    "color": "black"
                });
                $('.sign, .stamp_size').css({
                    "borderColor": "#fff",
                });
            });
            $('#both').click(function() {
                $('.hform_page_one').removeClass('toggle_color');
                $("input").css({
                    "color": "black"
                });
                $('.sign, .stamp_size').css({
                    "borderColor": "#000",
                });
            });
            $('#print').click(function() {
                window.print();
            });
        })
    </script>
</body>

</html>