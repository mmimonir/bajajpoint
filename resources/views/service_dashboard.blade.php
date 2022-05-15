@extends('service_layouts.app')
@section('title', 'Bajaj Point - 3S Dealer Of UttaraMotors Ltd')
@section('content')
<div class="container-fluid" style="margin-top:15px; padding:0;">
    <div class="row">
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
                                Sales Update, Hform, Stamp, Gate Pass, Single
                                Print
                            </h3>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <form class="form-inline" action="#" method="post" id="search_form">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="five_chassis">Chassis No</label>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="text" name="five_chassis" class="form-control" id="five_chassis" placeholder="Last Five Digit Chassis">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="five_engine">Engine No</label>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="text" name="five_engine" class="form-control" id="five_engine" placeholder="Last Five Digit Engine">
                                </div>
                                <button type="submit" class="btn btn-dark mb-2">
                                    Search
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top:-15px; padding:0px;">
                        <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey; margin-bottom:0px;" id="show_search_result">

                        </div>
                    </div>
                </div>
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