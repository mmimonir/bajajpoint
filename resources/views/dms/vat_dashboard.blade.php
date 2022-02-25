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
                                    <form action="{{route('assign_tr_number')}}" method="post">
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
                                                    @foreach ($models as $model)
                                                    <option value="{{$model->model_code}}">{{$model->model}}</option>
                                                    @endforeach
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
                                                <input required value="{{$tr_code ? $tr_code->tr_month_code : 'No Code Assign'}}" required type="text" class="form-control" id="tr_month_code" name="tr_month_code" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center d-flex justify-content-center">
                                                <button style="width:150px;" {{$tr_code ? 'disabled' : ''}} type="submit" class="btn btn-dark btn-block">Assign</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
                                    <form action="{{route('vat.assign_tr_code')}}" method="post">
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
                                                    <button style="width:150px;" {{$tr_code ? '' : 'disabled'}} type="submit" class="btn btn-dark btn-block">Assign</button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
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
                                    <form action="{{route('vat.update_tr_status')}}" method="post">
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
                                                <button style="width:150px;" type="submit" {{$tr_code ? '' : 'disabled'}} class="btn btn-dark btn-block">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
                            <h3 class="text-center rounded">TR Pending</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{ route('tr.tr_pending') }}" method="get" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">

                                                <button type="submit" class="btn btn-dark btn-block">
                                                    View List
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
                    <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">TR Status</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{route('tr.tr_status')}}" method="get" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center d-flex justify-content-center">

                                                <button style="width:150px;" type="submit" class="btn btn-dark btn-block">View</button>

                                            </div>
                                        </div>
                                    </form>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });
</script>
<script>
    let dateDropdown = document.getElementById('date-dropdown');

    let currentYear = new Date().getFullYear();
    let earliestYear = 2010;
    while (currentYear >= earliestYear) {
        let dateOption = document.createElement('option');
        dateOption.text = currentYear;
        dateOption.value = currentYear;
        dateDropdown.add(dateOption);
        currentYear -= 1;
    }
</script>
@endsection