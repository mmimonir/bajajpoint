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
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                <div class="card-header bg-dark" style="background-color:#343A40;">
                    <h3 class="card-title">Attendance</h3>
                </div>
                <div class="card-header">
                    <div class="form-inline">
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
                                <option value="January">
                                    January
                                </option>
                                <option value="February">
                                    February
                                </option>
                                <option value="March">
                                    March
                                </option>
                                <option value="April">
                                    April
                                </option>
                                <option value="May">
                                    May
                                </option>
                                <option value="June">
                                    June
                                </option>
                                <option value="July">
                                    July
                                </option>
                                <option value="August">
                                    August
                                </option>
                                <option value="September">
                                    September
                                </option>
                                <option value="October">
                                    October
                                </option>
                                <option value="November">
                                    November
                                </option>
                                <option value="December">
                                    December
                                </option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-left:15px;">
                            <button type="button" class="btn btn-dark">Load Attendance</button>

                        </div>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    @for ($i = 1; $i <= 31; $i++) <th style="padding:0; vertical-align: middle; text-align:center;">{{$i}}</th>

                                        @endfor

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Albina Simonis</td>
                                    @for ($i = 1; $i <= 31; $i++) <td style="padding:0; vertical-align: middle; text-align:center;">
                                        <select class="select attendance" name="attendance[]">
                                            <option></option>
                                            <option value="A">A</option>
                                            <option value="P">P</option>
                                            <option value="L">L</option>
                                            <option value="H">H</option>
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
        $(document).on('change', '.attendance', function() {
            _this = $(this);
            let attendance = $(this).val();
            if (attendance == 'A') {
                _this.css('background-color', 'red').css('color', 'white').css('border', 'none');
            } else if (attendance == 'P') {
                _this.css('background-color', 'green').css('color', 'white').css('border', 'none');
            } else if (attendance == 'L') {
                _this.css('background-color', 'black').css('color', 'white').css('border', 'none');
            } else if (attendance == 'H') {
                _this.css('background-color', 'purple').css('color', 'white').css('border', 'none');
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
    });
</script>
@endsection