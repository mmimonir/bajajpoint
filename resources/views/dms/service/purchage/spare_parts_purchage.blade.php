@extends('service_layouts.app')
@section('title', 'Parts Purchage')

@push('page_css')
<style>
    @media print {

        .no-print,
        .no-print * {
            display: none !important;
        }
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }

    .img-width {
        width: 33.33%;
    }

    .bill_page {
        /* height: 76rem; */
        width: 59rem;
        border: 1px solid black;
        margin: auto;
        position: relative;
        padding: 10px;
        box-sizing: border-box;
    }

    .input_style {
        background-color: white;
        height: 16px;
    }

    table {
        border-collapse: collapse;
    }

    table,
    td,
    th {
        border: 1px solid;
    }

    textarea,
    input {
        border: none;
    }
</style>
@endpush
@push('page_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12" style="margin:10px 0;">
        <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
            <form id="create_purchage">
                @csrf
                <div class="card-header no-print">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center" style="height:32px;">
                            <nav aria-label="Page navigation example" style="padding-left:15px;">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item"><a class="page-link new_bill_record bg-success" href="#">New</a></li>
                                    <li class="page-item"><a class="page-link disabled" id="btn_edit" href="#">Edit</a></li>
                                    <li class="page-item print"><a class="page-link" href="#">Print</a></li>
                                    <button class="page-item page-link bg-dark" type="submit" id="btn_create_bill">Purchage Done</button>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card-header no-print">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center" style="height:22px; width:950px; margin:auto;">
                            <div class="d-flex justify-content-center" style="align-items:baseline; margin-left:15px; width:450px;">
                                <label style="margin-right:10px;">Purchage Invoice</label>
                                <select name="invoice_list" style="font-weight: bold; background:#F7F7F7; border-radius:5px; width:238px;" id="invoice_list">

                                </select>
                            </div>
                            <div class="d-flex justify-content-center" style="align-items:baseline; margin-left:15px; width:490px;">
                                <label>Invoice Date</label>
                                <input type="date" name="invoice_date_search" id="invoice_date_search" style="margin-left:5px; margin-right:5px; background:#F7F7F7; width:100px;">
                                <select name="invoice_list_search" style="font-weight: bold; background:#F7F7F7; border-radius:5px; width:240px;" id="invoice_list_search">
                                    <option style="font-weight:bold;" value="">Invoice List</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bill_page" style="margin-top:20px; margin-bottom:20px;">
                    <div class="bill_header">
                        <div class="col-md-12 d-flex align-items-center">
                            <img src="{{asset('/images/uml_logo.png')}}" class="img-fluid p-1" style="width:40%; margin:auto;">
                        </div>
                    </div>
                    <div class="bill_body">
                        <h2 class="text-center" style="border:1px solid black; width:150px; margin:auto; border-radius:7px; margin-top:10px;">Invoice</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3" style="width: 160px;">
                                    <span class="input-group-text input_style" id="basic-addon1" style="height:25px;">Bill No:</span>
                                    <input required type="text" name="purchage_bill_no" id="purchage_bill_no" class="form-control purchage_bill_no input_style" style="height:25px;">
                                    <input type="hidden" name="purchage_id" id="purchage_id" value="">
                                    <input type="hidden" name="update" id="update" value="false">
                                </div>
                            </div>
                            <div class="col-md-3 offset-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text input_style" id="basic-addon1" style="height:25px;">Date:</span>
                                    <input required type="date" name="purchage_date" id="purchage_date" class="form-control purchage_date input_style" style="height:25px;">
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-center" style="margin-bottom:15px; font-size:16px;">
                                <div class="col-md-5 mr-3">
                                    <div class="form-group mb-0 row">
                                        <label for="vendor" class="col-sm-3 col-form-label p-0 text-right" style="line-height:2;">Vendor</label>
                                        <div class="col-sm-9">
                                            <select name="supplier_id" class="browser-default custom-select" id="vendor_list" style="height:30px; font-size:14px; padding-left:6px; padding-top:4px; font-weight:bold;">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group mb-0 row">
                                        <label for="vendor" class="col-sm-3 col-form-label p-0 text-right" style="line-height:2;">Dealer</label>
                                        <div class="col-sm-9">
                                            <select name="dealer_name" id="dealer_name" class="browser-default custom-select" style="height:30px; font-size:14px; padding-left:6px; padding-top:4px; font-weight:bold;">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table align="center" style="width:100%;" id="tbl">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">Sl</th>
                                            <th style="text-align:center;">Parts No</th>
                                            <th style="text-align:center;">Parts Name</th>
                                            <th style="text-align:center;">Quantity</th>
                                            <th style="text-align:center;">Rate</th>
                                            <th style="text-align:center;">Amount</th>
                                            <th style="text-align:center;">Location</th>
                                            <th class="no-print" style="text-align:center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0; $i<=50; $i++) <tr style="line-height:1;">
                                            <td>
                                                <input value="{{$i+1}}" type="text" name="sl" style="width:38px;" class="sl input_style text-center">
                                            </td>
                                            <td>
                                                <input type="text" style="width:110px;" name="part_id[]" class="input_style text-center part_id">
                                                <input type="hidden" name="id" class="input_style text-center id">
                                            </td>
                                            <td>
                                                <input readOnly type="text" style="width:225px;" class="input_style text-center part_name">
                                            </td>
                                            <td>
                                                <input type="text" name="quantity[]" style="width:78px;" class="input_style text-center quantity">
                                            </td>
                                            <td>
                                                <input type="text" name="rate[]" style="width:90px;" class="input_style text-right sale_rate">
                                            </td>
                                            <td>
                                                <input type="text" class="input_style text-right total_amount">
                                            </td>
                                            <td>
                                                <input type="text" name="location[]" style="width:60px;" class="input_style text-right location">
                                            </td>
                                            <td class="text-center no-print">
                                                <a href="#" class="disabled delete_parts_item"><i class="fa fa-trash delete_icon text-secondary"></i></a>
                                            </td>
                                            </tr>
                                            @endfor
                                    </tbody>
                                    <tfoot>
                                        <tr style="line-height:1;">
                                            <td rowspan="3" colspan="4" style="vertical-align: top;">
                                                <p>
                                                    <strong>In Words: <span id="in_words"></span></strong>
                                                </p>
                                            </td>
                                            <td>Grand Total</td>
                                            <td><input readOnly type="text" name="grand_total" id="grand_total" class="input_style text-right grand_total"></td>
                                            <td class="no-print"></td>
                                            <td class="no-print"></td>
                                        </tr>
                                        <tr style="line-height:1;">
                                            <td>Discount</td>
                                            <td><input type="text" name="discount" id="discount" class="input_style text-right discount"></td>
                                            <td class="no-print"></td>
                                            <td class="no-print"></td>
                                        </tr>
                                        <tr style="line-height:1;">
                                            <td>Net Payble</td>
                                            <td><input readOnly type="text" name="net_purchage_amount" id="net_purchage_amount" class="input_style text-right net_purchage_amount"></td>
                                            <td class="no-print"></td>
                                            <td class="no-print"></td>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <center style="padding:10px;">
                <button id="add" style="width:100px; margin-top:0px;" class="btn btn-success btn-sm">Add</button>
                <button id="remove" style="width:100px;" class="btn btn-danger btn-sm">Remove</button>
            </center>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        function check_input_value() {
            var purchage_date = $('#purchage_date').val();
            var purchage_bill_no = $('#purchage_bill_no').val();
            var vendor_list = $('#vendor_list').val();
            var dealer_name = $('#dealer_name').val();
            var location = $('#location').val();
            if (purchage_date == '' || purchage_bill_no == '' || vendor_list == '' || dealer_name == '' || location == '') {
                $("#create_purchage :input").prop("disabled", true);
                $("#purchage_date").prop("disabled", false);
                $("#purchage_bill_no").prop("disabled", false);
                $("#vendor_list").prop("disabled", false);
                $("#dealer_name").prop("disabled", false);
                $("#location").prop("disabled", false);
                $("#invoice_date_search").prop("disabled", false);
                $("#invoice_list_search").prop("disabled", false);
                $("#invoice_list").prop("disabled", false);
            } else {
                $("#create_purchage :input").prop("disabled", false);
            }
        }
        $(document).on('change', '#purchage_date,#purchage_bill_no,#vendor_list,#dealer_name,#location', function() {
            check_input_value();
        });
        check_input_value();


        $('.print').click(function() {
            window.print();
        });

        function calculate_sum() {
            let discount = +$('#discount').val();
            let net_purchage_amount = +$('#net_purchage_amount').val();
            let grand_total = +$('#grand_total').val();

            let sum = 0;
            $('.total_amount').each(function() {
                if ($(this).val() != '') {
                    sum += parseFloat($(this).val());
                }
            });
            $('.grand_total').val((sum));
            $('#net_purchage_amount').val(sum - discount);

        }

        // change parts sale quantiry start
        $('.quantity').on('focus', function() {
            $(this).on('change', function() {
                _this = $(this).parent().parent();
                let quantity = _this.find('.quantity').val();
                let sale_rate = _this.find('.sale_rate').val();
                let total = quantity * sale_rate;
                _this.find('.total_amount').val(total).trigger("change");
            });
        });

        $('.sale_rate').on('focus', function() {
            $(this).on('change', function() {
                _this = $(this).parent().parent();
                let quantity = _this.find('.quantity').val();
                let sale_rate = _this.find('.sale_rate').val();
                let total = quantity * sale_rate;
                _this.find('.total_amount').val(total).trigger("change");
            });
        });

        $('.total_amount, .quantity, .sale_rate, .discount').on('change', function() {
            calculate_sum();
        });

        // Search by part id start
        $('.part_id').on("focus", function() {
            $(this).autocomplete({
                minLength: 4,
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('job_card.search_by_part_id') }}",
                        type: 'GET',
                        dataType: "json",
                        data: {
                            part_id: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    return false;
                },
                change: function() {
                    _this = $(this).parent().parent();
                    var part_id = $(this).val();
                    $.ajax({
                        url: "{{ route('job_card.search_by_full_part_id') }}",
                        type: 'GET',
                        dataType: "json",
                        data: {
                            part_id: part_id
                        },
                        success: function(data) {
                            if (data.stock_quantity > 0) {
                                _this.find('.part_name').val(data.part_name);
                                _this.find('.quantity').val(1);
                                _this.find('.sale_rate').val(data.rate);
                                _this.find('.delete_parts_item').removeClass('disabled');
                                _this.find('.delete_icon').removeClass('text-secondary');
                                _this.find('.delete_icon').addClass('text-danger');
                                _this.find('.quantity').trigger("change");
                                _this.find('.sale_rate').trigger("change");
                                _this.find('.total_amount').val(1 * data.rate).trigger("change");
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Not enough stock, please update stock first',
                                    footer: '<a href="">Why do I have this issue?</a>'
                                })
                            }
                        }
                    });
                }
            });
        });
        // Search by part id end

        // Update spare parts' table in front end start
        $('.total_amount').on('change', function() {
            _this = $(this).parent().parent();
            var part_id = _this.find('.part_id').val();
            var id = _this.find('.id').val();
            var purchage_date = $('.purchage_date').val();
            var stock_quantity = _this.find('.quantity').val();
            var rate = _this.find('.sale_rate').val();
            var purchage_bill_no = $('#purchage_bill_no').val();

            if (part_id !== '' && purchage_date !== '' && stock_quantity !== '' && rate !== '') {
                $.ajax({
                    url: "{{ route('invoice.create_or_update') }}",
                    type: 'GET',
                    dataType: "json",
                    data: {
                        part_id,
                        purchage_date,
                        stock_quantity,
                        rate,
                        purchage_bill_no,
                        id
                    },
                    success: function(data) {
                        _this.find('.id').val(data.id);
                    }
                });
            }
        });
        // Update spare parts' table in frontend end

        // delete_parts_item_start
        $('.delete_parts_item').on('click', function() {
            var _this = $(this).parent().parent();
            const id = _this.find('.id').val();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('invoice.delete_parts') }}",
                        method: 'get',
                        dataType: 'json',
                        data: {
                            id
                        },
                        success: function(response) {
                            if (response.status === 200) {
                                _this.find('.delete_parts_item').addClass('disabled');
                                _this.find('.delete_icon').removeClass('text-danger');
                                _this.find('.delete_icon').addClass('text-secondary');

                                Swal.fire({
                                    icon: 'success',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message,
                                    footer: '<a href="">Why do I have this issue?</a>'
                                })
                            }
                        }
                    });
                    _this = $(this).parent().parent();
                    _this.find('.part_id').val('');
                    _this.find('.quantity').val('');
                    _this.find('.part_name').val('');
                    _this.find('.sale_rate').val('');
                    _this.find('.id').val('');
                    _this.find('.total_amount').val('').trigger('change');
                }
            })
        });
        // Submit Create Job Card Start
        $("#create_purchage").submit(function(e) {
            e.preventDefault();
            const FD = new FormData(this);
            $.ajax({
                url: "{{ route('invoice.store_invoice') }}",
                method: 'post',
                data: FD,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === 200) {
                        $('#create_purchage').trigger("reset");
                        new_record();
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        $('#invoice_list').empty();
                        $('#invoice_list').append('<option style="font-weight:bold;" value="">Invoice List</option>');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                            footer: '<a href="">Why do I have this issue?</a>'
                        })
                    }
                }
            });
        });
        // Submit Create Job Card End

        // Load job card list on same day start
        function load_invoice_list() {
            $.ajax({
                url: "{{ route('invoice.invoice_list') }}",
                method: 'get',
                dataType: 'json',
                success: function({
                    invoice_list
                }) {
                    if (invoice_list) {
                        $('#invoice_list').empty();
                        $('#invoice_list').append('<option style="font-weight:bold;" value="">Invoice List</option>');
                        invoice_list.forEach(function(item) {
                            $("#invoice_list").append(
                                `<option style="font-weight:bold;" value="${item.id}">Invoice- ${item.purchage_bill_no}</option>`
                            );
                        });
                    }
                }
            });
        }
        load_invoice_list();
        // Load job card list on same day end
        // Load job card list on same day start
        function load_vendor_list() {
            $.ajax({
                url: "{{ route('invoice.vendor_list') }}",
                method: 'get',
                dataType: 'json',
                success: function({
                    vendor_list
                }) {
                    if (vendor_list) {
                        $('#vendor_list').empty();
                        vendor_list.forEach(function(item) {
                            $("#vendor_list").append(
                                `<option style="font-weight:bold;" value="${item.id}">${item.name}</option>`
                            );
                        });
                    }
                }
            });
        }
        load_vendor_list();

        function load_dealer_list() {
            $.ajax({
                url: "{{ route('invoice.dealer_list') }}",
                method: 'get',
                dataType: 'json',
                success: function({
                    dealer_list
                }) {
                    if (dealer_list) {
                        $('#dealer_name').empty();
                        dealer_list.forEach(function(item) {
                            $("#dealer_name").append(
                                `<option style="font-weight:bold;" value="${item.id}">${item.name}</option>`
                            );
                        });
                    }
                }
            });
        }
        load_dealer_list();
        // Load job card list on same day end
        // in words start
        function in_words(num) {
            var a = ['', 'One ', 'Two ', 'Three ', 'Four ', 'Five ', 'Six ', 'Seven ', 'Eight ', 'Nine ', 'Ten ', 'Eleven ', 'Twelve ', 'Thirteen ', 'Fourteen ', 'Fifteen ', 'Sixteen ', 'Seventeen ', 'Eighteen ', 'Nineteen '];
            var b = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

            function inWords(num) {
                if ((num = num.toString()).length > 9) return 'overflow';
                n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
                if (!n) return;
                var str = '';
                str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Crore ' : '';
                str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Lakh ' : '';
                str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
                str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
                str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'Taka Only ' : '';
                return str;
            }
            return inWords(num);
        }
        // in words end


        // After select job card start
        $('#invoice_list, #invoice_list_search').on('change', function() {
            let id = $(this).val();
            _this = $(this).parent();

            $.ajax({
                url: "{{ route('invoice.load_single_invoice') }}",
                method: 'get',
                dataType: 'json',
                data: {
                    id
                },
                success: function({
                    purchage_details,
                    spare_parts_purchage_details
                }) {
                    console.log(purchage_details);
                    if (purchage_details) {
                        $("#create_purchage").trigger("reset");
                        $('#purchage_bill_no').val(purchage_details.purchage_bill_no);
                        $('#purchage_id').val(purchage_details.id);
                        $('#purchage_date').val(purchage_details.purchage_date);
                        $('#vendor_list').val(purchage_details.supplier_id);
                        $('#dealer_name').val(purchage_details.dealer_name);
                        $('#location').val(spare_parts_purchage_details.location);

                        $("#create_purchage :input").prop("disabled", true);

                        $("#invoice_date_search").prop("disabled", false);
                        $("#invoice_list_search").prop("disabled", false);
                        $('#btn_create_bill').attr('disabled', true);
                        $('#btn_create_bill').removeClass('bg-dark');
                        $('#btn_edit').removeClass('disabled');
                        $('#btn_create_bill').addClass('bg-secondary');

                        $("#invoice_date_search").prop("disabled", false);
                        $("#invoice_list_search").prop("disabled", false);
                        $("#invoice_list").prop("disabled", false);


                        // populate spare parts sale data
                        let length = spare_parts_purchage_details.length;
                        let index = 0;

                        $('.part_id').each(function() {
                            _this = $(this).parent().parent();
                            if (index < length) {
                                _this.find('.part_id').val(spare_parts_purchage_details[index].part_id);
                                _this.find('.part_name').val(spare_parts_purchage_details[index].part_name);
                                _this.find('.quantity').val(spare_parts_purchage_details[index].quantity);
                                _this.find('.sale_rate').val(spare_parts_purchage_details[index].rate);
                                _this.find('.total_amount').val(spare_parts_purchage_details[index].quantity * spare_parts_purchage_details[index].rate);
                                _this.find('.id').val(spare_parts_purchage_details[index].id);
                                // _this.find('.delete_parts_item').removeClass('disabled');
                                // _this.find('.delete_icon').addClass('text-danger');
                            } else {
                                return false;
                            }
                            index++;
                        });
                        // populate spare parts sale data end
                        calculate_sum();
                    }
                    $('#in_words').text(in_words(+$('#net_purchage_amount').val()));
                    // let bill_amount = +$('#bill_amount').val();
                    // let in_word = in_words(bill_amount);
                    // $('#in_words').text(in_word);
                }
            });
        })
        // After select job card end
        $('.new_bill_record').on('click', function() {
            new_record();
        })

        function text_danger_remove() {
            let text_danger = $('.text-danger').length;
            if (text_danger > 0) {
                $('.text-danger').each(function() {
                    let text_danger = $(this).parent().parent();
                    text_danger.find('.delete_parts_item').addClass('disabled');
                    text_danger.find('.delete_icon').removeClass('text-danger');
                    text_danger.find('.delete_icon').addClass('text-secondary');
                })
                text_danger--;
            };
        };

        function new_record() {
            text_danger_remove();
            load_invoice_list();
            load_vendor_list();
            $('#btn_edit').addClass('disabled');
            $('#create_purchage').trigger('reset');
            $('#btn_create_bill').text('Purchage Done');
            $('#update').val('false');
            $('#btn_create_bill').addClass('bg-dark');
            $("#create_purchage :input").prop("disabled", false);
            $('.id').val('');
            $('#purchage_id').val('');
        }
        $('#invoice_date_search').on('change', function() {
            let purchage_date = $(this).val();
            $.ajax({
                url: "{{ route('invoice.invoice_list') }}",
                method: 'get',
                data: {
                    purchage_date
                },
                dataType: 'json',
                success: function({
                    invoice_list
                }) {
                    if (invoice_list) {
                        $('#invoice_list_search').empty();
                        $('#invoice_list_search').append('<option style="font-weight:bold;" value="">Invoice List</option>');
                        invoice_list.forEach(function(item) {
                            $("#invoice_list_search").append(
                                `<option style="font-weight:bold;" value="${item.id}">Invoice- ${item.purchage_bill_no}</option>`
                            );
                        });
                    }
                }
            });
        })
        $(document).on('click', '#btn_edit', function(e) {
            let vendor_list = $('#vendor_list').val();
            let dealer_name = $('#dealer_name').val();
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Edit it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('invoice.edit_invoice')}}",
                        type: "GET",
                        success: function({
                            supplier_list,
                            dealer_list
                        }) {
                            if (supplier_list) {
                                $('#btn_create_bill').attr('disabled', false);
                                $('#update').val('true');
                                $('#btn_create_bill').text('Update');
                                $('#purchage_bill_no').attr('disabled', false);
                                $('#vendor_list').attr('disabled', false);
                                $('#dealer_name').attr('disabled', false);
                                $('#btn_create_bill').addClass('bg-dark');
                                $('#vendor_list').empty();
                                supplier_list.forEach(function(item) {
                                    $('#vendor_list').append(`<option ${vendor_list == item.id ? 'selected': ''} value="${item.id}">${item.name}</option>`);
                                });
                                $('#dealer_name').empty();
                                dealer_list.forEach(function(item) {
                                    $('#dealer_name').append(`<option ${dealer_name == item.id ? 'selected': ''} value="${item.id}">${item.name}</option>`);
                                });
                            }

                        }
                    });

                }
            })
        })

        $('#add').on('click', function(e) {
            e.preventDefault();
            var $tableBody = $('#tbl').find("tbody"),
                $trLast = $tableBody.find("tr:last"),
                $trNew = $trLast.clone().find('input').val('').end();
            $trNew.find('.sl').val(parseInt($trLast.find('.sl').val()) + 1);
            $trLast.after($trNew);


            if ($("#tbl tbody tr").length > 0) {
                $('#remove').attr('disabled', false);
            }
        })
        $('#remove').on('click', function(e) {
            e.preventDefault();
            $('#tbl tbody tr:last').remove();
            ar_row_control();
        })
        ar_row_control();

        function ar_row_control() {
            if ($("#tbl tbody tr").length == 1) {
                $('#remove').attr('disabled', true);
            }
        }
    })
</script>
@endsection