@extends('layouts.app')
@section('title', 'Quotation')

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
                        <h4 style="margin-bottom:0px;">Quatation</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{route('quotation.list')}}" target="_blank" rel="noopener noreferrer">
                            <button class="btn btn-info btn-sm text-white">Quotation List</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="#" method="post" id="quotation_create_form">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="ref" class="col-sm-4 col-form-label">Ref:</label>
                                <div class="col-sm-8">
                                    <input required type="text" class="form-control form-control-sm" id="ref" name="ref" value="Ref: Bajaj Point/Offer-">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="qt_date" class="col-sm-4 col-form-label">Date:</label>
                                <div class="col-sm-8">
                                    <input required type="date" class="form-control form-control-sm" id="qt_date" name="qt_date" placeholder="Challan No">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="to" class="col-sm-2 col-form-label">To</label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control form-control-sm" id="to" name="to" placeholder="XYZ Company Ltd">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="address_one" class="col-sm-2 col-form-label">Address 1</label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control form-control-sm" id="address_one" name="address_one" placeholder="23/Ka New Eskaton Road">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-sm mb-0 row">
                                <label for="address_two" class="col-sm-2 col-form-label">Address 2</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="address_two" name="address_two" placeholder="Ramna, Dhaka-1212">
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
                                    <input required type="text" class="form-control form-control-sm" id="subject" name="subject" value="OFFER FOR SUPPLY OF BAJAJ MOTORCYCLE.">
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
                                    <input style="width:100%;" required name="tb_description[]" class="form-control form-control-sm tb_description" id="tb_description" style="width:300px;">
                                </td>
                                <td>
                                    <input required name="tb_unit[]" type="text" class="form-control form-control-sm tb_unit text-center" id="tb_unit" placeholder="Unit">
                                </td>
                                <td>
                                    <input required name="tb_unit_price[]" type="text" class="form-control form-control-sm text-center tb_unit_price" id="tb_unit_price" placeholder="Unit Price">
                                </td>
                                <td>
                                    <input required name="tb_grand_total[]" type="text" class="form-control form-control-sm tb_grand_total text-right" id="tb_grand_total" placeholder="Total">
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
                    <div class="form-row d-flex justify-content-center" style="margin-top:10px;">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group form-group-sm mb-0 row">
                                    <label for="discount" class="col-sm-4 col-form-label">Discount</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="discount" name="discount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-sm mb-0 row">
                                    <label for="validity" class="col-sm-4 col-form-label">Validity:</label>
                                    <div class="col-sm-8">
                                        <input required type="date" class="form-control form-control-sm" id="validity" name="validity" placeholder="Ref: Bajaj Point/Offer-">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-sm mb-0 row">
                                    <label for="notes" class="col-sm-4 col-form-label">Note</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="notes" name="notes" value="All price are without AIT">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-sm mb-0 row">
                                    <label for="for" class="col-sm-4 col-form-label">For</label>
                                    <div class="col-sm-8">
                                        <input required type="text" class="form-control form-control-sm" id="for" name="for" value="Bajaj Point">
                                    </div>
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
            <div class="card-footer">

                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end" id="qt-list">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
    $("#quotation_create_form").submit(function(e) {
        e.preventDefault();
        const FD = new FormData(this);
        $.ajax({
            url: "{{ route('quotation.store') }}",
            method: 'post',
            data: FD,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function({
                status,
                last_data
            }) {
                console.log(last_data);
                if (status == 200) {
                    var html = `<table id="example" class="table table-hover table-sm table-bordered">
                        <thead class="text-center">
                            <tr class="text-sm">
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>QT Date</th>
                                <th>Validity</th>
                                <th>Action (Print)</th>
                            </tr>
                        </thead>
                        <tbody>                    
                            <tr>
                                <td>${1}</td>
                                <td>${last_data.to}</td>
                                <td>${last_data.address_one}</td>
                                <td>
                                    ${last_data.qt_date}
                                </td>
                                <td>
                                    ${last_data.validity}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center text-decoration btn-group">
                                        <a href="quotation_print_html/${last_data.id}" target="_blank" class="btn-sm">
                                            <i class="fa fa-print" style="color: #2196f3;font-size:16px;"></i>
                                        </a>                                        
                                    </div>
                                </td>
                            </tr>
                            </tbody></table>`;
                    Swal.fire({
                        icon: 'success',
                        title: "Created Successfully",
                        showConfirmButton: false,
                        timer: 2000
                    })
                } else {
                    html = `<h3 class="text-center">No Data Found</h3>`;
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
                $("#qt-list").html(html);
                $('#quotation_create_form').trigger("reset");
            }
        });
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
    $("#tbl").on("keyup", ".tb_description", function() {
        var tr = $(this).parent().parent();
        tr.find(".tb_description").autocomplete({
            source: [
                "Bajaj Pulsar 160 NS ABS",
                "Bajaj Pulsar 150 SD GLOSSY",
                "Bajaj Pulsar 150 SD MATT",
                "Bajaj Pulsar 150 TD MATT",
                "Bajaj Pulsar 150 TD GLOSSY",
                "Bajaj Pulsar 150 TD ABS",
                "Bajaj Discover 125 Disc",
                "Bajaj Discover 110 Disc",
                "Bajaj Platina 110 Disc",
                "Bajaj Platina 100 ES",
                "Bajaj CT-100 ES",
                "Bajaj Avenger 160 ABS TD",
                "Registration (10 Years)",
                "Registration (02 Years)",
                "Other's",
            ]
        });
    });
    $("#tbl").on("blur", ".tb_unit_price, .tb_unit ", function() {
        var tr = $(this).parent().parent();
        var qty = +tr.find(".tb_unit").val();
        var unit_price = +tr.find(".tb_unit_price").val();
        tr.find(".tb_grand_total").val(qty * unit_price);
    });
</script>
@endsection