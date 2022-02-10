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
                    <h3 class="card-title">Sale Report</h3>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">Sl</th>
                                <th class="align-middle">Dealer</th>
                                <th class="align-middle">Vendor</th>
                                <th class="align-middle">Sale Date</th>
                                <th class="align-middle">Model</th>
                                <th class="align-middle">Chassis</th>
                                <th class="align-middle">Engine</th>
                                <th class="align-middle">Color</th>
                                <th class="align-middle">Sale Price</th>
                                <th class="align-middle">Profit</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Mobile</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sale_report as $data)
                            <tr>
                                <td class="">{{$loop->iteration}}</td>
                                <td class="">{{$data->dealer}}</td>
                                <td class="">{{$data->vendor}}</td>
                                <td class="">{{$data->original_sale_date}}</td>
                                <td class="">{{$data->model}}</td>
                                <td class="">{{$data->five_chassis}}</td>
                                <td class="">{{$data->five_engine}}</td>
                                <td class="">{{$data->color}}</td>
                                <td class="">{{$data->sale_price}}</td>
                                <td class="">{{$data->sale_profit}}</td>
                                <td class="">{{$data->customer_name}}</td>
                                <td class="">{{$data->mobile}}</td>
                                <td class="" style="text-align:center;">
                                    <a href="#">
                                        <span class="bg-dark btn btn-sm">View</span>
                                    </a>
                                </td>
                                @endforeach
                            </tr>
                        <tfoot align="right" class="text-sm">
                            <tr>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                            </tr>
                        </tfoot>
                        <tfoot id="search"></tfoot>
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
    // $('#example thead tr')
    //     .clone(true)
    //     .addClass('filters')
    //     .appendTo('#search');

    $("#example").DataTable({
        exportOptions: {
            rows: ':visible'
        },
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

            var sale_price = api
                .column(8, {
                    search: 'applied'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            var sale_profit = api
                .column(9, {
                    search: 'applied'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            var count = api
                .column(4, {
                    search: 'applied'
                })
                .data()
                .reduce(function(a, b) {
                    return ++a;
                }, 0);
            // Update footer by showing the total with the reference of the column index
            $(api.column(0).footer()).html("Total");
            $(api.column(4, {
                filter: "applied"
            }).footer()).html(count);
            $(api.column(8).footer()).html(sale_price.toLocaleString('en-IN'));
            $(api.column(9).footer()).html(sale_profit.toLocaleString('en-IN'));

        },
        order: false,
        // columnDefs: [{
        //     targets: [4],
        //     render: $.fn.dataTable.render.intlNumber('en-IN')
        // }],
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


        pageLength: 10,
        responsive: true,
        lengthChange: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            'csv', 'excel',
        ]
    });
</script>
@endsection