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
                    <h3 class="card-title">Customer Data</h3>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">Sl</th>
                                <th class="align-middle">Dealer Name</th>
                                <th class="align-middle">Branch</th>
                                <th class="align-middle">Model</th>
                                <th class="align-middle">Chassis</th>
                                <th class="align-middle">Engine</th>
                                <th class="align-middle">CC</th>
                                <th class="align-middle">Color</th>
                                <th class="align-middle">Sale Date</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Mobile</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer_data as $data)
                            <tr>
                                <td class="">{{$loop->iteration}}</td>
                                <td class="">{{$data->report_code == 2000 ? "Bajaj Point" : ($data->report_code == 2011 ? "Bajaj Heaven" : ($data->report_code == 2030 ? "Bajaj Bloom" : ''))}}</td>
                                <td class="">Eskaton</td>
                                <td class="">{{$data->model}}</td>
                                <td class="">{{$data->five_chassis}}</td>
                                <td class="">{{$data->five_engine}}</td>
                                <td class="">{{$data->cubic_capacity}}</td>
                                <td class="">{{$data->color}}</td>
                                <td class="">{{$data->original_sale_date}}</td>
                                <td class="">{{$data->customer_name}}</td>
                                <td class="">{{$data->mobile}}</td>
                                @endforeach
                            </tr>
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
        pageLength: 10,
        responsive: true,
        lengthChange: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
@endsection