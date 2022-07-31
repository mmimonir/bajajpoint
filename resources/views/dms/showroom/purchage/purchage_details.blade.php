@extends('layouts.app')
@section('title', 'Purchase Details')

@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header bg-dark">
                <div class="row">
                    <div class="col-md-6">
                        <h4 style="margin-top:5px;">Purchage Details</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('purchage.purchage_entry') }}" class="m-r-15 edit float-right btn btn-info mb-1" style="color:white!important;">Purchage Entry</i>
                        </a>
                        <a href="{{ route('purchage.index') }}" class="m-r-15 edit float-right btn btn-info mb-1" style="color:white!important;">Purchage List</i>
                        </a>
                    </div>
                </div>
            </div>
            <form action="#" method="POST" id="purchage_detail_update">
                @csrf
                <div class="card-header">
                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="challan_no" class="col-sm-4 col-form-label form-control-sm">Challan No</label>
                                <div class="col-sm-8">
                                    <input required type="text" class="form-control form-control-sm" id="challan_no" name="challan_no" value="{{$purchages->factory_challan_no}}">
                                    <input required hidden type="text" name="id" value="{{$purchages->id}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="purchage_date" class="col-sm-4 col-form-label form-control-sm">Date</label>
                                <div class="col-sm-8">
                                    <input required type="date" class="form-control form-control-sm" id="purchage_date" name="purchage_date" value="{{$purchages->purchage_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="vendor" class="col-sm-4 col-form-label form-control-sm">Vendor</label>
                                <div class="col-sm-8">
                                    <input required type="text" class="form-control form-control-sm" id="vendor" name="vendor" value="{{$purchages->vendor}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="dealer_name" class="col-sm-4 col-form-label form-control-sm">Dealer</label>
                                <div class="col-sm-8">
                                    <input required type="text" class="form-control form-control-sm" id="dealer_name" name="dealer_name" value="{{$purchages->dealer_name}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="quantity" class="col-sm-4 col-form-label form-control-sm">Quantity</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="quantity" name="quantity" value="{{$purchages->quantity}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="purchage_value" class="col-sm-4 col-form-label form-control-sm">Value</label>
                                <div class="col-sm-8">
                                    <input required type="text" class="form-control form-control-sm" id="purchage_value" name="purchage_value" value="{{$purchages->purchage_value}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0 row">
                                <label for="gate_pass" class="col-sm-4 col-form-label form-control-sm">Gate Pass</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="gate_pass" name="gate_pass" value="{{$purchages->gate_pass}}" placeholder="Gate Pass">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-info text-white" style="width:250px; margin-top:10px;">Update</button>
                    </div>
                </div>
            </form>
            <div class="card-body d-flex justify-content-center">
                <div id="purchage_details_list">
                    <table id="example" class="table table-hover table-responsive table-striped table-bordered" style="width:100%;">
                        <thead class="text-sm">
                            <tr>
                                <th class="align-middle">Sl</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Sale Date</th>
                                <th class="align-middle">Print</th>
                                <th class="align-middle">Chassis</th>
                                <th class="align-middle">Engine</th>
                                <th class="align-middle">VAT Purc</th>
                                <th class="align-middle">VY Pur</th>
                                <th class="align-middle">Buy Price</th>
                                <th class="align-middle">Mushak</th>
                                <th class="align-middle">Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $purchage_details as $detail )
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$detail->model}}</td>
                                <td>{{$detail->original_sale_date}}</td>
                                <td>{{$detail->print_code}}</td>
                                <td class="text-center">{{$detail->five_chassis}}</td>
                                <td class="text-center">{{$detail->five_engine}}</td>
                                <td class="text-right">{{$detail->vat_purchage_mrp}}</td>
                                <td class="text-center">{{$detail->vat_year_purchage}}</td>
                                <td class="purchage_price text-right">{{$detail->purchage_price}}</td>
                                <td style="text-align:center;">{{$detail->uml_mushak_no}}</td>
                                <td class="">{{$detail->mushak_date}}</td>
                            </tr>
                            @endforeach
                        <tfoot align="right" class="text-sm">
                            <tr>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:right; padding:2px 8px;"></th>
                                <th style="text-align:center; padding:2px 8px;"></th>
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
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header bg-dark">
                <h4 style="margin-top:5px;">UML Mushak Update</h4>
            </div>
            <form action="{{route('purchage.uml_mushak_bulk_update')}}" method="post" id="print_update_form">
                @csrf
                <div class="card-body">
                    <div class="form-row d-flex justify-content-center">
                        <div class="col-md-12">
                            <div class="form-group mb-0 row">
                                <label for="uml_mushak_no" class="col-sm-4 col-form-label form-control-sm">UML Mushak</label>
                                <div class="col-sm-8">
                                    <input hidden type="text" name="id" value="{{$purchages->id}}">
                                    <input type="text" value="{{$uml_data ? $uml_data->uml_mushak_no : ''}}" class="form-control form-control-sm" id="uml_mushak_no" name="uml_mushak_no">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0 row">
                                <label for="mushak_date" class="col-sm-4 col-form-label form-control-sm">UML Mushak Date</label>
                                <div class="col-sm-8">
                                    <input type="date" value="{{$uml_data ? $uml_data->mushak_date : ''}}" class="form-control form-control-sm" id="mushak_date" name="mushak_date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-info text-white" style="width:250px; margin-top:10px;">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header bg-dark">
                <h4 style="margin-top:5px;">Print Code Update</h4>
            </div>
            <form action="{{route('purchage.print_code_update')}}" method="post" id="print_update_form">
                @csrf
                <div class="card-body">
                    <div class="form-row d-flex justify-content-center">
                        <div class="col-md-12">
                            <div class="form-group mb-0 row">
                                <label for="uml_mushak_no" class="col-sm-4 col-form-label form-control-sm">Print Code</label>
                                <div class="col-sm-8">
                                    <input hidden type="text" name="id" value="{{$purchages->id}}">
                                    <input type="text" value="{{$uml_data ? $uml_data->print_code : ''}}" class="form-control form-control-sm" id="print_code" name="print_code">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-info text-white" style="width:250px; margin-top:10px;">Update</button>
                    </div>
                </div>
            </form>
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
<!-- <script src="https://cdn.datatables.net/plug-ins/1.11.4/api/sum().js"></script> -->
<!-- <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script> -->
@endsection

@section('script')
<script>
    $("#purchage_detail_update").submit(function(e) {
        e.preventDefault();
        const FD = new FormData(this);
        $.ajax({
            url: "{{ route('purchage.purchage_detail_update') }}",
            method: 'post',
            data: FD,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.status == 200) {
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 2000
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            }
        });
    });
    $("#example").DataTable({
        "bPaginate": false,
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

            var mrp = api
                .column(6)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var buy_price = api
                .column(8)
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
            $(api.column(6).footer()).html(mrp.toLocaleString('en-IN'));
            $(api.column(1).footer()).html(count);
            $(api.column(8).footer()).html(buy_price.toLocaleString('en-IN'));
        },
        columnDefs: [{
            targets: [6, 8],
            render: $.fn.dataTable.render.intlNumber('en-IN')
        }],

        pageLength: 10,
        responsive: true,
        lengthChange: true,
        bInfo: false,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]

    });
</script>
@endsection