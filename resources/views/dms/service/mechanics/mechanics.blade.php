@extends('layouts.app')
@section('title', 'Mechanics List')
@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header">
                <h3 class="bg-dark text-center p-2 text-white mt-2 rounded">Mechanics Details</h3>
                <a class="m-r-15 text-muted edit float-right btn btn-dark text-white mb-1" id="add" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa-solid fa-plus"></i>
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <div id="show_all_mechanics" class="container h-100 d-flex justify-content-center">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mechanics Add Modal Start -->
@extends('dms.service.mechanics.modals.add')
<!-- Mechanics Add Modal End -->

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
        // change form id when click add button
        $(document).on('click', '#add', function() {
            $("form#add_mechanics_form").prop('id', 'add_mechanics_form');
            $("form").trigger("reset");
        });

        // submit form when click modal add button start
        $(document).on('submit', '#add_mechanics_form', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('mechanics.add') }}",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.success,
                            type: 'success',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#addModal').modal('hide');
                        fetchAllMechanics();
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response.error,
                            type: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            });
        });
        // submit form when click modal add button end

        // view single mechanic start
        $(document).on('click', '.viewIcon', function() {
            var _this = $(this).parent().parent();
            const id = _this.find('.id').val();
            $.ajax({
                url: "{{ route('mechanics.get_single_mechanic') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id
                },
                success: function(data) {
                    $("#addModal").modal('show');
                    $("#addModal").find('#title').text('View Mechanic');
                    $("#addModal").find('#name').val(data.name);
                    $("#addModal").find('#mobile').val(data.mobile);
                    $("#addModal").find('#role').val(data.role);
                    $("#addModal").find('#education').val(data.education);
                    $("#addModal").find('#permanent_address').val(data.permanent_address);
                    $("#addModal").find('#present_address').val(data.present_address);
                    $("#addModal").find('#gardian_name').val(data.gardian_name);
                    $("#addModal").find('#gardian_mobile').val(data.gardian_mobile);
                    $("#addModal").find('#joining_date').val(data.joining_date);
                    $("#addModal").find('#nid_no').val(data.nid_no);
                    $("#addModal").find('#salary').val(data.salary);
                    $("#addModal :input").prop("readOnly", true);
                }
            });
        });
        // view single mechanic end

        // edit single mechanic start
        $(document).on('click', '.editIcon', function() {
            $("#addModal :input").prop("readOnly", false);
            $("form#add_mechanics_form").prop('id', 'update_mechanics_form');
            var _this = $(this).parents('tr');
            let id = _this.find('.id').val();
            $.ajax({
                url: "{{ route('mechanics.get_single_mechanic') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id
                },
                success: function(data) {
                    $("#addModal").modal('show');
                    $("#addModal").find('#title').text('Update Mechanic');
                    $("#addModal").find('#name').val(data.name);
                    $("#addModal").find('#mobile').val(data.mobile);
                    $("#addModal").find('#role').val(data.role);
                    $("#addModal").find('#education').val(data.education);
                    $("#addModal").find('#permanent_address').val(data.permanent_address);
                    $("#addModal").find('#present_address').val(data.present_address);
                    $("#addModal").find('#gardian_name').val(data.gardian_name);
                    $("#addModal").find('#gardian_mobile').val(data.gardian_mobile);
                    $("#addModal").find('#joining_date').val(data.joining_date);
                    $("#addModal").find('#nid_no').val(data.nid_no);
                    $("#addModal").find('#salary').val(data.salary);
                    $("#addModal").find('#mechanic_id').val(data.id);
                    $("#update_mechanic").text('Update');
                }
            });
        });
        // edit single mechanic end

        // update mechanic start
        $(document).on('submit', '#update_mechanics_form', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('mechanics.update') }}",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.success,
                            type: 'success',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#addModal').modal('hide');
                        fetchAllMechanics();
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response.error,
                            type: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            });
        });
        // update mechanic end

        fetchAllMechanics();

        // delete single mechanic start
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
                        url: "{{ route('mechanics.delete') }}",
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
                                });
                                $('#addModal').modal('hide');
                                fetchAllMechanics();
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.error,
                                    type: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        }
                    });
                }
            })
        });
        // delete single mechanic end

        // fetch all mecanics start
        function fetchAllMechanics() {
            $.ajax({
                url: "{{ route('mechanics.get') }}",
                method: 'get',
                success: function(response) {
                    if (response.length > 0) {
                        var html = `<table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Mobile</th>                                
                                <th class="align-middle">Position</th>                                
                                <th class="align-middle">Joining Date</th>                                
                                <th class="align-middle">Education</th>                                
                                <th class="align-middle">NID No</th>
                                <th class="align-middle">Salary</th>                                
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        response.forEach(function(data, index) {
                            console.log(data);
                            html +=
                                `<tr style="height:30px;">                                
                                <td class="name">${data.name}</td>
                                <td class="mobile">${data.mobile}</td>
                                <td class="mobile">${data.role}</td>
                                <td class="joining_date text-center">${data.joining_date}</td>                                
                                <td class="joining_date text-center">${data.education}</td>                                
                                <td class="nid_no text-center">${data.nid_no}</td>
                                <td class="salary text-right">${data.salary.toLocaleString('en-IN')}</td>                                
                                <td class="text-center">
                                <input class="id" type="hidden" name="id" value="${data.id}">
                                    <a href="#" class="m-r-15 text-muted viewIcon" data-bs-toggle="modal" data-idUpdate="${data.id}" data-bs-target="#updateModal">
                                        <i class="fa fa-eye" style="color: #2196f3;font-size:16px;"></i>                                    
                                    </a>
                                    <a href="#" class="m-r-15 text-muted editIcon" data-bs-toggle="modal" data-idUpdate="${data.id}" data-bs-target="#updateModal">
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
                        html = `<h3 class="text-center">No Mechanics Found</h3>`;
                    }
                    $("#show_all_mechanics").html(html);
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
        // fetch all mecanics end
    });
</script>
@endsection