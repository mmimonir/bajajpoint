@extends('layouts.app')
@section('title', 'Purchase')

@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8" style="margin-top:10px;">
        <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Quatation</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('quotation.store')}}" method="post" id="quotation_create_form">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="ref" class="col-sm-4 col-form-label">Ref:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="ref" name="ref" value="Ref: Bajaj Point/Offer-">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="qt_date" class="col-sm-4 col-form-label">Date:</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control form-control-sm" id="qt_date" name="qt_date" placeholder="Challan No">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="to" class="col-sm-2 col-form-label">To</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="to" name="to" placeholder="XYZ Company Ltd">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="to" class="col-sm-2 col-form-label">Address 1</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="to" name="to" placeholder="23/Ka New Eskaton Road">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="to" class="col-sm-2 col-form-label">Address 2</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="to" name="to" placeholder="Ramna, Dhaka-1212">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="account" class="col-sm-2 col-form-label">A/C</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="account" name="account" placeholder="Md Monirul Islam">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="subject" class="col-sm-2 col-form-label">Subject:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="subject" name="subject" value="OFFER FOR SUPPLY OF BAJAJ MOTORCYCLE.">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="height:1px;border:none;color:#333;background-color:#333;" />
                    <table align="center" style="width:100%;" id="tbl">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Sl</th>
                                <th style="text-align:center;">Description</th>
                                <th style="text-align:center;">Unit</th>
                                <th style="text-align:center;">Unit Price</th>
                                <th style="text-align:center;">Grand Total</th>
                            </tr>
                        </thead>
                        <tbody class="add_more_model">
                            <tr>
                                <td>#</td>
                                <td>
                                    <input name="tb_description[]" class="form-control form-control-sm tb_description" id="tb_description" style="width:300px;">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm tb_unit text-center" id="tb_unit" name="tb_unit[]" placeholder="Chassis">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm text-center tb_unit_price" id="tb_unit_price" name="tb_unit_price[]" placeholder="Engine">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm tb_grand_total text-right" id="tb_grand_total" name="tb_grand_total[]" placeholder="Unit Price">
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="form-row" style="margin-top:10px;">
                        <div class="col-md-12">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="ref" class="col-sm-2 col-form-label">Validity:</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control form-control-sm" id="ref" name="ref" placeholder="Ref: Bajaj Point/Offer-">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="ref" class="col-sm-2 col-form-label">Note</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="ref" name="ref" value="All price are without AIT">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="for" class="col-sm-2 col-form-label">For</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="for" name="for" value="Bajaj Point">
                                </div>
                            </div>
                        </div>

                    </div>
                    <center style="padding:10px;">
                        <button id="add" style="width:100px; margin-top:0px;" class="btn btn-success btn-sm">Add</button>
                        <button id="remove" style="width:100px;" class="btn btn-danger btn-sm">Remove</button>
                    </center>
                    <center style="padding:10px;">
                        <button class="btn btn-info btn-sm text-white" type="submit">Submit</button>
                    </center>
                </form>

            </div>

        </div>

    </div>
</div>


@endsection

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
    $("#purchage_entry_form").submit(function(e) {
        e.preventDefault();
        const FD = new FormData(this);
        // $.ajax({
        //     url: "{{ route('purchage.create') }}",
        //     method: 'post',
        //     data: FD,
        //     cache: false,
        //     contentType: false,
        //     processData: false,
        //     dataType: 'json',
        //     success: function(response) {
        //         if (response.status == 200) {
        //             Swal.fire({
        //                 icon: 'success',
        //                 title: response.message,
        //                 showConfirmButton: false,
        //                 timer: 2000
        //             })
        //             $('#purchage_entry_form').trigger("reset");
        //         } else {
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Oops...',
        //                 text: response.message,
        //                 footer: '<a href="">Why do I have this issue?</a>'
        //             })

        //         }
        //     }
        // });
    });
    $('#add').on('click', function(e) {
        e.preventDefault();
        var $tableBody = $('#tbl').find("tbody"),
            $trLast = $tableBody.find("tr:last"),
            $trNew = $trLast.clone();
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
    $(document).on("keyup", ".five_chassis", function() {
        var sum = 0;
        var qty = 0
        $(".sum").each(function() {
            sum += +$(this).val();
            qty++;
        });
        $(".grant_total").val(sum);
        $("#purchage_value").val(sum);
        $("#quantity").val(qty);
    });

    function getCurrentFinancialYear(date) {
        var financial_year = "";
        var today = new Date(date);
        if ((today.getMonth() + 1) <= 3) {
            financial_year = (today.getFullYear() - 1) + "-" + today.getFullYear()
        } else {
            financial_year = today.getFullYear() + "-" + (today.getFullYear() + 1)
        }
        return financial_year;
    }

    function get_vat_purchage_month(purchage_date) {
        const date = new Date(purchage_date);
        const month = date.toLocaleString('default', {
            month: 'short'
        }).toUpperCase();
        const year = date.getFullYear();

        return month + year;
    }

    $(".add_more_model").on("change", ".all_model", function() {
        var purchage_date = $('#purchage_date').val();
        var model_code = $(this).val();
        let csrf = '{{ csrf_token() }}';
        var tr = $(this).parent().parent();
        $.ajax({
            url: "{{ route('purchage.get_mrp') }}",
            method: 'post',
            data: {
                model_code: model_code,
                _token: csrf
            },
            success: function({
                color,
                mrp
            }) {
                tr.find(".unit_price").val(mrp[0].mrp);
                tr.find(".unit_price_vat").val(mrp[0].vat_mrp);
                tr.find(".vat_purchage_mrp").val(mrp[0].vat_purchage_mrp);
                tr.find(".vat_year_purchage").val(getCurrentFinancialYear(purchage_date).replace('-', ''));
                tr.find(".vat_month_purchage").val(get_vat_purchage_month(purchage_date));
                tr.find(".purchage_price").val(mrp[0].purchage_price);
                tr.find(".color").empty();
                tr.find(".five_chassis").val('');
                tr.find(".five_engine").val('');
                tr.find(".color").append(`<option value="">None</option>`);
                color.forEach(function(item) {
                    tr.find(".color").append(`<option value="${item.color_code}">${item.color}</option>`);
                });
            },
        });
    });
</script>
<script>
    $('.tb_description').each(function() {
        $(this).click(function() {
            $(this).autocomplete({
                source: ["PULSAR 150 SD GLOSSY", "PULSAR 150 SD MATT", ]
            });
        });
    });
</script>
@endsection