@extends('layouts.app')
@section('title', 'Purchase List')

@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header bg-dark">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Purchage</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('purchage.index')}}" class="m-r-15 text-muted edit float-right btn btn-dark text-white mb-1">Purchage Entry</i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="show_purchage_list" class="container h-100 d-flex justify-content-center">
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
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
    $(function() {

        fetchAll();

        function fetchAll() {
            $.ajax({
                url: "{{ route('purchage.list') }}",
                method: 'get',
                success: function(response) {
                    if (response.length > 0) {
                        var html = `<table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">Id No</th>
                                <th class="align-middle">Challan No</th>
                                <th class="align-middle">Purchage Date</th>
                                <th class="align-middle">Vendor Name</th>
                                <th class="align-middle">Quantity</th>
                                <th class="align-middle">Purchage Value</th>
                                <th class="align-middle">UML Mushak No</th>
                                <th class="align-middle">UML Mushak Date</th>                                
                                <th class="align-middle">Dealer Name</th>                                
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        response.forEach(function(data, index) {
                            var date = new Date(data.purchage_date);

                            // date.toLocalDateString('en-GB');

                            // var date = new Date(data.purchage_date);
                            // var d = date.getDate();
                            // var m = date.getMonth() + 1;
                            // var y = date.getFullYear();
                            // var dateString = (d <= 9 ? '0' + d : d) + '-' + (m <= 9 ? '0' + m : m) + '-' + y;
                            // console.log(data);
                            html +=
                                `<tr>                                
                                <td class="challan_no">${data.id}</td>                                
                                <td class="challan_no">${data.factory_challan_no}</td>                                
                                <td class="purchage_date">${date_format(date, 'dd-MM-yyyy')}</td>
                                <td class="vendor">${data.vendor}</td>
                                <td class="vendor">${data.quantity}</td>
                                <td class="purchage_value">${data.purchage_value}</td>
                                <td class="uml_mushak_no">${data.uml_mushak_no}</td>
                                <td class="uml_mushak_date">${data.uml_mushak_date}</td>                                
                                <td class="dealer_name">${data.dealer_name}</td>                                
                                <td class="text-center">                                
                                    <a href="purchage_details/${data.id}" class="m-r-15 text-muted">
                                        <i class="fa fa-eye" style="color: #2196f3;font-size:16px;"></i>
                                    </a>
                                    <a href="#" class="m-r-15 text-muted editIcon status" id="${data.id}" data-bs-toggle="modal" data-idUpdate="${data.id}" data-bs-target="#updateModal">
                                        <i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i>
                                    </a>
                                    <a href="#" class="deleteIcon" id="${data.id}">
                                        <i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:16px;">
                                        </i>
                                    </a>
                                </td>
                            </tr>`;
                        });
                        html += `</tbody></table>`;
                    } else {
                        html = `<h3 class="text-center">No Purchage Found</h3>`;
                    }
                    console.log(html);
                    $("#show_purchage_list").html(html);
                    $("#example").DataTable({
                        pageLength: 10,
                        responsive: true,
                        lengthChange: true,
                        dom: '<"html5buttons"B>lTfgitp',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                }
            });
        };
    });
</script>
@endsection