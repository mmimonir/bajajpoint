@extends('layouts.app')
@section('title', 'Current Motorcycle Stock')
@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header">
                <h3 class="bg-dark text-center p-2 text-white mt-2 rounded">Current Stock</h3>
                <a class="m-r-15 text-muted edit float-right btn btn-dark text-white mb-1" id="add" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <div id="show_all_data" class="container h-100 d-flex justify-content-center">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
    $(document).ready(function() {
        fetchAllData();

        function fetchAllData() {
            const BDFormat = new Intl.NumberFormat("en-IN", {
                maximumFractionDigits: 0
            });
            $.ajax({
                url: "{{ route('showroom.current_stock') }}",
                method: 'get',
                success: function({
                    stock
                }) {

                    if (stock.length > 0) {
                        var html = `<table id="example" class="table table-hover table-responsive table-striped text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="text-center">Sl</th>
                                <th class="text-center">Dealer Name</th>                                                                
                                <th class="text-center">Model</th>                                
                                <th class="text-center">Buy Price</th>                                                                
                                <th class="text-center">MRP</th>
                                <th class="text-center">Submit Date</th>                                                                
                                <th class="text-center">Status</th>                                                                
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        stock.forEach(function(data, index) {
                            html +=
                                `<tr style="height:30px;">                                
                                <td class="dealer_name text-center">${index + 1}</td>
                                <td class="dealer_name">${data.name}</td>                                                                
                                <td class="model_name">${data.model}</td>
                                <td class="buy_price text-right">${BDFormat.format(data.buy_price)}</td>
                                <td class="vat_mrp text-right">${BDFormat.format(data.vat_mrp)}</td>
                                <td class="submit_date text-center">${data.submit_date}</td>                                                                
                                <td class="text-center">${data.status}</td>                                                                
                                <td class="text-center">
                                <input class="id" type="hidden" name="id" value="${data.pd_id}">
                                    <a href="#" class="m-r-15 text-muted viewIcon">
                                        <i class="fa fa-eye" style="color: #2196f3;font-size:16px;"></i>                                    
                                    </a>
                                    <a href="#" class="m-r-15 text-muted editIcon">
                                        <i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i>
                                    </a>                                    
                                    <a href="#" class="deleteIcon">
                                        <i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:16px;">
                                        </i>
                                    </a>
                                </td>
                            </tr>`;
                        });
                        html += `</tbody></table>`;
                    } else {
                        html = `<h3 class="text-center">No Data Found</h3>`;
                    }
                    $("#show_all_data").html(html);
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