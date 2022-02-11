@extends('layouts.app')

@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Purchage</h4>
                    </div>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <div class="col-md-6">
                        <a href="{{route('purchage_list.index')}}" class="m-r-15 edit float-right btn btn-dark mb-1">Purchage List</i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('purchage.create')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="challan_no" class="col-sm-4 col-form-label">Challan No</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="challan_no" name="challan_no" placeholder="Challan No">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="purchage_date" class="col-sm-4 col-form-label">Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="purchage_date" name="purchage_date" placeholder="Purchage Date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="vendor" class="col-sm-4 col-form-label">Vendor</label>
                                <div class="col-sm-8">
                                    <select name="vendor" class="browser-default custom-select">
                                        <option selected>Open this select menu</option>
                                        @foreach ($suppliers as $supplier)
                                        <option value="{{$supplier->supplier_name}}">{{$supplier->supplier_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="vendor" class="col-sm-4 col-form-label">Dealer</label>
                                <div class="col-sm-8">
                                    <select name="dealer_name" class="browser-default custom-select">
                                        <option selected>Open this select menu</option>
                                        @foreach ($dealer_names as $dealer)
                                        <option value="{{$dealer->dealer_name}}">{{$dealer->dealer_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="purchage_value" class="col-sm-4 col-form-label">Quantity</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="purchage_value" class="col-sm-4 col-form-label">Value</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="purchage_value" name="purchage_value" placeholder="Purchage Value">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="uml_mushak_no" class="col-sm-4 col-form-label">Mushak No</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="uml_mushak_no" name="uml_mushak_no" placeholder="UML Mushak">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="uml_mushak_date" class="col-sm-4 col-form-label">Mushak Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="uml_mushak_date" name="uml_mushak_date" placeholder="Purchage Value">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header"></div>
                    <table align="center" style="width:100%;" id="tbl">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Sl</th>
                                <th style="text-align:center;">Model Name</th>
                                <th style="text-align:center;">Chassis No</th>
                                <th style="text-align:center;">Engine No</th>
                                <th style="text-align:center;">Color</th>
                                <th style="text-align:center;">Unit Price</th>
                                <th style="text-align:center;">Unit Price VAT</th>
                                <th style="text-align:center;">VAT Pur MRP</th>
                                <th style="text-align:center;">VAT Year</th>
                                <th style="text-align:center;">Purchage Price</th>
                            </tr>
                        </thead>
                        <tbody class="add_more_model">
                            <tr>
                                <td>#</td>
                                <td>
                                    <!-- <select name="model_code[]" class="browser-default custom-select"> -->
                                    <select name="model_code[]" class="form-control form-control-sm all_model" style="width:230px;">
                                        <option selected>Open this select menu</option>
                                        @foreach ($mrps as $mrp)
                                        <option value="{{$mrp->model_code}}">{{$mrp->model_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm five_chassis text-center" id="five_chassis" name="five_chassis[]" placeholder="Chassis">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm text-center five_engine" id="five_engine" name="five_engine[]" placeholder="Engine">
                                </td>
                                <td>
                                    <select name="color_code[]" class="form-control form-control-sm color" style="width:100px;">
                                        <option value="">None</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm unit_price text-right" id="unit_price" name="unit_price[]" placeholder="Unit Price">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm unit_price_vat text-right" id="unit_price_vat" name="unit_price_vat[]" placeholder="UP Vat">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm vat_purchage_mrp text-right" id="vat_purchage_mrp" name="vat_purchage_mrp[]" placeholder="Vat Pur MRP">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm vat_year_purchage text-right" id="vat_year_purchage" name="vat_year_purchage[]" placeholder="Vat Year Purchage">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm purchage_price text-right sum" id="purchage_price" name="purchage_price[]" placeholder="Purchage Price">
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="form-control form-control-sm text-center"><b>Total</b></td>
                                <td><input type="text" class="form-control form-control-sm grant_total text-right text-bold" id="grant_total"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <center style="padding:10px;">
                        <button id="add" style="width:100px;" class="btn btn-success btn-sm">Add</button>
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

@section('datatable')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
@endsection

@section('script')
<script>
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

    $(".add_more_model").on("change", ".all_model", function() {
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
                tr.find(".vat_year_purchage").val(20212022);
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
@endsection