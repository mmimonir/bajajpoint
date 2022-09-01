<!DOCTYPE html>
<html>

<head>
    <title>Complete HForm</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
            height: 1500px;
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
        }

        tr {
            vertical-align: baseline;
        }

        @media print {
            .page-break {
                display: block;
                height: 900px;
            }
        }
    </style>
</head>

<body>

    <div class="hform_page_one">
        <div class="section_one">
            <div class="content_part_one">
                <p>FORM OF APPLICATION FOR THE REGISTRATION OF MOTOR VEHICLE</p>
                <p>To be filled in by the office</p>
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
                            <input type="text" name="vahicle_description" value="Motorcycle" />
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
                <p>To be filled in by the owner</p>
                <p>Section-II</p>
                <p>(Owner Information)</p>
            </div>
            <div>
                <table>
                    <tr>
                        <td>1. Name of owner</td>
                        <td>:</td>
                        <td style="width:280px;">
                            <input type="text" name="vahicle_description" value="MD MONIRUZZAM KHAN LITON" />
                        </td>
                        <td style="width:253px;">2. Date of birth</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="19.01.1987" />
                        </td>
                    </tr>
                    <tr>
                        <td>3. Father/Husband</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="LATE NURUL ISLAM FARUQI" />
                        </td>
                        <td>4. Nationality</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="BANGLADESHI" />
                        </td>
                    </tr>
                    <tr>
                        <td>5. Sex</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="MALE" />
                        </td>
                        <td>6. Guardian's Name</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width:295px;">7. Owner's Address (One Only)</td>
                        <td>:</td>
                        <td colspan="4">
                            <input type="text" name="vahicle_description" value="BAJAJ POINT, 67/B MALIBAGH CHOWDHURY PARA, DHAKA-1219" />
                        </td>
                    </tr>
                    <tr>
                        <td>8. Phone No. (if any)</td>
                        <td>:</td>
                        <td><input type="text" name="vahicle_description" value="01974353555" />
                        </td>
                        <td>9. P.O./Bank</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10. Joint owner</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="NO" />
                        </td>
                        <td>11. Owner type</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="PRIVATE" />
                        </td>
                    </tr>
                    <tr>
                        <td>12. Hire</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="NO" />
                        </td>
                        <td>13. Hire purchage</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="NO" />
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
                            <input type="text" name="vahicle_description" value="vehicle" />
                        </td>
                        <td>15. Prev. Regn. No. (if any)</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="NO" />
                        </td>
                    </tr>
                    <tr>
                        <td>14 a. Class of vehicle</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="Motor cycle" />
                        </td>
                        <td>15 a. Makers name</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="bajaj auto ltd, india" />
                        </td>
                    </tr>
                    <tr>
                        <td>16. Type of body</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="Motor cycle (large)" />
                        </td>
                        <td>17. Makers country</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="india" />
                        </td>
                    </tr>
                    <tr>
                        <td>18. Colour (cabin/body)</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="black/red" />
                        </td>
                        <td>19. Year of manufacture</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="2021" />
                        </td>
                    </tr>
                    <tr>
                        <td>20. Number of cylinders</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="1" />
                        </td>
                        <td>21. Chassis number</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="psua11cy2mtc96995" />
                        </td>
                    </tr>
                    <tr>
                        <td>22. Engine number</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="dhxcmm10219" />
                        </td>
                        <td>23. Fuel used</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="petrol" />
                        </td>
                    </tr>
                    <tr>
                        <td>24. Horse power</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="14" />
                        </td>
                        <td>25. RPM</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="8000" />
                        </td>
                    </tr>
                    <tr>
                        <td>26. Cubic capacity</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="150" />
                        </td>
                        <td>27. Seats (incl. driver)</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="2" />
                        </td>
                    </tr>
                    <tr>
                        <td>28. No. of Standee</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="" />
                        </td>
                        <td>29. Wheel Base</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="1345" />
                        </td>
                    </tr>
                    <tr>
                        <td>30. Unladen Weight (Kgs)</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="146" />
                        </td>
                        <td>31. Maximum laden/<br>train weight (kgs)</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="286" />
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
                            <input type="text" name="vahicle_description" value="2" />
                        </td>
                        <td>33. Tyres size</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="f90/90-17r120/80-17" />
                        </td>
                    </tr>
                    <tr>
                        <td>34. No. of axle</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="1" />
                        </td>
                        <td style="font-size:19px;">35. Maximum axle weight (kgs)</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="vahicle_description" value="" />
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
                        <td>36. Dimentions(mm)</td>
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
                        <td colspan="6">
                            38. A copy of the drawing showing the vehicle dimension specifications of the body and of the seating
                            arrangements approved by ....................................................on...............................................................is attached herewith
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- <div class="page-break"></div> -->
</body>

</html>