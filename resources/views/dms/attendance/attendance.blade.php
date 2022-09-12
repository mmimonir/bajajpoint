@extends('service_layouts.app')
@section('title', 'Employee Attendance')

@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection
@push('page_css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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

    .select2-container--default {
        width: 100% !important;

    }

    #select2-emp_id_attendance-container {
        line-height: 17px !important;
    }

    #select2-h6s3-container {
        line-height: 17px !important;
    }

    table {
        margin-left: auto;
        margin-right: auto;
        font-weight: bold;
    }

    td {
        padding: 10px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 17px !important;
    }
</style>
@endpush

@section('content')
<div class="container-fluid" id="container-fluid">
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
                    <table>
                        <tr>
                            <td>Select an Employee</td>
                            <td style="width: 250px;">
                                <select class="form-control employee_list emp_id_search select2" style="margin-left:15px;">

                                </select>
                            </td>
                            <td>Select an Month</td>
                            <td>
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
                            </td>
                            <td>Select an Year</td>
                            <td>
                                <select name="attendance_year" class="form-control" id="attendance_year" style="width:100px;margin-left:15px;">
                                    <option selected>
                                        Year
                                    </option>
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" id="emp_id_search">Search</button>
                            </td>
                        </tr>
                    </table>
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
                        <h3 class="text-center text-bold mb-2">Attendance Date/Time Picker</h3>
                        <input class="text-bold p-2 w-25 m-auto" id="attendanc_picker" type="datetime-local" class="form-control" name="attendanc_picker">

                    </div>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <div class="table-responsive">
                        <table class="table  mb-0">
                            <thead>
                                <tr>
                                    <th>Employee List</th>
                                    @for ($i = 1; $i <= 31; $i++) <th class="attendance_column" style="padding:0; vertical-align: middle; text-align:center;">{{$i}}</th>

                                        @endfor

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width:250px;">
                                        <select class="form-control employee_list emp_id_attendance select2" id="emp_id_attendance">

                                        </select>
                                        <input type="hidden" id="attendance_id" value="">
                                    </td>
                                    @for ($i = 1; $i <= 31; $i++) <td style="padding:0; vertical-align: middle; text-align:center;">
                                        <input type="hidden" name="day" value="{{$i}}" />
                                        <input class="attendance_timestamp_id" type="hidden">
                                        <select class="select attendance">
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
                        <div class="py-lg-0 border-right-lg w-100">
                            <h4 class="mb-0 text-center btn-primary p-2 m-1" style="border-radius:5px;">Total Days</h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <h1 id="total_days" class=" mb-0 mr-2">24</h1>
                            </div>
                        </div>
                        <div class="py-lg-0 border-right-lg w-100">
                            <h4 class="mb-0 text-center btn-primary p-2 m-1" style="border-radius:5px;">Working Days</h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <h1 id="P" class=" mb-0 mr-2">24</h1>
                            </div>
                        </div>
                        <div class="py-lg-0 border-right-lg w-100">
                            <h4 class="mb-0 text-center btn-primary p-2 m-1" style="border-radius:5px;">Absent Days</h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <h1 id="A" class=" mb-0 mr-2">2</h1>
                            </div>
                        </div>
                        <div class="py-lg-0 border-right-lg w-100">
                            <h4 class="mb-0 text-center btn-primary p-2 m-1" style="border-radius:5px;">Total Friday</h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <h1 id="F" class=" mb-0 mr-2">4</h1>
                            </div>
                        </div>
                        <div class="py-lg-0 border-right-lg w-100">
                            <h4 class="mb-0 text-center btn-primary p-2 m-1" style="border-radius:5px;">Govt Holiday</h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <h1 id="H" class=" mb-0 mr-2">4</h1>
                            </div>
                        </div>
                        <div class="py-lg-0 border-right-lg w-100">
                            <h4 class="mb-0 text-center btn-primary p-2 m-1" style="border-radius:5px;">Total Leave</h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <h1 id="L" class=" mb-0 mr-2">4</h1>
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
                        <div class="px-2 py-4 py-lg-0 border-right-lg w-100">
                            <h5 class="text-center btn-primary p-1" style="border-radius:5px;">Gross Salary</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <input type="text" id="salary" class="form-control text-center" name="salary" style="font-weight:700; font-size:18px;" />
                            </div>
                        </div>
                        <div class="px-2 py-4 py-lg-0 border-right-lg w-100">
                            <h5 class="text-center btn-primary p-1" style="border-radius:5px;">Advance</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <input type="text" id="advance" class="form-control text-center" name="advance" style="font-weight:700; font-size:18px;" />
                            </div>
                        </div>
                        <div class="px-2 py-4 py-lg-0 border-right-lg w-100">
                            <h5 class="text-center btn-primary p-1" style="border-radius:5px;">Absent Deduction</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <input type="text" id="absent_deduction" class="form-control text-center" name="absent_deduction" style="font-weight:700; font-size:18px;" />
                            </div>
                        </div>
                        <div class="px-2 py-4 py-lg-0 border-right-lg w-100">
                            <h5 class="text-center btn-primary p-1" style="border-radius:5px;">Total Deduction</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <input type="text" id="total_deduction" class="form-control text-center" name="total_deduction" style="font-weight:700; font-size:18px;" />
                            </div>
                        </div>
                        <div class="px-2 py-4 py-lg-0 border-right-lg w-100">
                            <h5 class="text-center btn-primary p-1" style="border-radius:5px;">Total Payable</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <input type="text" id="total_payable" class="form-control text-center" name="total_payable" style="font-weight:700; font-size:18px;" />
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
                                    <th>Entry Date</th>
                                    <th>Entry Time</th>
                                    <th>Exit Time</th>
                                    <th>Working Hours</th>
                                    <th>Log</th>
                                </tr>
                            </thead>
                            <tbody id="attendance_timestamp_10_days">

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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@section('script')

<script>
    $(document).ready(function() {
        $('.select2').select2();

        $(document).on('change', '#emp_id_attendance', function() {
            let emp_id = $(this).val();
            let attendance_timestamp = $('#attendanc_picker').val();
            $("#container-fluid :input").prop("disabled", false);
            attendance_emp_id_change(emp_id, attendance_timestamp);
        })

        $(document).on('click', '#emp_id_search', function() {
            _this = $(this).parent().parent();
            let day = new Date().getDate();
            let month = $('#attendance_month').val();
            let year = $('#attendance_year').val();

            let emp_id = _this.find('.emp_id_search').val();
            let attendance_timestamp = new Date(year + '-' + month + '-' + day).toISOString().slice(0, 10);
            // alert(month);
            // return;            

            attendance_emp_id_change(emp_id, attendance_timestamp, function() {
                $("#container-fluid :input").prop("disabled", true);
                $("#emp_id_attendance").prop("disabled", false);
                $('#attendance_month').prop("disabled", false);
                $('#attendance_year').prop("disabled", false);
                $('.emp_id_search').prop("disabled", false);
                $('#emp_id_search').prop("disabled", false);
            });
        })

        function attendance_emp_id_change(emp_id, attendance_timestamp, cb) {
            $.ajax({
                url: "{{ route('attendance.attendance_by_id') }}",
                type: "POST",
                data: {
                    emp_id: emp_id,
                    attendance_timestamp,
                    _token: "{{ csrf_token() }}"
                },
                success: function({
                    attendance_data,
                    emp_data,
                    attendance_timestamp_data,

                }) {
                    // console.log(attendance_data);

                    // console.log(attendance_timestamp_data[0].id);
                    let day = [
                        'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten',
                        'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen',
                        'eighteen', 'nineteen', 'twenty', 'twentyone', 'twentytwo', 'twentythree',
                        'twentyfour', 'twentyfive', 'twentysix', 'twentyseven', 'twentyeight', 'twentynine',
                        'thirty', 'thirtyone'
                    ];
                    let index = 0;
                    let A = 0;
                    let P = 0;
                    let L = 0;
                    let H = 0;
                    let F = 0;

                    if (attendance_data !== null) {
                        // $(".select2").select2().select2('val', emp_id).trigger('focus');
                        // $('#emp_id_attendance').val(emp_id);
                        // $('#attendance_id').val(attendance_data[0].id);
                        // console.log(attendance_data[0][day[index]]);
                        $('.attendance').each(function() {
                            $(this).val(attendance_data[0][day[index]]).trigger('blur');

                            if (attendance_data[0][day[index]] == '') {
                                return false;
                            }
                            if (attendance_data[0][day[index]] == 'A') {
                                A++;
                            }
                            if (attendance_data[0][day[index]] == 'P') {
                                P++;
                            }
                            if (attendance_data[0][day[index]] == 'L') {
                                L++;
                            }
                            if (attendance_data[0][day[index]] == 'H') {
                                H++;
                            }
                            if (attendance_data[0][day[index]] == 'F') {
                                F++;
                            }
                            index++;
                        })
                        let index_two = 0;
                        $('.attendance_timestamp_id').each(function() {
                            // console.log(attendance_timestamp_data);
                            if (attendance_timestamp_data[index_two] !== undefined) {
                                // console.log('id is' + attendance_timestamp_data[index_two].id);
                                $(this).val(attendance_timestamp_data[index_two].id);
                            } else {
                                // $(this).val('');
                                return false;
                            }
                            index_two++;
                        })

                        $('#A').text(A);
                        $('#P').text(P);
                        $('#L').text(L);
                        $('#H').text(H);
                        $('#F').text(F);
                        $('#total_days').text(A + P + L + H + F);
                        $('#salary').val(`${emp_data.salary.toLocaleString('en-IN')}/-`);
                        $('#advance').val(attendance_data[0].advance ? `${(attendance_data[0].advance).toLocaleString('en-IN')}/-` : 0);
                        let salary = emp_data.salary;
                        let advance = +$('#advance').val().replace(/,/g, '').replace('/-', '');
                        let absent_deduction = Math.round((salary / 31) * A);
                        $('#absent_deduction').val(attendance_data[0].absent_deduction ? `${(attendance_data[0].absent_deduction).toLocaleString('en-IN')}/-` : `${(absent_deduction).toLocaleString('en-IN')}/-`);
                        $('#total_deduction').val(`${(attendance_data[0].advance + attendance_data[0].absent_deduction).toLocaleString('en-IN')}/-`);
                        let absent_deduction_two = +$('#absent_deduction').val().replace(/,/g, '').replace('/-', '');
                        $('#total_payable').val(`${(salary - (advance + absent_deduction_two)).toLocaleString('en-IN')}/-`);

                        let {
                            format,
                            parseISO
                        } = date_fns;

                        if (attendance_timestamp_data !== null) {
                            let timer = 0;
                            $('#attendance_timestamp_10_days').empty();
                            attendance_timestamp_data.forEach(function(item) {
                                if (timer < 11) {
                                    let date = new Date(item.attendance_datetime).toLocaleDateString();
                                    let time = new Date(item.attendance_datetime).toLocaleTimeString();
                                    let status = item.status;
                                    let html = `<tr>
                                            <td>${format(parseISO(item.attendance_datetime), "dd-MM-yyyy")}</td>
                                            <td>${time}</td>
                                            <td>06.00</td>
                                            <td>12 Hours</td>
                                            <td>Present</td>
                                        </tr>`;
                                    $('#attendance_timestamp_10_days').append(html);
                                }
                                timer++;
                            })
                        }
                        cb();
                    } else {
                        $('#attendance_timestamp_10_days').empty();
                        let index_two = 0;
                        $('.attendance_timestamp_id').each(function() {
                            if (!attendance_timestamp_data) {
                                if ($(this).val()) {
                                    $(this).val('');
                                }
                            }
                            index_two++;
                        })
                        $('#attendance_id').val('');

                        $('.attendance').each(function() {
                            $(this).val('').trigger('blur');
                            $('#total_days').text(0);
                            $('#A').text(0);
                            $('#P').text(0);
                            $('#L').text(0);
                            $('#H').text(0);
                            $('#F').text(0);
                            $('#salary').val('');
                            $('#advance').val('');
                            $('#absent_deduction').val('');
                            $('#total_deduction').val('');
                            $('#total_payable').val('');
                        })
                    }
                }
            })

        }



        function calculate_attendance() {
            let salary = +$('#salary').val().replace(/,/g, '').replace('/-', '');
            let advance = +$('#advance').val().replace(/,/g, '').replace('/-', '');
            let total_days = +$('#total_days').text();
            let working_days = +$('#P').val();
            let absent_days = +$('#A').val();
            let absent_deduction = +$('#absent_deduction').val().replace(/,/g, '').replace('/-', '');
            let total_deduction = advance + absent_deduction;

            $('#absent_deduction').val(`${(absent_deduction).toLocaleString('en-IN')}/-`);
            $('#total_deduction').val(`${(total_deduction).toLocaleString('en-IN')}/-`);
            $('#total_payable').val(`${(salary - total_deduction).toLocaleString('en-IN')}/-`);
            $('#advance').val(`${(advance).toLocaleString('en-IN')}/-`);
        }
        $(document).on('change', '#advance, #absent_deduction', function() {
            calculate_attendance();
            $.ajax({
                url: "{{ route('attendance.salary_calculate') }}",
                type: "POST",
                data: {
                    id: $('#attendance_id').val(),
                    advance: $('#advance').val().replace(/,/g, '').replace('/-', ''),
                    absent_deduction: $('#absent_deduction').val().replace(/,/g, '').replace('/-', ''),
                    total_payable: $('#total_payable').val().replace(/,/g, '').replace('/-', ''),
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        })
                    }
                }
            })
        })

        $(document).on('blur', '.attendance', function() {
            _this = $(this);
            let attendance_text = $(this).val();

            if (attendance_text == 'A') {
                _this.css('background-color', 'red').css('color', 'white').css('border', 'none');
            } else if (attendance_text == 'P') {
                _this.css('background-color', 'green').css('color', 'white').css('border', 'none');
            } else if (attendance_text == 'L') {
                _this.css('background-color', 'black').css('color', 'white').css('border', 'none');
            } else if (attendance_text == 'H') {
                _this.css('background-color', 'purple').css('color', 'white').css('border', 'none');
            } else if (attendance_text == 'F') {
                _this.css('background-color', '#1E64AF').css('color', 'white').css('border', 'none');
            } else if (attendance_text == '') {
                _this.css('background-color', '#E6E6E6').css('color', 'black').css('border', '1px solid green');
            }
        });

        function in_words(num) {
            var a = ['', 'one ', 'two ', 'three ', 'four ', 'five ', 'six ', 'seven ', 'eight ', 'nine ', 'ten ', 'eleven ', 'twelve ', 'thirteen ', 'fourteen ', 'fifteen ', 'sixteen ', 'seventeen ', 'eighteen ', 'nineteen '];
            var b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

            function inWords(num) {
                if ((num = num.toString()).length > 9) return 'overflow';
                n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
                if (!n) return;
                var str = '';
                str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + a[n[1][1]]) + 'crore ' : '';
                str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + a[n[2][1]]) + 'lakh ' : '';
                str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + a[n[3][1]]) + 'thousand ' : '';
                str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + a[n[4][1]]) + 'hundred ' : '';
                str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + a[n[5][1]]) : '';
                return str;
            }

            return inWords(num);
        }
        $(document).on('change', '.attendance', function() {
            _this = $(this);

            let parent_td = $(this).parent();
            let attendance_day_column = in_words(parent_td.find('input[name="day"]').val());
            let emp_id_attendance = $('#emp_id_attendance').val();
            let attendance_text = $(this).val();
            let attendance_datetime = $('#attendanc_picker').val();
            let id = $('#attendance_id').val();
            let attendance_timestamp_id = parent_td.find('.attendance_timestamp_id').val();

            $.ajax({
                url: "{{ route('attendance.daily_attendance_store') }}",
                type: "POST",
                data: {
                    attendance_day_column,
                    emp_id_attendance,
                    attendance_text,
                    attendance_datetime,
                    id,
                    attendance_timestamp_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 200) {
                        $('#attendance_id').val(data.last_id);
                        parent_td.find('.attendance_timestamp_id').val(data.last_timestamp_id);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Attendance Updated',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            })


        });

        function load_employee_data() {
            $.ajax({
                url: "{{ route('employee.get') }}",
                method: "GET",
                success: function({
                    employee
                }) {
                    $('.employee_list').empty();
                    $('.employee_list').append(`<option></option>`);
                    employee.forEach(item => {
                        $('.employee_list').append(`<option value="${item.id}">${(item.name).toUpperCase()}</option>`);
                    });
                }
            });
        }
        load_employee_data();

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
        $(document).on('click', '#attendanc_picker', function() {
            $('#attendanc_picker').val(set_local_datetime());
        });
        $('#attendanc_picker').val(set_local_datetime());

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