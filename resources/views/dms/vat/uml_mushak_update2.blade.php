@extends('layouts.app')
@section('title', 'UML Mushak Update')

@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header bg-dark">
                <div class="row">
                    <div class="col-md-6">
                        <h4 style="margin-top:5px;">Purchage Details</h4>
                    </div>
                </div>
            </div>
            <div class="card-body d-flex justify-content-center">
                <div id="purchage_details_list">
                    <table id="example" class="table table-hover table-responsive table-striped table-bordered table-uml-mushak" style="width:100%;">
                        <thead class="text-sm">
                            <tr style="font-size:11px;">
                                <th style="text-align:center;">Sl</th>
                                <th style="text-align:center;">Code</th>
                                <th style="text-align:center;">Challan</th>
                                <th style="text-align:center;">Factory</th>
                                <th style="text-align:center;">P. Dt</th>
                                <th style="text-align:center;">Model</th>
                                <th style="text-align:center;">Chassis</th>
                                <th style="text-align:center;">Engine</th>
                                <th style="text-align:center;">Mus</th>
                                <th style="text-align:center;">Date</th>
                                <th style="text-align:center;">VAT MRP</th>
                                <th style="text-align:center;">Rebate</th>
                                <th style="text-align:center;">VYear</th>
                                <th style="text-align:center;">VMonth</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchage_data as $data)
                            <tr>
                                <td style="text-align: center;">{{$loop->iteration}}</td>
                                <td style="text-align: center;">{{$data->report_code}}</td>
                                <td style="text-align: center;">{{$data->factory_challan_no}}</td>
                                <td style="text-align: left;">{{$data->vendor}}</td>
                                <td style="text-align: center;">{{$data->purchage_date}}</td>
                                <td style="text-align: left;">{{$data->model}}</td>
                                <td style="text-align: center;">{{$data->five_chassis}}</td>
                                <td style="text-align: center;">{{$data->five_engine}}</td>
                                <td class="uml_mushak_no" cus_id="{{$data->id}}" style="text-align: center;" contenteditable="true">{{$data->uml_mushak_no}}</td>
                                <td class="mushak_date" style="text-align: center;" contenteditable="true">{{date('d-m-Y', strtotime($data->mushak_date))}}</td>
                                <td style="text-align: right;">{{$data->vat_purchage_mrp}}</td>
                                <td style="text-align: right;">{{$data->vat_rebate}}</td>
                                <td style="text-align: right;">{{$data->vat_year_purchage}}</td>
                                <td style="text-align: right;">{{$data->vat_month_purchage}}</td>
                            </tr>
                            @endforeach
                        <tfoot align="right" class="text-sm">
                            <tr style="font-size:11px;">
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
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
    $(".mushak_date").on("blur", function(e) {
        let csrf = '{{ csrf_token() }}';
        var _this = $(this).parents('tr');

        var cus_id = _this.find('.uml_mushak_no').attr('cus_id');
        var uml_mushak_no = _this.find('.uml_mushak_no').text();
        var mushak_date = new Date($(this).text().split("-").reverse().join("-")).toISOString().slice(0, 10);

        var formData = new FormData();
        formData.append("id", cus_id);
        formData.append("uml_mushak_no", uml_mushak_no);
        formData.append("mushak_date", mushak_date);
        formData.append("_token", csrf);

        if (uml_mushak_no !== '' && mushak_date !== '') {
            $.ajax({
                url: "{{ route('vat.uml_mushak_update_store') }}",
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        console.log(response);
                        // $('#example').find("td[cus_id='" + response.id + "']").text('OK');
                    } else if (response.status == 502) {
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

            var vat_mrp = api
                .column(10, {
                    search: 'applied'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var rebate = api
                .column(11, {
                    search: 'applied'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            var count = api
                .column(3, {
                    search: 'applied'
                })
                .data()
                .reduce(function(a, b) {
                    return ++a;
                }, 0);

            // Update footer by showing the total with the reference of the column index
            $(api.column(0).footer()).html("Total");
            $(api.column(10).footer()).html(vat_mrp.toLocaleString('en-IN'));
            $(api.column(3).footer()).html(count);
            $(api.column(11).footer()).html(rebate.toLocaleString('en-IN'));
        },
        columnDefs: [{
            targets: [10, 11],
            render: $.fn.dataTable.render.intlNumber('en-IN'),

        }],
        initComplete: function() {
            this.api().columns([1, 2, 4, 5, 8]).every(function() {
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

        pageLength: 200,
        responsive: true,
        lengthChange: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]

    });
</script>
@endsection