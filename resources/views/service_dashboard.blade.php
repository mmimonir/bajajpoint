@extends('service_layouts.app')
@section('title', 'Bajaj Point - 3S Dealer Of UttaraMotors Ltd')
@push('page_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
@endpush
@push('styles')
<style>

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
                    <h3 class="card-title">Search Together</h3>
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
                        <div class="card-header bg-dark d-flex justify-content-center">
                            <h3 class="card-title">
                                Spare Parts Search
                            </h3>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <div class="form-inline">
                                <div class="form-group mb-2">
                                    <label for="part_id">Part ID</label>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="text" name="part_id" class="form-control part_id" id="part_id" placeholder="Part ID">
                                </div>
                                <button type="submit" class="btn btn-dark mb-2">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top:-15px; padding:0px;">
                        <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey; margin-bottom:0px;" id="show_search_result">

                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top:-15px; padding:0px;">
                        <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey; margin-bottom:0px;" id="rg_number_update">

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

@section('datatable')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $("#search_overlay").css("visibility", "hidden");
    });

    // Search by part id start
    $('.part_id').on("focus", function() {
        $(this).autocomplete({
            maxShowItems: 10,
            minLength: 2,
            // scroll: true,
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('job_card.search_by_part_id') }}",
                    type: 'GET',
                    dataType: "json",
                    data: {
                        part_id: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $(this).val(ui.item.label);
                return false;
            },
            change: function() {
                _this = $(this).parent().parent();
                var part_id = $(this).val();
                $.ajax({
                    url: "{{ route('job_card.search_by_full_part_id') }}",
                    type: 'GET',
                    dataType: "json",
                    data: {
                        part_id: part_id
                    },
                    success: function(data) {
                        if (data.stock_quantity > 0) {
                            _this.find('.part_name').val(data.part_name);
                            _this.find('.quantity').val(1);
                            _this.find('.sale_rate').val(data.rate);
                            _this.find('.delete_parts_item').removeClass('disabled');
                            _this.find('.delete_icon').removeClass('text-secondary');
                            _this.find('.delete_icon').addClass('text-danger');
                            _this.find('.quantity').trigger("change");
                            _this.find('.sale_rate').trigger("change");
                            _this.find('.total_amount').trigger("change");
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Not enough stock, please update stock first',
                                footer: '<a href="">Why do I have this issue?</a>'
                            })
                        }
                    }
                });
            }
        });
    });
    // Search by part id end
    // $('.amount').text(new Intl.NumberFormat('en-IN').format(+$('.amount').text()))
</script>
@endsection