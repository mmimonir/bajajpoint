@extends('service_layouts.app')
@section('title', 'Generate Bill/Invoice')

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
        height: 76rem;
        width: 59rem;
        border: 1px solid black;
        margin: auto;
        position: relative;
        padding: 10px;
        box-sizing: border-box;
    }

    .input_style {
        background-color: #F4F6F9;
        height: 25px;
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
        <form action="#" method="POST" id="create_bill">
            @csrf
            <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                <div class="card-header no-print">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center" style="height:32px;">
                            <h4 class="bangla_font" style="display:inline-block; width:94px; margin-top:5px;">Bill Area</h4>
                            <select name="job_card_list" style="font-weight: bold;" id="job_card_list">
                                <option style="font-weight:bold;" value="">Bill List</option>
                            </select>
                            <nav aria-label="Page navigation example" style="padding-left:15px;">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item active"><a class="page-link first_jb_record" href="#">First</a></li>
                                    <li class="page-item"><a class="page-link previous_jb_record" href="#">Prev</a></li>
                                    <li class="page-item"><a class="page-link next_jb_record" href="#">Next</a></li>
                                    <li class="page-item"><a class="page-link last_jb_record" href="#">Last</a></li>
                                    <li class="page-item"><a class="page-link new_jb_record bg-success" href="#">New</a></li>
                                    <li class="page-item print"><a class="page-link" href="#">Print</a></li>
                                    <button class="page-item page-link bg-dark" type="submit" id="create_jb_top">Create Bill</button>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="bill_page" style="margin-top:20px; margin-bottom:20px;">
                    <div class="bill_header">
                        <div class="header_image">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-5" style="padding-left:0px;">
                                    <img src="{{asset('/images/authorized_dealer.png')}}" class="img-fluid p-1" style="width:80%;">
                                </div>
                                <div class="col-md-2">
                                    <img src="{{asset('/images/bill.png')}}" class="img-fluid p-1" style="width:80%;">
                                </div>
                                <div class="col-md-5" style="padding-right:0px;">
                                    <img src="{{asset('/images/bp_service_address.png')}}" class="img-fluid p-1 float-right" style="width:90%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bill_body">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3" style="width: 160px;">
                                        <span class="input-group-text" id="basic-addon1" style="height:25px; border-radius: 0;">Bill No:</span>
                                        <input disabled type="text" name="bill_no" id="bill_no" class="form-control bill_no" style="height:25px; border-radius: 0;">
                                    </div>
                                </div>
                                <div class="col-md-3 offset-md-3" style="padding-right: 0px;">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1" style="height:25px; border-radius: 0;">Date:</span>
                                        <input type="date" name="bill_date" id="bill_date" class="form-control bill_date" style="height:25px; border-radius: 0;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 offset-md-9" style="padding-right: 0px; margin-top:-12px;">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1" style="height:25px; border-radius: 0;">Mobile</span>
                                        <input type="text" name="client_mobile" id="client_mobile" class="form-control client_mobile" style="height:25px; border-radius: 0;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-group mb-3" style="margin-top:-14px;">
                                    <span class="input-group-text" id="basic-addon1" style="background-color:#F4F6F9; height:25px; border:0px; border-radius: 0;">Name :</span>
                                    <input type="text" name="client_name" id="client_name" class="form-control client_name" style="background-color:#F4F6F9; height:25px; border:0px; border-bottom: 1px solid black; border-radius:0;">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3" style="margin-top:-10px;">
                                    <span class="input-group-text" id="basic-addon1" style="background-color:#F4F6F9; height:25px; border:0px; border-radius: 0;">Address :</span>
                                    <input type="text" name="client_address" id="client_address" class="form-control client_address" style="background-color:#F4F6F9; height:25px; border:0px; border-bottom: 1px solid black; border-radius:0;">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table align="center" style="width:100%;" id="tbl">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">Sl</th>
                                            <th style="text-align:center;">Parts Name</th>
                                            <th style="text-align:center;">Parts No</th>
                                            <th style="text-align:center;">Quantity</th>
                                            <th style="text-align:center;">Rate</th>
                                            <th style="text-align:center;">Amount</th>
                                            <th style="text-align:center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0; $i<=20; $i++) <tr>
                                            <td>
                                                <input type="text" name="sl" style="width:38px;" class="input_style text-center">
                                            </td>
                                            <td>
                                                <input disabled type="text" name="part_name[]" style="width:250px;" class="input_style text-center part_name">
                                            </td>
                                            <td>
                                                <input type="text" name="part_id[]" class="input_style text-center part_id">
                                            </td>
                                            <td>
                                                <input type="text" name="quantity[]" style="width:78px;" class="input_style text-center quantity">
                                            </td>
                                            <td>
                                                <input type="text" name="sale_rate[]" style="width:115px;" class="input_style text-right sale_rate">
                                            </td>
                                            <td>
                                                <input disabled type="text" name="total_amount[]" class="input_style text-right total_amount">
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="disabled delete_parts_item"><i class="fa fa-trash delete_icon text-secondary"></i></a>
                                            </td>
                                            </tr>
                                            @endfor
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td rowspan="7" colspan="4" style="vertical-align: top;">
                                                <p><strong>In Words:</strong></p>
                                            </td>
                                            <td>Total Amount</td>
                                            <td><input disabled type="text" name="grand_total" id="grand_total" class="input_style text-right grand_total"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Discount</td>
                                            <td><input type="text" name="discount" id="discount" class="input_style text-right discount"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Balance</td>
                                            <td><input disabled type="text" name="balance" id="balance" class="input_style text-right balance"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>VAT</td>
                                            <td><input type="text" name="vat" id="vat" class="input_style text-right vat"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Grand Total</td>
                                            <td><input disabled type="text" name="bill_amount" id="bill_amount" class="input_style text-right bill_amount"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Paid Amount</td>
                                            <td><input type="text" name="paid_amount" id="paid_amount" class="input_style text-right paid_amount"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Due</td>
                                            <td><input disabled type="text" name="due_amount" id="due_amount" class="input_style text-right due_amount"></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row d-flex align-items-center" style="margin-top: 20px;">
                                <div class="col-md-12" style="padding-left:0px;">
                                    <img src="{{asset('/images/for_bajajpoint.png')}}" class="img-fluid p-1" style="width:100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.print').click(function() {
            window.print();
        });
        // Assign Job Card Sl No Start
        function assign_bill_no() {
            $.ajax({
                url: "{{ route('bill.assign_bill_no') }}",
                method: 'get',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(bill_no) {
                    $('#bill_no').val(bill_no);
                }
            });
        }
        assign_bill_no();
        // Assign Job Card Sl No End

        function calculate_sum() {
            let discount = +$('#discount').val();
            let balance = +$('#balance').val();
            let vat = +$('#vat').val();
            let bill_amount = +$('#bill_amount').val();
            let paid_amount = +$('#paid_amount').val();
            let due_amount = +$('#due_amount').val();

            let sum = 0;
            $('.total_amount').each(function() {
                if ($(this).val() != '') {
                    sum += parseFloat($(this).val());
                }
            });
            $('.grand_total').val((sum));
            $('#balance').val((sum - discount));
            $('#bill_amount').val((sum - discount) + vat);
            $('#due_amount').val((sum - discount) + vat - paid_amount);
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

        $('.total_amount, .quantity, .sale_rate, .discount, .vat, .paid_amount').on('change', function() {
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
                                console.log('Stock available');
                                _this.find('.part_name').val(data.part_name);
                                _this.find('.quantity').val(1);
                                _this.find('.sale_rate').val(data.rate);
                                _this.find('.delete_parts_item').removeClass('disabled');
                                _this.find('.delete_icon').removeClass('text-secondary');
                                _this.find('.delete_icon').addClass('text-danger');

                                _this.find('.quantity').trigger("change");
                                _this.find('.sale_rate').trigger("change");
                                _this.find('.total_amount').trigger("change");
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
            var sale_date = $('.bill_date').val();
            var quantity = _this.find('.quantity').val();
            var sale_rate = _this.find('.sale_rate').val();

            if (part_id !== '' && sale_date !== '' && quantity !== '' && sale_rate !== '') {
                $.ajax({
                    url: "{{ route('job_card.create_or_update') }}",
                    type: 'GET',
                    dataType: "json",
                    data: {
                        part_id,
                        job_card_date: sale_date,
                        quantity,
                        sale_rate
                    },
                    success: function(data) {
                        console.log(data);
                    }
                });
            }
        });
        // Update spare parts' table in frontend end

        // delete_parts_item_start
        $('.delete_parts_item').on('click', function() {
            var _this = $(this).parent().parent();
            const part_id = _this.find('.part_id').val();
            const quantity = _this.find('.quantity').val();
            const sale_date = $('.bill_date').val();
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
                        url: "{{ route('job_card.delete_parts_item') }}",
                        method: 'get',
                        dataType: 'json',
                        data: {
                            part_id,
                            sale_date,
                            quantity
                        },
                        success: function(response) {
                            if (response.status === 200) {
                                _this.find('.delete_parts_item').addClass('disabled');
                                _this.find('.delete_icon').removeClass('text-danger');
                                _this.find('.delete_icon').addClass('text-secondary');
                                console.log(response.data);
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
                    _this.find('.total_amount').val('').trigger('change');
                }
            })
        });
        // Submit Create Job Card Start
        $("#create_bill").submit(function(e) {
            e.preventDefault();
            const FD = new FormData(this);
            if ($("#create_bill").valid()) {
                $.ajax({
                    url: "{{ route('bill.create_bill') }}",
                    method: 'post',
                    data: FD,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        return;
                        if (response.status === 200) {
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 2000
                            })
                            // $('#job_card_create').trigger("reset");
                            // assign_job_card_sl_no();
                            $("#create_jb_top").html('Update JB');
                            $("#create_jb_bottom").html('Update JB');
                            $('#pending_png').empty();
                            $('#pending_png').append('<img src="{{ asset("images/pending.png") }}" alt="pending" class="img-fluid p-1 pending">');
                            $("#service_customer_id").val(response.service_customer_id);
                            $("#job_card_list").empty();
                            $("#job_card_list").append(`<option style="font-weight:bold;" value="">Job Card List</option>`);
                            load_job_card_list();
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
            }
        });
        // Submit Create Job Card End
    })
</script>
@endsection