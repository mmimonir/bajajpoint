@extends('layouts.app')
@section('title', 'VAT Dashboard')
@section('content')
@push('page_css')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">Assign TR Number</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="" method="post" id="assign_tr_number">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="whos_vat" class="col-sm-4 col-form-label">Whos VAT</label>
                                            <div class="col-sm-8">
                                                <select name="whos_vat" class="browser-default custom-select" required>
                                                    @foreach ($whos_vat as $data)
                                                    <option value="{{$data->whos_vat}}">
                                                        {{$data->whos_vat}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="model_code" class="col-sm-4 col-form-label">Model</label>
                                            <div class="col-sm-8">
                                                <select name="model_code[]" class="selectpicker" multiple data-live-search="true" required>
                                                    @if ($models)
                                                    @foreach ($models as $model)
                                                    <option value="{{$model->model_code}}">{{$model->model}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tr_number" class="col-sm-4 col-form-label">TR Number</label>
                                            <div class="col-sm-8">
                                                <input required type="text" required class="form-control" id="tr_number" name="tr_number" placeholder="58">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tr_month_code" class="col-sm-4 col-form-label">TR Code</label>
                                            <div class="col-sm-8">
                                                <input required value="{{$helper_tr ? $helper_tr->tr_month_code : 'No Code Assign'}}" required type="text" class="form-control" id="tr_month_code" name="tr_month_code" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center d-flex justify-content-center">
                                                <button id="assign_tr_number_btn" {{count($models) > 0 ? '' : 'disabled'}} style="width:150px;" type="submit" class="btn btn-dark btn-block">Assign</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="overlay search_overlay assign_tr_number" id="search_overlay">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">Assign TR Code</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="" method="post" id="assign_tr_code">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="end_date" class="col-sm-4 col-form-label">Last Code</label>
                                            <div class="col-sm-8">
                                                <input readonly value="{{$last_tr_code->tr_month_code ? $last_tr_code->tr_month_code : ''}}" type="text" class="form-control" id="end_date" name="end_date" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tr_month_code" class="col-sm-4 col-form-label">New Code</label>
                                            <div class="col-sm-8">
                                                <input required type="text" class="form-control" id="tr_month_code" name="tr_month_code">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="vat_process" class="col-sm-4 col-form-label">Process</label>
                                            <div class="col-sm-8">
                                                <input readonly value="{{$tr_code ? $tr_code->vat_process : 'No Code Assign' }}" type="text" class="form-control" id="vat_process" name="vat_process"">
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                                <div class="col-sm-12 text-center d-flex justify-content-center">
                                                    <button id="assign_tr_code_btn" style="width:150px;" {{$tr_code_status ? '' : 'disabled'}} type="submit" class="btn btn-dark btn-block">Assign</button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="overlay search_overlay assign_tr_code" id="search_overlay">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">Update TR Status</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="" method="post" id="update_tr_status">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="tr_code" class="col-sm-4 col-form-label">TR Code</label>
                                            <div class="col-sm-8">
                                                <input readonly value="{{$tr_code ? $tr_code->tr_month_code ? $tr_code->tr_month_code : '' : ''}}" required type="text" class="form-control" id="tr_code" name="tr_code" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tr_dep_date" class="col-sm-4 col-form-label">Dep Date</label>
                                            <div class="col-sm-8">
                                                <input required type="date" class="form-control" id="tr_dep_date" name="tr_dep_date" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center d-flex justify-content-center">
                                                <button id="update_tr_status_btn" style="width:150px;" type="submit" {{$tr_code ? '' : 'disabled'}} class="btn btn-dark btn-block">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="overlay search_overlay update_tr_code" id="search_overlay">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">View List</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">Gen. Sale Mushak No</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{ route('vat.assign_sale_mushak_no') }}" method="post" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Dealer</label>
                                            <div class="col-sm-8">
                                                <select name="vat_code" class="browser-default custom-select" required>
                                                    <option selected>
                                                        Select Dealer Name
                                                    </option>
                                                    @foreach ($dealer as $data)
                                                    <option value="{{$data->supplier_code}}">
                                                        {{$data->dealer_name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="start_date" class="col-sm-4 col-form-label">Start Date</label>
                                            <div class="col-sm-8">
                                                <input required type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="end_date" class="col-sm-4 col-form-label">End Date</label>
                                            <div class="col-sm-8">
                                                <input required type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" class="btn btn-dark btn-block">
                                                    View
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">Uml Mushak Update</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{route('vat.uml_mushak_update')}}" method="post" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="start_date" class="col-sm-4 col-form-label">Start Date</label>
                                            <div class="col-sm-8">
                                                <input required type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="end_date" class="col-sm-4 col-form-label">End Date</label>
                                            <div class="col-sm-8">
                                                <input required type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" class="btn btn-dark btn-block">
                                                    View
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">TR Pending</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <a href="{{route('tr.tr_pending_index')}}" target="_blank">
                                        <button type="submit" class="btn btn-dark btn-block">
                                            View List
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">TR Status</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <a href="{{route('tr.tr_index')}}" target="_blank">
                                        <button type="submit" class="btn btn-dark btn-block">
                                            View List
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".search_overlay").css("visibility", "hidden");
        $('.selectpicker').selectpicker();
    });
</script>

<script>
    $(document).ready(function() {
        $("#assign_tr_number").submit(function(e) {
            $(".assign_tr_number").css("visibility", "visible");
            $('#assign_tr_number_btn').attr('disabled', true);
            e.preventDefault();
            const FD = new FormData(this);
            $.ajax({
                url: "{{ route('assign_tr_number') }}",
                method: 'post',
                data: FD,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        $(".assign_tr_number").css("visibility", "hidden");
                        $('#assign_tr_number_btn').attr('disabled', false);
                        $("#assign_tr_number").trigger('reset');
                        location.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                            footer: '<a href="">Why do I have this issue?</a>'
                        })
                    }
                }
            });
        });
        $("#assign_tr_code").submit(function(e) {
            $(".assign_tr_code").css("visibility", "visible");
            $('#assign_tr_code_btn').attr('disabled', true);
            e.preventDefault();
            const FD = new FormData(this);
            $.ajax({
                url: "{{ route('vat.assign_tr_code') }}",
                method: 'post',
                data: FD,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        $(".assign_tr_code").css("visibility", "hidden");
                        $('#assign_tr_code_btn').attr('disabled', false);
                        $("#assign_tr_code").trigger("reset");
                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                            footer: '<a href="">Why do I have this issue?</a>'
                        })
                    }
                }
            });
        });
        $("#update_tr_status").submit(function(e) {
            $(".update_tr_code").css("visibility", "visible");
            $('#update_tr_status_btn').attr('disabled', true);
            e.preventDefault();
            const FD = new FormData(this);
            $.ajax({
                url: "{{ route('vat.update_tr_status') }}",
                method: 'post',
                data: FD,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        $(".update_tr_code").css("visibility", "hidden");
                        $('#update_tr_status_btn').attr('disabled', false);
                        $("#update_tr_status").trigger("reset");
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                            footer: '<a href="">Why do I have this issue?</a>'
                        })
                    }
                }
            });
        });
    })
</script>
@endsection