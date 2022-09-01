@extends('layouts.app')
@section('title', 'Bank Account')
@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header">
                <h3 class="bg-dark text-center p-2 text-white mt-2 rounded">Bank Account</h3>
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

<!-- Modal Add-->
@extends('dms.bank_account.modals.bank_account_modal')
<!-- Modal Add End-->
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
    $(document).ready(function() {

        $(document).on('click', '#add', function() {
            $("#addModal").modal('show');
            $("form#add_bank_account_form").prop('id', 'add_bank_account_form');
            $("form#edit_bank_account_form").prop('id', 'add_bank_account_form');
            $("#addModal :input").prop("readOnly", false);
            $("form").trigger("reset");
            $("#addModal").find('#title').text('Create Bank Account File');
            $("#create").text('Create');
            $("#bank_account_id").val('');
        });

        // add new employee ajax request
        $(document).on('submit', "#add_bank_account_form", function(e) {
            e.preventDefault();
            const FD = new FormData(this);

            $.ajax({
                url: "{{ route('bank.store_bank_account') }}",
                method: "post",
                data: FD,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Your work has been saved",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        fetchAllBankAccount();
                    } else {
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "Something went wrong",
                            showConfirmButton: false,
                            message: response.error,
                            timer: 1500,
                        });
                    }
                    $("#addModal").modal("hide");
                },
            });
        });

        // view single pd start
        $(document).on('click', '.viewIcon', function() {
            var _this = $(this).parent().parent();
            const id = _this.find('.id').val();

            $.ajax({
                url: "{{ route('bank.get_single_bank_account') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id
                },
                success: function(data) {
                    Object.keys(data.single_bank_data).forEach(function(key) {
                        $("#addModal").find(`#${key}`).val(data.single_bank_data[key]);
                    });

                    $("#addModal").modal('show');
                    $("#addModal").find('#title').text('Bank Account');
                    $("#addModal :input").prop("readOnly", true);
                }
            });
        });
        // view single pd end

        // edit single mrp start
        $(document).on('click', '.editIcon', function() {

            $("form").trigger("reset");
            $("form#add_bank_account_form").prop('id', 'edit_bank_account_form');
            $("#create").text('Update');

            var _this = $(this).parent().parent();
            const id = _this.find('.id').val();

            $.ajax({
                url: "{{ route('bank.get_single_bank_account') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id
                },
                success: function(data) {
                    console.log(data);
                    Object.keys(data.single_bank_data).forEach(function(key) {
                        $("#addModal").find(`#${key}`).val(data.single_bank_data[key]);
                    });

                    $("#addModal").find("#bank_account_id").val(data.single_bank_data.id);
                    $("#addModal").modal('show');
                    $("#addModal :input").prop("readOnly", false);
                    $("#addModal").find('#title').text('Update Bank Account');
                }
            });
        });
        // edit single mrp end

        // update employee ajax request
        $(document).on('submit', '#edit_bank_account_form', function(e) {

            e.preventDefault();
            const FD = new FormData(this);

            $.ajax({
                url: "{{ route('bank.update_bank_account') }}",
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
                        fetchAllBankAccount();
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                    $("#addModal").modal('hide');
                }
            });
        });

        fetchAllBankAccount();

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
                        url: "{{ route('bank.delete_bank_account') }}",
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
                            fetchAllBankAccount();
                        }
                    });
                }
            })
        });

        function fetchAllBankAccount() {
            $.ajax({
                url: "{{ route('bank.get_bank_account') }}",
                method: 'get',
                success: function({
                    all_bank_data
                }) {
                    console.log(all_bank_data);
                    if (all_bank_data.length > 0) {
                        var html = `<table id="example" class="table table-hover table-responsive table-striped text-sm table-light table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="text-center">Sl</th>
                                <th class="text-center">Bank Name</th>                                                                
                                <th class="text-center">Branch</th>                                
                                <th class="text-center">Account Title</th>                                                                
                                <th class="text-center">Account No</th>
                                <th class="text-center">Opening Date</th>                                                                                                
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        all_bank_data.forEach(function(data, index) {
                            html +=
                                `<tr style="height:30px;">                                
                                <td class="text-center">${index + 1}</td>
                                <td class="">${data.bank_name}</td>                                                                
                                <td class="">${data.branch_name}</td>
                                <td class="text-center">${data.account_title}</td>
                                <td class="text-center">${data.account_number}</td>
                                <td class="text-center">${data.opening_date}</td>                                                                                                
                                <td class="text-center">
                                <input class="id" type="hidden" name="id" value="${data.id}">
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