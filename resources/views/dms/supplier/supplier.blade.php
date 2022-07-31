@extends('layouts.app')
@section('title', 'Supplier List')
@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header">
                <h3 class="bg-dark text-center p-2 text-white mt-2 rounded">Supplier Details</h3>
                <a class="m-r-15 text-muted edit float-right btn btn-dark text-white mb-1" id="add" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <div id="show_all_supplier" class="container h-100 d-flex justify-content-center">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Add-->
@extends('dms.supplier.modals.supplier_modal')
<!-- Modal Add End-->
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
    $(document).ready(function() {

        $(document).on('click', '#add', function() {
            $("#addModal").modal('show');
            $("form#add_supplier_form").prop('id', 'add_supplier_form');
            $("form#edit_supplier_form").prop('id', 'add_supplier_form');
            $("#addModal :input").prop("readOnly", false);
            $("form").trigger("reset");
            $("#addModal").find('#title').text('Enlist New Supplier');
            $("#add_supplier").text('Create');
            $("#supplier_id").val('');
        });

        // add new employee ajax request
        $(document).on('submit', "#add_supplier_form", function(e) {
            e.preventDefault();
            const FD = new FormData(this);

            $.ajax({
                url: "{{ route('supplier.add') }}",
                method: "post",
                data: FD,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Your work has been saved",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        $("#add_supplier_form")[0].reset();
                        fetchAll();
                    } else {
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "Something went wrong",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                    $("#addModal").modal("hide");
                },
            });
        });

        // view single supplier start
        $(document).on('click', '.viewIcon', function() {

            var _this = $(this).parent().parent();
            const id = _this.find('.id').val();

            $.ajax({
                url: "{{ route('supplier.get_single_supplier') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id
                },
                success: function(data) {

                    Object.keys(data).forEach(function(key) {
                        $("#addModal").find(`#${key}`).val(data[key]);
                    });

                    $("#addModal").modal('show');
                    $("#addModal").find('#title').text('View Supplier');
                    $("#addModal :input").prop("readOnly", true);
                }
            });
        });
        // view single supplier end

        // edit single mrp start
        $(document).on('click', '.editIcon', function() {
            $("form").trigger("reset");
            $("form#add_supplier_form").prop('id', 'edit_supplier_form');
            $("#add_supplier").text('Update');

            var _this = $(this).parent().parent();
            const id = _this.find('.id').val();

            $.ajax({
                url: "{{ route('supplier.get_single_supplier') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id
                },
                success: function(data) {

                    Object.keys(data).forEach(function(key) {
                        $("#addModal").find(`#${key}`).val(data[key]);
                    });

                    $("#addModal").modal('show');
                    $("#supplier_id").val(data.id);
                    $("#addModal :input").prop("readOnly", false);
                    $("#addModal").find('#title').text('Update Supplier Info');
                }
            });
        });
        // edit single mrp end

        // update employee ajax request
        $(document).on('submit', '#edit_supplier_form', function(e) {
            e.preventDefault();
            const FD = new FormData(this);

            $("#add_supplier").text('Updating...');
            $.ajax({
                url: "{{ route('supplier.update') }}",
                method: 'post',
                data: FD,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        })

                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                    fetchAll();
                    $("#addModal").modal('hide');
                }
            });
        });

        fetchAll();

        // delete employee ajax request
        $(document).on('click', '.deleteIcon', function(e) {
            e.preventDefault();

            var _this = $(this).parent().parent();
            const id = _this.find('.id').val();
            let csrf = '{{ csrf_token() }}';

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('supplier.delete') }}",
                        method: 'delete',
                        data: {
                            id,
                            _token: csrf
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: response.success,
                                    type: 'success',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.error,
                                    type: 'error',
                                    confirmButtonText: 'OK'
                                })
                            }
                            fetchAll();
                        }
                    });
                }
            })
        });

        function fetchAll() {
            $.ajax({
                url: "{{ route('supplier.get') }}",
                method: 'get',
                success: function(response) {
                    if (response.length > 0) {
                        var html = `<table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">Sl</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Code</th>
                                <th class="align-middle">Print Ref</th>                                
                                <th class="align-middle">Dealer</th>
                                <th class="align-middle">Status</th>                                                                
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        response.forEach(function(data, index) {
                            console.log(data);
                            html +=
                                `<tr style="height:30px;">                                
                                <td class="supplier_name">${index + 1}</td>
                                <td class="supplier_name">${data.supplier_name}</td>
                                <td class="supplier_code">${data.supplier_code}</td>
                                <td class="print_ref">${data.print_ref}</td>                                
                                <td class="dealer_name">${data.dealer_name}</td>
                                <td class="status">${data.status}</td>                                                                
                                <td class="text-center">
                                <input class="id" type="hidden" name="id" value="${data.id}">
                                    <a href="#" class="m-r-15 text-muted viewIcon" data-bs-toggle="modal" data-idUpdate="${data.id}" data-bs-target="#updateModal">
                                        <i class="fa fa-eye" style="color: #2196f3;font-size:16px;"></i>                                    
                                    </a>
                                    <a href="#" class="m-r-15 text-muted editIcon" data-bs-toggle="modal" data-idUpdate="${data.id}" data-bs-target="#updateModal">
                                        <i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i>
                                    </a>                                    
                                    <a href="#" class="deleteIcon">
                                        <i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:16px;"></i>
                                    </a>
                                </td>
                            </tr>`;
                        });
                        html += `</tbody></table>`;
                    } else {
                        html = `<h3 class="text-center">No MRP Found</h3>`;
                    }
                    console.log(html);
                    $("#show_all_supplier").html(html);
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