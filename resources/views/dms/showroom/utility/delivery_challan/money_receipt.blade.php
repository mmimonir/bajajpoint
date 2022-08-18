@extends('layouts.app')
@section('title', 'Money Receipt')
@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection
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

    .bill_page {
        height: 680px;
        width: 1020px;
        border: 1px solid black;
        margin: auto;
        position: relative;
        padding: 10px;
        box-sizing: border-box;
        font-size: 18px;
    }

    .span_style {
        background-color: white;
        height: 25px;
        border: 0px;
        border-radius: 0;
        font-weight: 700;
        font-size: 18px;
    }

    .input_style {
        background-color: white;
        height: 25px;
        border: 0px;
        border-bottom: 1px solid black;
        border-radius: 0;
        font-weight: 700;
        font-size: 18px;
    }

    .input_group_style {
        height: 25px;
        border: 0px;
        border-bottom: 1px solid black;
        border-radius: 0;
        font-weight: 700;
        font-size: 18px;
    }
</style>
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12" style="margin:10px 0;">
        <form id="create_money_receipt">
            @csrf
            <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                <div class="card-header no-print">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center" style="height:32px;">
                            <nav aria-label="Page navigation example" style="padding-left:15px;">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item"><a id="new_receipt_record" class="page-link bg-success" href="#">New</a></li>
                                    <li class="page-item"><a class="page-link disabled" id="btn_edit" href="#">Edit</a></li>
                                    <li class="page-item print"><a class="page-link" href="#">Print</a></li>
                                    <button class="page-item page-link bg-dark" type="submit" id="btn_create_receipt">Create Receipt</button>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card-header no-print">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center" style="height:22px; width:950px; margin:auto;">
                            <div class="d-flex justify-content-center" style="align-items:baseline; margin-left:15px; width:475px;">
                                <label style="margin-right:10px;">Money Receipt Area</label>
                                <select style="font-weight: bold; background:#F7F7F7; border-radius:5px; width:238px;" id="receipt_list">

                                </select>
                            </div>
                            <div class="d-flex justify-content-center" style="align-items:baseline; margin-left:15px; width:475px;">
                                <label>Receipt Date</label>
                                <input type="date" id="receipt_date_search" style="border:0; margin-left:5px; margin-right:5px; background:#F7F7F7; width:100px;">
                                <select style="font-weight: bold; background:#F7F7F7; border-radius:5px; width:238px;" id="receipt_list_search">
                                    <option style="font-weight:bold;" value="">Receipt List</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bill_page font-weight-bold" id="money_receipt">
                    <div class="bill_header">
                        <div class="header_image">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-12">
                                    <img src="{{asset('/images/money_receipt_bp.png')}}" class="img-fluid p-1" style="width:100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bill_body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3" style="width: 160px;">
                                    <span class="input-group-text span_style" id="basic-addon1" style="height:25px;">No:</span>
                                    <input value="{{$receipt_data ? $receipt_data->receipt_no : ''}}" readonly type="text" name="receipt_no" id="receipt_no" class="form-control receipt_no input_style" style="height:25px;">
                                </div>
                            </div>
                            <div class="col-md-3 offset-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text span_style" id="basic-addon1" style="height:25px;">Date:</span>
                                    <input value="{{$receipt_data ? $receipt_data->receipt_date : ''}}" type="date" name="receipt_date" id="receipt_date" class="form-control receipt_date input_style" style="height:25px;">
                                </div>
                            </div>
                            <div class="col-md-3 offset-md-9" style="margin-top:-12px;">
                                <div class="input-group mb-3">
                                    <span class="input-group-text span_style" id="basic-addon1" style="height:25px;">Mobile</span>
                                    <input value="{{$receipt_data ? $receipt_data->client_mobile : ''}}" type="text" name="client_mobile" id="client_mobile" class="form-control client_mobile input_style" style="height:25px;">
                                </div>
                            </div>
                            <div class="col-md-12" style="line-height:2;">
                                <div class="input-group mb-1">
                                    <span>Reveived with thanks from Mr./Mrs./M/s.: </span>
                                    <input value="{{$receipt_data ? $receipt_data->client_name : ''}}" type="text" name="client_name" id="client_name" class="form-control input_group_style">
                                </div>
                                <div class="input-group mb-1">
                                    <span>An amount of Taka: </span>
                                    <input type="text" id="in_words" class="form-control input_group_style">
                                </div>
                                <div class="input-group mb-1">
                                    <span>In cash/by: </span>
                                    <input value="{{$receipt_data ? 'Cash' : ''}}" type="text" name="payment_method" id="payment_method" class="form-control payment_method input_group_style" style="width:550px;">
                                    <span>Date: </span>
                                    <input type="date" name="cheque_date" id="cheque_date" class="form-control cheque_date input_group_style" style="font-size: 18px;">
                                </div>
                                <div class="input-group mb-1">
                                    <span>Drawn on: </span>
                                    <input type="text" name="drawn_on" id="drawn_on" class="form-control drawn_on input_group_style">
                                </div>
                                <div class="input-group mb-1">
                                    <span>On account of: </span>
                                    <input value="As payment for {{$model ? $model->model : ''}}" type="text" name="on_account_of" id="on_account_of" class="form-control on_account_of input_group_style">
                                </div>
                            </div>
                            <div class="col-md-7 mt-5">
                                <div class="input-group mb-1">
                                    <span class="pr-2">The sum of Tk: </span>
                                    <input value="{{$receipt_data ? $receipt_data->amount : ''}}" type="text" name="amount" id="amount" class="amount input_group_style" style="width:224px; border-radius:0;">
                                    <input type="hidden" name="receipt_id" id="receipt_id" class="receipt_id">
                                </div>
                            </div>
                            <div class="row d-flex align-items-center mt-5">
                                <div class="col-md-12">
                                    <img src="{{asset('/images/money_receipt_bottom.png')}}" class="img-fluid p-3" style="width:100%;">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
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
        setTimeout(function() {
            $('#amount').trigger('change');
        }, 1000);

        $('#amount').change(function() {
            var amount = +$(this).val();
            $('#in_words').val(in_words(amount));
            $('#amount').val(`${amount.toLocaleString('en-IN')}/-`);
        });

        $(document).on('click', '#btn_edit', function(e) {
            alert('edit');
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
                    $("#create_money_receipt :input").prop("disabled", false);
                    $('#btn_create_receipt').attr('disabled', false);
                    $('#btn_create_receipt').text('Update');
                }
            })
        })

        $(document).on('blur', "input[type=text]", function() {
            $(this).val(function(_, val) {
                return val.toUpperCase();
            });
        });

        // auto generate receipt no start
        function create_money_receipt_no() {
            $.ajax({
                url: "{{route('receipt.create_receipt_no')}}",
                type: "GET",
                dataType: "json",
                success: function({
                    receipt_no,
                    status
                }) {
                    if (status === 200) {
                        let receipt_no_default = +$('#receipt_no').val();
                        if (!receipt_no_default > 0) {
                            if (receipt_no < 9) {
                                $('#receipt_no').val(`000${receipt_no}`);
                            } else if (receipt_no < 99) {
                                $('#receipt_no').val(`00${receipt_no}`);
                            } else if (receipt_no < 999) {
                                $('#receipt_no').val(`0${receipt_no}`);
                            } else {
                                $('#receipt_no').val('');
                            }
                        }
                    }
                }
            });
        }
        create_money_receipt_no();
        // auto generate challan no end

        // when submit create_challan form start
        $(document).on('submit', '#create_money_receipt', function(e) {
            e.preventDefault();
            let receipt_no = +$('#receipt_no').val();
            var FD = new FormData(this);

            $.ajax({
                url: "{{ route('receipt.store_created_receipt') }}",
                method: 'post',
                data: FD,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === 200) {
                        new_receipt_record();
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        $('#receipt_list').empty();
                        $('#receipt_list').append('<option style="font-weight:bold;" value="">Receipt List</option>');

                        load_receipt_list();
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
        // when submit create_challan form end

        // Load job card list on same day start
        function load_receipt_list() {
            $.ajax({
                url: "{{ route('receipt.load_receipt_list') }}",
                method: 'get',
                dataType: 'json',
                success: function({
                    receipt_list
                }) {
                    if (receipt_list) {
                        $('#receipt_list').empty();
                        $('#receipt_list').append('<option style="font-weight:bold;" value="">Receipt List</option>');
                        receipt_list.forEach(function(item) {
                            $("#receipt_list").append(
                                `<option style="font-weight:bold;" value="${item.id}">Chl- ${item.receipt_no + ' ' + item.client_name}</option>`
                            );
                        });
                    }
                }
            });
        }
        load_receipt_list();

        function new_receipt_record() {
            $('#create_money_receipt').trigger('reset');
            $('#btn_create_receipt').text('Create Receipt');
            $("#create_money_receipt :input").prop("disabled", false);
            load_receipt_list();
            create_money_receipt_no();
        }
        $('#new_receipt_record').on('click', function() {
            new_receipt_record();
        })
        // Load job card list on same day end

        // After select job card start
        $('#receipt_list, #receipt_list_search').on('change', function() {
            let receipt_id = $(this).val();

            $.ajax({
                url: "{{ route('receipt.load_single_receipt') }}",
                method: 'get',
                dataType: 'json',
                data: {
                    receipt_id
                },
                success: function({
                    receipt_details
                }) {
                    $("#create_money_receipt").trigger("reset");
                    if (receipt_details) {
                        Object.keys(receipt_details).forEach(function(key) {
                            $("#money_receipt").find(`#${key}`).val(receipt_details[key]);
                        });
                    }
                    $('#receipt_id').val(receipt_details.id)
                    $("#create_money_receipt :input").prop("disabled", true);
                    $("#btn_edit").removeClass("disabled");
                }
            });
        })
        // After select job card end        

        $('#receipt_date_search').on('change', function() {
            let receipt_date = $(this).val();
            $.ajax({
                url: "{{ route('receipt.load_receipt_list') }}",
                method: 'get',
                data: {
                    receipt_date
                },
                dataType: 'json',
                success: function({
                    receipt_list
                }) {
                    if (receipt_list) {
                        $('#receipt_list_search').empty();
                        $('#receipt_list_search').append('<option style="font-weight:bold;" value="">Receipt List</option>');
                        receipt_list.forEach(function(item) {
                            $("#receipt_list_search").append(
                                `<option style="font-weight:bold;" value="${item.id}">Chl- ${item.receipt_no + ' ' + item.client_name}</option>`
                            );
                        });
                    }
                }
            });
        })
    });
</script>
@endsection