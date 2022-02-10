@extends('layouts.app')

@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header">
                <h3 class="bg-primary text-center p-2 text-white mt-2 rounded">Color Code Details</h3>
                <a class="m-r-15 text-muted edit float-right btn btn-primary text-white mb-1" id="add" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <div id="show_all_color_code" class="container h-100 d-flex justify-content-center">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title p-1" id="title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form action="#" method="POST" class="form-horizontal" id="edit_color_code_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Combine</label>
                        <div class="col-sm-9">
                            <input type="text" id="combine" name="combine" class="form-control" value="" />
                            <input hidden type="text" id="color_code_id" name="id" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Color Code</label>
                        <div class="col-sm-9">
                            <input type="text" id="color_code" name="color_code" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Model Code</label>
                        <div class="col-sm-9">
                            <input type="text" id="model_code" name="model_code" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Model Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="model_name" name="model_name" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Color</label>
                        <div class="col-sm-9">
                            <input type="text" id="color" name="color" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" id="description" name="description" class="form-control" value="" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" id="update_color_code" name="" class="btn btn-success btn-sm  waves-light">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Update End-->

<!-- Modal Add-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title p-1" id="title">Add</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form action="#" method="POST" class="form-horizontal" id="add_color_code_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Combine</label>
                        <div class="col-sm-9">
                            <input type="text" id="combine" name="combine" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Color Code</label>
                        <div class="col-sm-9">
                            <input type="text" id="color_code" name="color_code" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Model Code</label>
                        <div class="col-sm-9">
                            <input type="text" id="model_code" name="model_code" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Model Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="model_name" name="model_name" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Color</label>
                        <div class="col-sm-9">
                            <input type="text" id="color" name="color" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group-sm row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" id="description" name="description" class="form-control" value="" />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" id="add_color_code" name="" class="btn btn-success btn-sm  waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
    $(function() {
        $("input").prop('required', true);
        $(document).on('click', '.editIcon', function() {
            $("#update_color_code").text('Update');
            var _this = $(this).parents('tr');
            $('#combine').val(_this.find('.combine').text());
            $('#color_code').val(_this.find('.color_code').text());
            $('#model_code').val(_this.find('.model_code').text());
            $('#model_name').val(_this.find('.model_name').text());
            $('#color').val(_this.find('.color').text());
            $('#description').val(_this.find('.description').text());
            $('#color_code_id').val(_this.find('.color_code_id').text());
        });

        // add new employee ajax request
        $("#add_color_code_form").submit(function(e) {
            e.preventDefault();
            console.log('add_color_code_form');
            const FD = new FormData(this);
            $("#add_color_code").text('Adding...');
            $.ajax({
                url: "{{ route('color_code.add') }}",
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
                        $("#add_color_code_form")[0].reset();
                        fetchAll();
                    }
                    $("#addModal").modal("hide");
                },
            });
        });

        // update employee ajax request
        $("#edit_color_code_form").submit(function(e) {
            console.log('edit_color_code_form');
            e.preventDefault();
            const FD = new FormData(this);
            $("#update_color_code").text('Updating...');
            $.ajax({
                url: "{{ route('color_code.update') }}",
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
                        fetchAll();
                    }
                    $("#updateModal").modal('hide');
                }
            });
        });

        fetchAll();

        // delete employee ajax request
        $(document).on('click', '.deleteIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
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
                        url: "{{ route('color_code.delete') }}",
                        method: 'delete',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(response) {
                            // console.log(response);
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Data Deleted Successfully",
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            fetchAll();
                        }
                    });
                }
            })
        });

        function fetchAll() {
            $.ajax({
                url: "{{ route('color_code.get') }}",
                method: 'get',
                success: function(response) {
                    if (response.length > 0) {
                        var html = `<table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">Combine</th>
                                <th class="align-middle">Color Code</th>
                                <th class="align-middle">Model Code</th>
                                <th class="align-middle">Model Name</th>
                                <th class="align-middle">Color</th>
                                <th class="align-middle">Description</th>                                
                                <th hidden class="align-middle">Id</th>                                
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        response.forEach(function(data, index) {
                            console.log(data);
                            html +=
                                `<tr>                                
                                <td class="combine">${data.combine}</td>
                                <td class="color_code">${data.color_code}</td>
                                <td class="model_code">${data.model_code}</td>
                                <td class="model_name">${data.model_name}</td>
                                <td class="color">${data.color}</td>
                                <td class="description">${data.description}</td>                                
                                <td hidden class="color_code_id">${data.id}</td>                                
                                <td class="text-center">
                                    <a href="#" class="m-r-15 text-muted editIcon status" id="${data.id}" data-toggle="modal" data-idUpdate="${data.id}" data-target="#updateModal">
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
                        html = `<h3 class="text-center">No MRP Found</h3>`;
                    }
                    console.log(html);
                    $("#show_all_color_code").html(html);
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