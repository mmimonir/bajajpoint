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
                <div class="col-md-3">
                    <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">Assign TR Number</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{route('tr_update')}}" method="post" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Model</label>
                                            <div class="col-sm-8">
                                                <select name="model_code[]" class="selectpicker" multiple data-live-search="true">
                                                    @foreach ($models as $model)
                                                    <option value="{{$model->model_code}}">{{$model->model}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tr_number" class="col-sm-4 col-form-label">TR Number</label>
                                            <div class="col-sm-8">
                                                <input required type="text" class="form-control" id="tr_number" name="tr_number" placeholder="58">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tr_month_code" class="col-sm-4 col-form-label">TR Code</label>
                                            <div class="col-sm-8">
                                                <input value="{{$tr_code ? $tr_code->tr_month_code ? $tr_code->tr_month_code : '' : ''}}" required type="text" class="form-control" id="tr_month_code" name="tr_month_code" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center d-flex justify-content-center">
                                                <a href="" target="_blank">
                                                    <button style="width:150px;" type="submit" class="btn btn-dark btn-block">Assign</button>
                                                </a>
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
                                                <input value="{{$last_tr_code->tr_month_code ? $last_tr_code->tr_month_code : ''}}" type="text" class="form-control" id="end_date" name="end_date" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tr_month_code" class="col-sm-4 col-form-label">New Code</label>
                                            <div class="col-sm-8">
                                                <input required type="text" class="form-control" id="tr_month_code" name="tr_month_code" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="vat_process" class="col-sm-4 col-form-label">Process</label>
                                            <div class="col-sm-8">
                                                <input value="{{$tr_code ? $tr_code->vat_process : 'VAT is Uptodate' }}" type="text" class="form-control" id="vat_process" name="vat_process"">
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                                <div class="col-sm-12 text-center d-flex justify-content-center">
                                                    <a href="" target="_blank">
                                                        <button style="width:150px;" type="submit" class="btn btn-dark btn-block">Assign</button>
                                                    </a>
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
                                            <label for="dealer_code" class="col-sm-4 col-form-label">Dealer Code</label>
                                            <div class="col-sm-8">
                                                <select name="dealer_code" class="browser-default custom-select" required="required">
                                                    @foreach ($dealer_code as $data)
                                                    <option value="{{$data->dealer_code}}">
                                                        {{$data->dealer_code}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tr_code" class="col-sm-4 col-form-label">TR Code</label>
                                            <div class="col-sm-8">
                                                <input value="{{$tr_code_vat_pending ? $tr_code_vat_pending->tr_month_code ? $tr_code_vat_pending->tr_month_code : '' : ''}}" required type="text" class="form-control" id="tr_code" name="tr_code" placeholder="JAN0122">
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
                                                <a href="" target="_blank">
                                                    <button style="width:150px;" type="submit" class="btn btn-dark btn-block">Update</button>
                                                </a>
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
                            <h3 class="text-center rounded">TR Changer Update</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{route('vat.tr_changer_update')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="dealer_code" class="col-sm-4 col-form-label">TR CH Code</label>
                                            <div class="col-sm-8">
                                                <select name="tr_changer" class="browser-default custom-select" required="required">
                                                    @foreach ($tr_changer_code as $data)
                                                    <option value="{{$data->tr_changer}}">
                                                        {{$data->tr_changer}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tr_code" class="col-sm-4 col-form-label">TR Code</label>
                                            <div class="col-sm-8">
                                                <input readonly value="{{$tr_code_vat_pending ? $tr_code_vat_pending->tr_month_code ? $tr_code_vat_pending->tr_month_code : '' : ''}}" required type="text" class="form-control" id="tr_code" name="tr_code" placeholder="JAN0122">
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
                                                <a href="" target="_blank">
                                                    <button style="width:150px;" type="submit" class="btn btn-dark btn-block">Update</button>
                                                </a>
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
                    <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">TR Pending</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{route('excel.service_data')}}" method="post" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center d-flex justify-content-center">
                                                <a href="" target="_blank">
                                                    <button style="width:150px;" type="submit" class="btn btn-dark btn-block">View</button>
                                                </a>
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
                                    <form action="{{route('excel.service_data')}}" method="post" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center d-flex justify-content-center">
                                                <a href="" target="_blank">
                                                    <button style="width:150px;" type="submit" class="btn btn-dark btn-block">View</button>
                                                </a>
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