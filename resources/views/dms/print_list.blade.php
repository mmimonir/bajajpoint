@extends('layouts.app') @section('title', 'Print List') @section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Print List</h1>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                <div class="card-body">
                    <table id="example" class="table table-hover table-sm table-bordered">
                        <thead class="text-center">
                            <tr class="text-sm">
                                <th>Sl</th>
                                <th>Model</th>
                                <th>Sale Date</th>
                                <th>Chassis No</th>
                                <th>Engine No</th>
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                <th>Action (Print)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($print_lists as $data)
                            <tr>
                                <td>#</td>
                                <td>{{$data->model}}</td>
                                <td>
                                    {{date('d-M-Y', strtotime($data->original_sale_date))}}
                                </td>
                                <td>
                                    {{$data->eight_chassis.$data->one_chassis.$data->three_chassis.$data->five_chassis}}
                                </td>
                                <td>
                                    {{$data->six_engine.$data->five_engine}}
                                </td>
                                <td>
                                    {{\Illuminate\Support\Str::limit($data->customer_name, 20, $end='...')}}
                                </td>
                                <td>{{$data->mobile}}</td>
                                <td>
                                    <div class="d-flex justify-content-center padd text-decoration btn-group">
                                        <a href="{{route('print.hform', ['id' => $data->id])}}" target="_blank" class="btn-sm bg-dark">
                                            Hform
                                        </a>
                                        <a href="#" class="btn-sm bg-dark">
                                            Stamp
                                        </a>
                                        <a href="{{route('pdf.gate_pass', ['id' => $data->id])}}" target="_blank" class="btn-sm bg-dark">
                                            Gate Pass
                                        </a>
                                        <a href="{{route('print.single_file_print', ['id' => $data->id])}}" target="_blank" class="btn-sm bg-dark">
                                            File Print
                                        </a>
                                        <a href="{{route('sale.sales_update', ['id' => $data->id])}}" target="_blank" class="btn-sm bg-dark">
                                            Edit
                                        </a>
                                        <a href="#" target="_blank" class="btn-sm bg-dark">
                                            Bank Slip
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('datatable')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@endsection @section('script')
<script>
    $("#example").DataTable({
        bPaginate: false,
        pageLength: 10,
        responsive: true,
        lengthChange: true,
    });
</script>
@endsection