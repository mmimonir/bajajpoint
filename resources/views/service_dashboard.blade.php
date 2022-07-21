@extends('service_layouts.app')
@section('title', 'Bajaj Point - 3S Dealer Of UttaraMotors Ltd')
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
                        <a class="btn btn-inline bg-dark" style="width:150px; margin:0 5px;">
                            Make Requisitions
                        </a>
                        <a class="btn btn-inline bg-dark" style="width:150px; margin:0 5px;">
                            Add Mechanics
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
                    <!-- <div style="height:1px;"></div>
                    <div class="col-md-12 d-flex justify-content-center">
                        <a class="btn btn-inline bg-dark" style="width:9rem; margin:0 8px;">
                            Create Invoice
                        </a>
                        <a class="btn btn-inline bg-dark" style="width:9rem; margin:0 8px;">
                            Make Requisitions
                        </a>
                        <a class="btn btn-inline bg-dark" style="width:9rem; margin:0 8px;">
                            Add Mechanics
                        </a>
                        <a class="btn btn-inline bg-dark" style="width:9rem; margin:0 8px;">
                            Create Job Card
                        </a>
                        <a class="btn btn-inline bg-dark" style="width:9rem; margin:0 8px;">
                            Purchage Entry
                        </a>
                        <a class="btn btn-inline bg-dark" style="width:9rem; margin:0 8px;">
                            Add Supplier
                        </a>
                        <a class="btn btn-inline bg-dark" style="width:9rem; margin:0 8px;">
                            Current Stock
                        </a>
                        <a class="btn btn-inline bg-dark" style="width:9rem; margin:0 8px;">
                            Current Stock
                        </a>
                    </div> -->
                </div>

                <!-- Content Here -->
                <!-- <div class="overlay" id="search_overlay">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div> -->
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

    });
    // $('.amount').text(new Intl.NumberFormat('en-IN').format(+$('.amount').text()))
</script>
@endsection