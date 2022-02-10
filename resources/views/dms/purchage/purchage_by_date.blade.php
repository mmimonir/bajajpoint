@extends('layouts.app')

@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                <div class="card-header" style="background-color:#343A40;">
                    <h3 class="card-title">Purchage By Date</h3>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">Challan</th>
                                <th class="align-middle" style="width:60px;">Date</th>
                                <th class="align-middle" style="width:120px;">Vendor</th>
                                <th class="align-middle">Value</th>
                                <th class="align-middle">Uml Mush</th>
                                <th class="align-middle">Date</th>
                                <th class="align-middle">Qty</th>
                                <th class="align-middle">Rebate</th>
                                <th class="align-middle">VYear</th>
                                <th class="align-middle">VMonth</th>
                                <th class="align-middle">VAT Pro</th>
                                <th class="align-middle">TR Date</th>
                                <th class="align-middle">GP</th>
                                <th class="align-middle">TR Code</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchage_data as $data)
                            <tr>
                                <td class="">{{$data->factory_challan_no}}</td>
                                <td class="">{{$data->purchage_date}}</td>
                                <td class="">{{$data->vendor}}</td>
                                <td class="">{{$data->purchage_value}}</td>
                                <td class="">{{$data->uml_mushak_no}}</td>
                                <td class="">{{$data->uml_mushak_date}}</td>
                                <td class="">{{$data->quantity}}</td>
                                <td class="">{{$data->purchage_rebate}}</td>
                                <td class="">{{$data->vat_year_purchage}}</td>
                                <td class="">{{$data->vat_month_purchage}}</td>
                                <td class="">{{$data->vat_process}}</td>
                                <td class="">{{$data->tr_dep_date}}</td>
                                <td class="">{{$data->gate_pass}}</td>
                                <td class="">{{$data->tr_month_code}}</td>
                                <td class="" style="text-align:center;">
                                    <a href="{{route('purchage.purchage_details_id', ['id'=>$data->id])}}" target="_blank">
                                        <span class="bg-dark btn btn-sm">View</span>
                                    </a>
                                </td>
                                @endforeach
                            </tr>
                        <tfoot align="right" class="text-sm">
                            <tr>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>
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
    $("#example").DataTable({
        footerCallback: function(row, data, start, end, display) {
            var api = this.api(),
                data;

            // converting to interger to find total
            var intVal = function(i) {
                return typeof i === "string" ?
                    i.replace(/[\$,]/g, "") * 1 :
                    typeof i === "number" ?
                    i :
                    0;
            };

            // computing column Total of the complete result


            var qty = api
                .column(6)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var mrp_vat_pur = api
                .column(7)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var buy_price = api
                .column(9)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            var value = api
                .column(3)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            var count = api
                .column(2)
                .data()
                .reduce(function(a, b) {
                    return ++a;
                }, 0);

            // Update footer by showing the total with the reference of the column index
            $(api.column(0).footer()).html("Total");
            $(api.column(2).footer()).html(count);
            $(api.column(3).footer()).html(value.toLocaleString('en-IN'));
            $(api.column(6).footer()).html(qty);
            $(api.column(7).footer()).html(mrp_vat_pur.toLocaleString('en-IN'));
            $(api.column(9).footer()).html(buy_price.toLocaleString('en-IN'));
        },
        columnDefs: [{
            targets: [3, 5, 6, 7],
            render: $.fn.dataTable.render.intlNumber('en-IN')
        }],

        pageLength: 25,
        responsive: true,
        lengthChange: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
@endsection