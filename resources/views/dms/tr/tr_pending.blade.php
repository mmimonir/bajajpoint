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
                    <h3 class="card-title">Pending TR List</h3>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">Sl</th>
                                <th class="align-middle" style="width:35px;">Print Code</th>
                                <th class="align-middle" style="width:120px;">Vendor</th>
                                <th class="align-middle">Pur Date</th>
                                <th class="align-middle">Sale Date</th>
                                <th class="align-middle">VAT Pro</th>
                                <th class="align-middle" style="width:170px;">Model</th>
                                <th class="align-middle">Chassis</th>
                                <th class="align-middle">Engine</th>
                                <th class="align-middle">TR Amt</th>
                                <th class="align-middle">RG Number</th>
                                <th class="align-middle">EVL Inv</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tr_data as $data)
                            <tr>
                                <td class="">{{$loop->iteration}}</td>
                                <td class="">{{$data->print_code}}</td>
                                <td class="vendor_name">{{$data->vendor_name}}</td>
                                <td class="">{{date('d-m-Y', strtotime($data->purchage_date))}}</td>
                                <td class="">{{$data->original_sale_date ? date('d-m-Y', strtotime($data->original_sale_date)) : ''}}</td>
                                <td class="">{{$data->vat_process}}</td>
                                <td class="">{{$data->model}}</td>
                                <td class="">{{$data->five_chassis}}</td>
                                <td class="">{{$data->five_engine}}</td>
                                <td class="" style="text-align:right;">{{$data->tr_amount}}</td>
                                <td class="">{{$data->rg_number}}</td>
                                <td class="">{{$data->evl_invoice_no}}</td>
                                @endforeach
                            </tr>
                        <tfoot align="right" class="text-sm">
                            <tr>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
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
    $("#example").DataTable({
        exportOptions: {
            rows: ':visible'
        },
        pageLength: 10,
        responsive: true,
        lengthChange: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            'csv', 'excel',
        ],
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

            var count = api
                .column(6, {
                    search: 'applied'
                })
                .data()
                .reduce(function(a, b) {
                    return ++a;
                }, 0);
            var tr_amount = api
                .column(9, {
                    search: 'applied'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            // Update footer by showing the total with the reference of the column index
            $(api.column(0).footer()).html("Total");
            $(api.column(9, {
                filter: "applied"
            }).footer()).html(tr_amount.toLocaleString('en-IN'));
            $(api.column(6, {
                filter: "applied"
            }).footer()).html(count);
        },
        columnDefs: [{
            targets: [9],
            render: $.fn.dataTable.render.intlNumber('en-IN')
        }],
        initComplete: function() {
            this.api().columns([1]).every(function() {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.footer()))
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        },
    });
</script>
@endsection