@extends('layouts.app')
@section('title', 'Quotation List')
@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection
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
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="{{route('quotation.create')}}" target="_blank" rel="noopener noreferrer">
                                <button class="btn btn-info btn-sm text-white">Create New</button>
                            </a>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                <div class="card-body container h-100 d-flex justify-content-center">
                    <table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
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
                                    <div class="d-flex justify-content-center text-decoration btn-group">
                                        <a href="{{route('quotation.print', ['id' => $data->id])}}" target="_blank" class="btn-sm">
                                            <i class="fa fa-print" style="color: #2196f3;font-size:16px;"></i>
                                        </a>

                                        <a href="{{route('quotation.edit', ['id' => $data->id])}}" class="btn-sm">
                                            <i class="fa fa-edit editIcon" id="{{route('quotation.edit', ['id' => $data->id])}}" data-bs-toggle="modal" data-idUpdate="{{$data->id}}" data-bs-target="#updateModal" style="color: #2196f3;font-size:16px;"></i>
                                        </a>
                                        <a href="#" class="btn-sm">
                                            <i class="fa fa-trash deleteIcon" id="{{$data->id}}" style="color: red;font-size:16px;">
                                            </i>
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
<!-- Modal Update-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title p-1" id="title">Update</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="#" method="post" id="quotation_update_form">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-sm mb-0 row">
                                        <label for="ref" class="col-sm-4 col-form-label">Ref:</label>
                                        <div class="col-sm-8">
                                            <input required type="text" class="form-control form-control-sm" id="ref" name="ref" value="Ref: Bajaj Point/Offer-">
                                            <input class="qt_id" type="hidden" id="id" name="qt_id" value="#">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-sm mb-0 row">
                                        <label for="qt_date" class="col-sm-4 col-form-label">Date:</label>
                                        <div class="col-sm-8">
                                            <input required type="date" class="form-control form-control-sm" id="qt_date" name="qt_date" placeholder="Challan No">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-sm mb-0 row">
                                        <label for="to" class="col-sm-2 col-form-label">To</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control form-control-sm" id="to" name="to" placeholder="XYZ Company Ltd">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-group-sm mb-0 row">
                                        <label for="address_one" class="col-sm-2 col-form-label">Address 1</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control form-control-sm" id="address_one" name="address_one" placeholder="23/Ka New Eskaton Road">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-group-sm mb-0 row">
                                        <label for="address_two" class="col-sm-2 col-form-label">Address 2</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-sm" id="address_two" name="address_two" placeholder="Ramna, Dhaka-1212">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-group-sm mb-0 row">
                                        <label for="account" class="col-sm-2 col-form-label">A/C</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-sm" id="account" name="account" placeholder="Md Monirul Islam">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-group-sm mb-0 row">
                                        <label for="subject" class="col-sm-2 col-form-label">Subject:</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control form-control-sm" id="subject" name="subject" value="OFFER FOR SUPPLY OF BAJAJ MOTORCYCLE.">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="height:1px;border:none;color:#333;background-color:#333;" />
                            <table align="center" style="width:100%;" id="tbl">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">Sl</th>
                                        <th style="text-align:center;">Description</th>
                                        <th style="text-align:center;">Unit</th>
                                        <th style="text-align:center;">Unit Price</th>
                                        <th style="text-align:center;">Grand Total</th>
                                    </tr>
                                </thead>
                                <tbody id="quotation_items">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="form-row d-flex justify-content-center" style="margin-top:10px;">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-sm mb-0 row">
                                            <label for="discount" class="col-sm-4 col-form-label">Discount</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="discount" name="discount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-group-sm mb-0 row">
                                            <label for="validity" class="col-sm-4 col-form-label">Validity:</label>
                                            <div class="col-sm-8">
                                                <input required type="date" class="form-control form-control-sm" id="validity" name="validity" placeholder="Ref: Bajaj Point/Offer-">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-group-sm mb-0 row">
                                            <label for="notes" class="col-sm-4 col-form-label">Note</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="notes" name="notes" value="All price are without AIT">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-group-sm mb-0 row">
                                            <label for="for" class="col-sm-4 col-form-label">For</label>
                                            <div class="col-sm-8">
                                                <input required type="text" class="form-control form-control-sm" id="for" name="for" value="Bajaj Point">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <center style="padding:10px;">
                                <button id="add" style="width:100px; margin-top:0px;" class="btn btn-success btn-sm">Add</button>
                                <button id="remove" style="width:100px;" class="btn btn-danger btn-sm">Remove</button>
                            </center>
                            <center style="padding:10px;">
                                <button class="btn btn-info btn-sm text-white" type="submit">Submit</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Modal Update End-->
@endsection @section('datatable')
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
@endsection @section('script')
<script>
    $('#add').on('click', function(e) {
        e.preventDefault();
        var $tableBody = $('#tbl').find("tbody"),
            $trLast = $tableBody.find("tr:last"),
            $trNew = $trLast.clone();
        $trLast.after($trNew);

        if ($("#tbl tbody tr").length > 0) {
            $('#remove').attr('disabled', false);
        }
    })
    $('#remove').on('click', function(e) {
        e.preventDefault();
        $('#tbl tbody tr:last').remove();
        ar_row_control();
    })
    ar_row_control();

    function ar_row_control() {
        if ($("#tbl tbody tr").length == 1) {
            $('#remove').attr('disabled', true);
        }
    }
    $("#example").DataTable({
        pageLength: 10,
        responsive: true,
        lengthChange: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $(document).on('click', '.editIcon', function(e) {
        $('#quotation_update_form').trigger('reset');
        e.preventDefault();
        var url = $(this).attr("id");
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#ref').val(data.quotations.ref);
                $('#qt_date').val(data.quotations.qt_date);
                $('#to').val(data.quotations.to);
                $('#address_one').val(data.quotations.address_one);
                $('#address_two').val(data.quotations.address_two);
                $('#account').val(data.quotations.account);
                $('#discount').val(data.quotations.discount);
                $('#validity').val(data.quotations.validity);
                $('.qt_id').val(data.quotations.id);
                $('#for').val(data.quotations.for);
                $('#quotation_items').children().remove();
                data.quotation_items.forEach(function(item) {
                    $('#quotation_items').append(
                        `<tr>
                            <td>#</td>
                            <td>
                                <input value="${item.tb_description}" style="width:100%;" required name="tb_description[]" class="form-control form-control-sm tb_description" id="tb_description" style="width:300px;">
                                <input class="item_id" name="item_id[]" type="hidden" value="${item.id}">
                            </td>
                            <td>
                                <input value="${item.tb_unit}" required name="tb_unit[]" type="text" class="form-control form-control-sm tb_unit text-center" id="tb_unit" placeholder="Unit">
                            </td>
                            <td>
                                <input value="${item.tb_unit_price}" required name="tb_unit_price[]" type="text" class="form-control form-control-sm text-center tb_unit_price" id="tb_unit_price" placeholder="Unit Price">
                            </td>
                            <td>
                                <input value="${item.tb_grand_total}" required name="tb_grand_total[]" type="text" class="form-control form-control-sm tb_grand_total text-right" id="tb_grand_total" placeholder="Total">
                            </td>
                        </tr>`
                    )
                })
            }
        });
    });
    $("#tbl").on("blur", ".tb_unit_price, .tb_unit", function() {
        var tr = $(this).parent().parent();
        var qty = +tr.find(".tb_unit").val();
        var unit_price = +tr.find(".tb_unit_price").val();
        tr.find(".tb_grand_total").val(qty * unit_price);
    });
    $('#quotation_update_form').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "{{route('quotation.update')}}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {
                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Quotation Updated Successfully',
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#quotation_update_form')[0].reset();
                $("#updateModal").modal("hide");
            }
        });
    })
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
                    url: "{{ route('quotation.delete') }}",
                    method: 'delete',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function(response) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Data Deleted Successfully",
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        location.reload();
                    }
                });
            }
        })
    });
</script>
@endsection