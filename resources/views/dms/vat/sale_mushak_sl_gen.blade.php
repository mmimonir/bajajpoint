@extends('layouts.app')
@section('title', 'Sale Mushak Pending')

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
                    <h3 class="card-title">Pending Sale Mushak</h3>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">Sl</th>
                                <th class="align-middle">VAT Code</th>
                                <th class="align-middle">Model</th>
                                <th class="align-middle">Chassis</th>
                                <th class="align-middle">Engine</th>
                                <th class="align-middle">S.M. No</th>
                                <th class="align-middle">Sale Date</th>
                                <th class="align-middle">VAT Sale Date</th>
                                <th class="align-middle">Uml Mus Date</th>
                                <th class="align-middle">Purchage Date</th>
                                <th class="align-middle">VAT Process</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mushak_data as $data)
                            <tr>
                                <td style="text-align:center;" class="">{{$loop->iteration}}</td>
                                <td style="text-align:center;" class="">{{$data->vat_code}}</td>
                                <td class="">{{$data->model}}</td>
                                <td style="text-align:center;" class="five_chassis" cus_id="{{$data->id}}">{{$data->five_chassis}}</td>
                                <td style="text-align:center;" class="">{{$data->five_engine}}</td>
                                <td style="text-align:center;" class="sale_mushak_no" contenteditable="true">{{$data->sale_mushak_no}}</td>
                                <td style="text-align:center;" class="">{{date('d-m-Y', strtotime($data->original_sale_date))}}</td>
                                <td style="text-align:center;" class="vat_sale_date" contenteditable="true">{{date('d-m-Y', strtotime($data->vat_sale_date))}}</td>
                                <td style="text-align:center;" class="">{{date('d-m-Y', strtotime($data->mushak_date))}}</td>
                                <td style="text-align:center;" class="">{{date('d-m-Y', strtotime($data->purchage_date))}}</td>
                                <td style="text-align:center;" class="">{{$data->vat_process}}</td>
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
    $(".sale_mushak_no, .vat_sale_date").on("blur", function(e) {
        let csrf = '{{ csrf_token() }}';
        var _this = $(this).parents('tr');
        var cus_id = _this.find('.five_chassis').attr('cus_id');
        var sale_mushak_no = _this.find('.sale_mushak_no').text();
        var vat_sale_date = _this.find('.vat_sale_date').text();

        var formData = new FormData();
        formData.append("id", cus_id);
        formData.append("sale_mushak_no", sale_mushak_no);
        formData.append("vat_sale_date", vat_sale_date);
        formData.append("_token", csrf);

        if (sale_mushak_no !== '' && vat_sale_date !== '') {
            $.ajax({
                url: "{{ route('vat.assign_sale_mushak_no_store') }}",
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

            var count = api
                .column(2, {
                    search: 'applied'
                })
                .data()
                .reduce(function(a, b) {
                    return ++a;
                }, 0);
            // Update footer by showing the total with the reference of the column index
            $(api.column(0).footer()).html("Total");
            $(api.column(2, {
                filter: "applied"
            }).footer()).html(count);


        },
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
        pageLength: 100,
        responsive: true,
        lengthChange: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            'csv', 'excel',
        ]
    });
</script>
@endsection