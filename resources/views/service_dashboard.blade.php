@extends('service_layouts.app')
@section('title', 'Bajaj Point - 3S Dealer Of UttaraMotors Ltd')
@push('page_scripts')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->

@endpush
@push('page_css')
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default {
        width: 304px !important;
    }

    .select2-selection__rendered {
        margin-top: -6px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 23px !important;
    }
</style>
@endpush

@section('content')
<div class="container-fluid" style="margin-top:15px; padding:0;">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Bajaj Point - Service Dashboard</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                            <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12 col-sm-6 d-flex justify-content-center">
                        <a href="{{route('bill.create_bill')}}" class="btn btn-inline bg-dark" style="width:150px; margin:0 5px;">
                            Create Bill/Invoice
                        </a>
                        <a href="{{route('service.service_call')}}" class="btn btn-inline bg-dark" style="width:150px; margin:0 5px;">
                            Service Call List
                        </a>
                        <a href="{{route('mechanics.index')}}" class="btn btn-inline bg-dark" style="width:150px; margin:0 5px;">
                            Mechanics
                        </a>
                        <a href="{{route('service.job_card')}}" class="btn btn-inline bg-dark" style="width:150px; margin:0 5px;">
                            Create Job Card
                        </a>
                        <a class="btn btn-inline bg-dark" style="width:150px; margin:0 5px;">
                            Purchage Entry
                        </a>
                        <a class="btn btn-inline bg-dark" style="width:150px; margin:0 5px;">
                            Add Supplier
                        </a>
                        <a class="btn btn-inline bg-dark" style="width:150px; margin:0 5px;">
                            Current Stock
                        </a>
                        <a class="btn btn-inline bg-dark" style="width:150px; margin:0 5px;">
                            Current Stock
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-success collapsed-card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Search Parts</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                            <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" style="display: block; padding:0px;">
                    <div class="card mt-1" style="box-shadow: 0 0 5px 0 lightgrey">
                        <div class="card-body d-flex justify-content-center" style="width:700px; margin:auto; align-items:center;">
                            <label for="part_id" style="margin-right:10px; margin-bottom:0;">Part ID</label>
                            <select class="custom-select" id="select2">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top:-5px; padding:0px;">
                        <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey; margin-bottom:0px;" id="show_search_result">

                        </div>
                    </div>
                </div>
                <div class="overlay" id="search_overlay">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- @section('datatable')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection -->
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $("#search_overlay").css("visibility", "hidden");

        $('#select2').select2({
            placeholder: 'Select an ID',
            minimumInputLength: 4,
            selectOnClose: true,
            // closeOnSelect: false,
            // allowClear: true,
            // minimumResultsForSearch: 20,
            ajax: {
                url: "{{ route('job_card.search_by_part_id') }}",
                dataType: 'json',
                delay: 250,
                type: "GET",
                data: function(params) {
                    return {
                        part_id: params.term,
                    };
                },
                processResults: function(data) {
                    console.log(data);
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.value,
                                id: item.value
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $(document).on('change', '#select2', function() {
            let part_id = $(this).val();
            console.log(part_id);
            $.ajax({
                url: "{{ route('service.part_id_search') }}",
                type: "GET",
                data: {
                    part_id
                },
                beforeSend: function() {
                    $("#search_overlay").css("visibility", "visible");
                },
                success: function({
                    search_data
                }) {
                    if (search_data) {
                        $('#select2').val(null);
                        $("#search_overlay").css("visibility", "hidden");
                        var html = `
                    <div class="card-header bg-dark">
                                <h3 class="card-title">
                                    Part ID Search Details
                                </h3>
                            </div>
                            <div>
                                <table id="search_result" class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Sl</th>
                                            <th>Part ID</th>
                                            <th>Part Name</th>
                                            <th>Model Name</th>
                                            <th>Rate</th>
                                            <th>Current Stock</th>
                                            <th>Stock Value</th>
                                            <th style="width:118px;">Location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><tr>
                            <td class="text-center">1</td>
                            <td class="text-center">
                            ${search_data.part_id}
                            <input type="hidden" name="id" value="${search_data.id}">
                            </td>
                            <td>${search_data.part_name}</td>
                            <td>${search_data.model_name}</td>
                            <td class="text-right">${(search_data.rate).toLocaleString('en-IN')}/-</td>
                            <td class="text-center">${search_data.stock_quantity} Pcs</td>
                            <td class="text-right">${(search_data.rate * search_data.stock_quantity).toLocaleString('en-IN')}/-</td>
                            <td class="text-center">
                            <input style="width:118px;" class="location" type="text" name="location" value="${search_data.location ? search_data.location : ''}" />
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center padd text-decoration btn-group">
                                    <a href="#" class="btn bg-dark update_location" style="padding:2px;">Update Location</a>
                                </div>
                            </td>
                            </tr></tbody></table></div>`;

                        $("#show_search_result").html(html);
                    } else {
                        $("#search_overlay").css("visibility", "hidden");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No Data Found!',
                        })
                    }
                }
            });
        });
        $(document).on('click', '.update_location', function() {
            _this = $(this).parent().parent().parent();

            let id = _this.find('input[name="id"]').val();
            let location = _this.find("input[name='location']").val();

            if (!location == '') {
                $.ajax({
                    url: "{{ route('service.update_parts_location') }}",
                    type: "POST",
                    data: {
                        id,
                        location,
                        _token: "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                        $("#search_overlay").css("visibility", "visible");
                    },
                    success: function({
                        msg
                    }) {
                        console.log(msg);
                        $("#search_overlay").css("visibility", "hidden");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: msg,
                        });
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Enter Location!',
                })
            }

        });
    });
</script>
@endsection