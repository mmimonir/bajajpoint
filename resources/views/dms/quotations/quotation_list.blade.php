@extends('layouts.app')
@section('title', 'Quotation List')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Quotation List</h1>
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
                                <th>Name</th>
                                <th>Address</th>
                                <th>QT Date</th>
                                <th>Validity</th>
                                <th>Action (Print)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotations as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->to}}</td>
                                <td>{{$data->address_one}}</td>
                                <td>
                                    {{date('d-M-Y', strtotime($data->qt_date))}}
                                </td>
                                <td>
                                    {{date('d-M-Y', strtotime($data->validity))}}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center padd text-decoration btn-group">
                                        <a href="{{route('quotation.print', ['id' => $data->id])}}" target="_blank" class="btn-sm">
                                            <i class='fas fa-print'></i>
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