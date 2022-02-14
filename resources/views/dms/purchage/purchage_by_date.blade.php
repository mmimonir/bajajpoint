@extends('layouts.app')
@section('title', 'Purchase By Date')
@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                <div class="card-header bg-dark" style="background-color:#343A40;">
                    <h3 class="card-title">Purchage By Date</h3>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr style="text-align:center;">
                                <th>Sl</th>
                                <th>Challan</th>
                                <th style="width:60px;">Date</th>
                                <th style="width:120px;">Vendor</th>
                                <th>Value</th>
                                <th>Qty</th>
                                <th>VYear</th>
                                <th>VMonth</th>
                                <th>VAT Pro</th>
                                <th>TR Date</th>
                                <th>GP</th>
                                <th>TR Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchage_data as $data)
                            <tr>
                                <td class="">{{$loop->iteration}}</td>
                                <td class="">{{$data->factory_challan_no}}</td>
                                <td style="text-align:center;">{{date('d-m-Y', strtotime($data->purchage_date))}}</td>
                                <td class="">{{$data->vendor}}</td>
                                <td class="" style="text-align:right;">{{$data->purchage_value}}</td>
                                <td class="" style="text-align:center;">{{$data->quantity}}</td>
                                <td class="">{{$data->vat_year_purchage}}</td>
                                <td style="text-align:center;">{{$data->vat_month_purchage}}</td>
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
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
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
                .column(5, {
                    search: 'applied'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            var value = api
                .column(4, {
                    search: 'applied'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            var count = api
                .column(1)
                .data()
                .reduce(function(a, b) {
                    return ++a;
                }, 0);

            // Update footer by showing the total with the reference of the column index
            $(api.column(0).footer()).html("Total");
            $(api.column(1).footer()).html(count);
            $(api.column(4, {
                filter: "applied"
            }).footer()).html(value);
            $(api.column(5, {
                filter: "applied"
            }).footer()).html(qty);

        },
        columnDefs: [{
            targets: [4],
            render: $.fn.dataTable.render.intlNumber('en-IN')
        }],

        pageLength: 10,
        responsive: true,
        lengthChange: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        initComplete: function() {
            this.api().columns([2, 3]).every(function() {
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