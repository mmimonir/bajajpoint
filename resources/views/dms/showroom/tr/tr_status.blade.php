@extends('layouts.app')
@section('title', 'TR Status')

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
                    <h3 class="card-title">TR Status</h3>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <div id="show_all_tr" class="container h-100 d-flex justify-content-center">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
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
    $(document).ready(function() {
        fetchAllTr();

        function fetchAllTr() {
            const BDFormat = new Intl.NumberFormat("en-IN", {
                maximumFractionDigits: 0
            });
            $.ajax({
                url: "{{ route('tr.tr_status') }}",
                method: 'get',
                success: function({
                    tr_data,
                    status
                }) {
                    if (tr_data) {
                        var html = `<table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">Sl</th>
                                <th class="align-middle" style="width:35px;">TR Code</th>
                                <th class="align-middle" style="width:120px;">Vendor</th>
                                <th class="align-middle">Pur Date</th>
                                <th class="align-middle">Sale Date</th>
                                <th class="align-middle">VAT Pro</th>
                                <th class="align-middle" style="width:190px;">Model</th>
                                <th class="align-middle">Chassis</th>
                                <th class="align-middle">Engine</th>
                                <th class="align-middle">TR Amt</th>
                                <th class="align-middle">Whos VAT</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        tr_data.forEach(function(data, index) {
                            html +=
                                `<tr>
                                <td class="">${index + 1}</td>
                                <td class="">${data.tr_month_code}</td>                                
                                <td class="vendor_name">${data.vendor_name}</td>                                
                                <td class="">${data.purchage_date}</td>
                                <td class="">${data.original_sale_date}</td>
                                <td class="">${data.vat_process}</td>
                                <td class="">${data.model}</td>
                                <td class="">${data.five_chassis}</td>
                                <td class="">${data.five_engine}</td>
                                <td class="text-right">${BDFormat.format(data.tr)}</td>
                                <td class="">${data.whos_vat}</td>                                
                            </tr>`;
                        });
                        html += `<tfoot align="right" class="text-sm">
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
                            </tr>
                        </tfoot>`;
                        html += `</tbody></table>`;
                    } else {
                        html = `<h3 class="text-center">No TR Found</h3>`;
                    }
                    $("#show_all_tr").html(html);
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
                            this.api().columns([1, 10, 5]).every(function() {
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
                }
            });
        }
    });
</script>
@endsection