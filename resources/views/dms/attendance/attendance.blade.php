@extends('layouts.app')
@section('title', 'Employee Attendance')

@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection
@push('page_css')
<style>
    .select {
        margin: 0;
        padding: 0;
        -webkit-appearance: none;
        -moz-appearance: none;
        text-indent: 1px;
        text-overflow: '';
        border: none;
        width: 20px;
        background-color: #E6E6E6;
        text-align: center;
        border: 1px solid green;
        border-radius: 5px;

    }

    h4,
    h3,
    h5 {
        font-weight: bold;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-success collapsed-card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Attendance Details</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                            <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-inline justify-content-center align-items-center">
                        <div class="form-group">
                            <label for="exampleSelect">Select an Employee</label>
                            <select name="employee_id" class="form-control" id="employee_id" style="width:200px;margin-left:15px;">
                                <option value="1">Md Monirul Islam</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-left:15px;">
                            <label for="exampleSelect">Select an Year</label>
                            <select name="attendance_year" class="form-control" id="attendance_year" style="width:100px;margin-left:15px;">
                                <option selected>
                                    Year
                                </option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-left:15px;">
                            <label for="exampleSelect">Select an Month</label>
                            <select name="attendance_month" class="form-control" id="attendance_month" style="width:100px;margin-left:15px;">
                                <option selected>
                                    Month
                                </option>
                                <option value="1">
                                    January
                                </option>
                                <option value="2">
                                    February
                                </option>
                                <option value="3">
                                    March
                                </option>
                                <option value="4">
                                    April
                                </option>
                                <option value="5">
                                    May
                                </option>
                                <option value="6">
                                    June
                                </option>
                                <option value="7">
                                    July
                                </option>
                                <option value="8">
                                    August
                                </option>
                                <option value="9">
                                    September
                                </option>
                                <option value="10">
                                    October
                                </option>
                                <option value="11">
                                    November
                                </option>
                                <option value="12">
                                    December
                                </option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-left:15px;">
                            <button type="button" class="btn btn-dark">Load Attendance</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:-15px;">
            <div class="card card-info mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                <div class="card-header bg-dark" style="background-color:#343A40;">
                    <h3 class="card-title">Attendance</h3>
                </div>
                <div class="card-body">
                    <div class="px-5 py-4 py-lg-0 border-right-lg justify-content-center d-flex flex-column">
                        <h3 class="mb-0 text-center text-bold mb-2">Attendance Date/Time Picker</h3>
                        <input class="text-bold p-2 w-25 m-auto" id="attendanc_picker" type="datetime-local" class="form-control" name="attendanc_picker">
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <div class="table-responsive">
                        <table class="table  mb-0">
                            <thead>
                                <tr>
                                    <th>Employee List</th>
                                    @for ($i = 1; $i <= 31; $i++) <th style="padding:0; vertical-align: middle; text-align:center;">{{$i}}</th>

                                        @endfor

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control">
                                            <option value="1">Md Monirul Islam</option>
                                        </select>
                                    </td>
                                    @for ($i = 1; $i <= 31; $i++) <td style="padding:0; vertical-align: middle; text-align:center;">
                                        <input type="hidden" name="employee_id" />
                                        <input type="hidden" name="day" Value="{{$i}}" />
                                        <select class="select attendance" name="attendance[]">
                                            <option></option>
                                            <option value="A">A</option>
                                            <option value="P">P</option>
                                            <option value="L">L</option>
                                            <option value="H">H</option>
                                            <option value="F">F</option>
                                        </select>
                                        </td>
                                        @endfor
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-sm-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <div class="px-5 py-4 py-lg-0 border-right-lg w-100">
                            <h4 class="mb-0 text-center">Working Days</h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <h1 class=" mb-0 mr-2">24</h1>
                            </div>
                        </div>
                        <div class="px-5 py-4 py-lg-0 border-right-lg w-100">
                            <h4 class="mb-0 text-center">Absent Days</h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <h1 class=" mb-0 mr-2">2</h1>
                            </div>
                        </div>
                        <div class="px-5 py-4 py-lg-0 border-right-lg w-100">
                            <h4 class="mb-0 text-center">Total Friday</h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <h1 class=" mb-0 mr-2">4</h1>
                            </div>
                        </div>
                        <div class="px-5 py-4 py-lg-0 border-right-lg w-100">
                            <h4 class="mb-0 text-center">Govt Holiday</h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <h1 class=" mb-0 mr-2">4</h1>
                            </div>
                        </div>
                        <div class="px-5 py-4 py-lg-0 border-right-lg w-100">
                            <h4 class="mb-0 text-center">Total Leave</h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <h1 class=" mb-0 mr-2">4</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-sm-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <div class="px-5 py-4 py-lg-0 border-right-lg w-100">
                            <h5 class="mb-0 text-center">Gross Salary</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <h5 class="mb-0 mr-2">10,000/-</h5>
                            </div>
                        </div>
                        <div class="px-5 py-4 py-lg-0 border-right-lg w-100">
                            <h5 class="mb-0 text-center">Advance</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <h5 class="mb-0 mr-2">2,000/-</h5>
                            </div>
                        </div>
                        <div class="px-5 py-4 py-lg-0 border-right-lg w-100">
                            <h5 class="mb-0 text-center">Absent Deduction</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <h5 class="mb-0 mr-2">1,000/-</h5>
                            </div>
                        </div>
                        <div class="px-5 py-4 py-lg-0 border-right-lg w-100">
                            <h5 class="mb-0 text-center">Total Deduction</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <h5 class="mb-0 mr-2">2,000/-</h5>
                            </div>
                        </div>
                        <div class="px-5 py-4 py-lg-0 border-right-lg w-100">
                            <h5 class="mb-0 text-center">Total Payable</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <h5 class="mb-0 mr-2">8,000/-</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap mb-3">
                        <div>
                            <div class="card-title mb-0">Attendance Logs.</div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> Leave </th>
                                    <th> Effective Hours </th>
                                    <th> Gross Hours </th>
                                    <th>Arrival</th>
                                    <th>Log</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12 Sep 2020 </td>
                                    <td>
                                        SunW-OFF
                                    </td>
                                    <td>
                                        6:18 + hrs
                                    </td>
                                    <td> 6:18 + hrs</td>
                                    <td> 0:42:37 late</td>
                                    <td><i class="mdi mdi-check-circle mdi-18px text-success mr-2"></i>Present</td>
                                </tr>
                                <tr>
                                    <td>14 Mar 2020 </td>
                                    <td>Leave</td>
                                    <td>8:18 hrs</td>
                                    <td>8:18 hrs</td>
                                    <td>0:06:25 late</td>
                                    <td><i class="mdi mdi-check-circle mdi-18px text-success mr-2"></i>Present</td>
                                </tr>
                                <tr>
                                    <td>26 Feb 2020</td>
                                    <td>Unpaid Leave</td>
                                    <td>7:09 hrs</td>
                                    <td>7:09 hrs</td>
                                    <td>0:38:13 late</td>
                                    <td><i class="mdi mdi-check-circle mdi-18px text-success mr-2"></i>Present</td>
                                </tr>
                                <tr>
                                    <td>22 Apr 2020</td>
                                    <td> Unpaid Leave </td>
                                    <td>6:42 hrs</td>
                                    <td>6:42 hrs</td>
                                    <td>0:12:27 late</td>
                                    <td><i class="mdi mdi-information mdi-18px text-danger mr-2"></i>Out missing</td>
                                </tr>
                                <tr>
                                    <td>26 Oct 2020</td>
                                    <td>12 Sep 2020</td>
                                    <td>8:09 hrs</td>
                                    <td>8:09 hrs</td>
                                    <td>0:49:23 late</td>
                                    <td><i class="mdi mdi-check-circle mdi-18px text-success mr-2"></i>Present</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('datatable')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('script')

<script>
    $(document).ready(function() {

        function set_local_datetime() {
            var now = new Date();
            var utcString = now.toISOString().substring(0, 19);
            var year = now.getFullYear();
            var month = now.getMonth() + 1;
            var day = now.getDate();
            var hour = now.getHours();
            var minute = now.getMinutes();
            var second = now.getSeconds();
            var localDatetime = year + "-" +
                (month < 10 ? "0" + month.toString() : month) + "-" +
                (day < 10 ? "0" + day.toString() : day) + "T" +
                (hour < 10 ? "0" + hour.toString() : hour) + ":" +
                (minute < 10 ? "0" + minute.toString() : minute) +
                utcString.substring(16, 19);
            return localDatetime;
        }
        $('#attendanc_picker').val(set_local_datetime());

        $(document).on('change', '.attendance', function() {

            _this = $(this);
            let parent_td = $(this).parent();
            let attendance_day = parent_td.find('input[name="day"]').val();
            let employee_id = parent_td.find('input[name="employee_id"]').val();
            let attendance = $(this).val();

            let attendance_pick = $('#attendanc_picker').val();


            // let attendance_month = $('#attendance_month').val();
            // let attendance_year = $('#attendance_year').val();

            // console.log(attendance_day, employee_id, attendance, attendance_month, attendance_year);

            if (attendance == 'A') {
                _this.css('background-color', 'red').css('color', 'white').css('border', 'none');
            } else if (attendance == 'P') {
                _this.css('background-color', 'green').css('color', 'white').css('border', 'none');
            } else if (attendance == 'L') {
                _this.css('background-color', 'black').css('color', 'white').css('border', 'none');
            } else if (attendance == 'H') {
                _this.css('background-color', 'purple').css('color', 'white').css('border', 'none');
            } else if (attendance == 'F') {
                _this.css('background-color', '#1E64AF').css('color', 'white').css('border', 'none');
            } else if (attendance == '') {
                _this.css('background-color', '#E6E6E6').css('color', 'black').css('border', '1px solid green');
            }

        });

        function create_attendance_year() {
            let dateDropdown = document.getElementById("attendance_year");

            let currentYear = new Date().getFullYear();
            let earliestYear = 2010;
            while (currentYear >= earliestYear) {
                let dateOption = document.createElement("option");
                dateOption.text = currentYear;
                dateOption.value = currentYear;
                dateDropdown.add(dateOption);
                currentYear -= 1;
            }
        }
        create_attendance_year();
        $('#attendance_year').val(new Date().getFullYear());
        $('#attendance_month').val(new Date().getMonth() + 1);
    });
</script>
@endsection