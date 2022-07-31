@extends('layouts.app')
@section('title', 'CKD Pending')

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
                    <h3 class="card-title">Pending CKD List</h3>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">Sl</th>
                                <th class="align-middle" style="width:200px;">Vendor</th>
                                <th class="align-middle">Model</th>
                                <th class="align-middle">CKD</th>
                                <th class="align-middle">Appr. No</th>
                                <th class="align-middle">Inv. No</th>
                                <th class="align-middle">3CH</th>
                                <th class="align-middle">Chassis</th>
                                <th class="align-middle">Engine</th>
                                <th class="align-middle">Purchage Date</th>
                                <th class="align-middle" style="width:70px;">Sale Date</th>
                                <th class="align-middle">RG Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ckd_data as $data)
                            <tr>
                                <td class="">{{$loop->iteration}}</td>
                                <td class="vendor_name">{{$data->vendor_name}}</td>
                                <td class="">{{$data->model}}</td>
                                <td class="ckd_process" cus_id="{{$data->id}}">{{$data->ckd_process}}</td>
                                <td class="approval_no" contenteditable="true">{{$data->approval_no}}</td>
                                <td class="invoice_no" contenteditable="true">{{$data->invoice_no}}</td>
                                <td class="">{{$data->three_chassis}}</td>
                                <td class="">{{$data->five_chassis}}</td>
                                <td class="">{{$data->five_engine}}</td>
                                <td class="">{{date('d-m-Y', strtotime($data->purchage_date))}}</td>
                                <td class="">{{$data->original_sale_date ? date('d-m-Y', strtotime($data->original_sale_date)) : ''}}</td>
                                <td class="">{{$data->rg_number}}</td>
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
    $(".invoice_no").on("blur", function(e) {
        let csrf = '{{ csrf_token() }}';
        var _this = $(this).parents('tr');
        var cus_id = _this.find('.ckd_process').attr('cus_id');
        var approval_no = _this.find('.approval_no').text();
        var invoice_no = _this.find('.invoice_no').text();

        var formData = new FormData();
        formData.append("id", cus_id);
        formData.append("approval_no", approval_no);
        formData.append("invoice_no", invoice_no);
        formData.append("_token", csrf);
        if (invoice_no !== '' && approval_no !== '') {
            $.ajax({
                url: "{{ route('ckd.update') }}",
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        $('#example').find("td[cus_id='" + response.id + "']").text('OK');
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


        },
        // order: false,
        // columnDefs: [{
        //     targets: [4],
        //     render: $.fn.dataTable.render.intlNumber('en-IN')
        // }],
        initComplete: function() {
            this.api().columns([2]).every(function() {
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