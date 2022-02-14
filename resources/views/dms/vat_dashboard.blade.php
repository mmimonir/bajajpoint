@extends('layouts.app')
@section('title', 'VAT Dashboard')
@section('content')
@push('page_css')

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
                                    <form action="{{route('tr_update')}}" method="post" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Model</label>
                                            <div class="col-sm-8">
                                                <select multiple name="model_code[]">
                                                    @foreach ($models as $model)
                                                    <option value="{{$model->model_code}}">{{$model->model}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tr_number" class="col-sm-4 col-form-label">TR Number</label>
                                            <div class="col-sm-8">
                                                <input required type="text" class="form-control" id="tr_number" name="tr_number" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tr_month_code" class="col-sm-4 col-form-label">TR Code</label>
                                            <div class="col-sm-8">
                                                <input required type="text" class="form-control" id="tr_month_code" name="tr_month_code" placeholder="JAN0122">
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
                                    <form action="#" method="post" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="end_date" class="col-sm-4 col-form-label">Last Code</label>
                                            <div class="col-sm-8">
                                                <input required type="text" class="form-control" id="end_date" name="end_date" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="end_date" class="col-sm-4 col-form-label">Code</label>
                                            <div class="col-sm-8">
                                                <input required type="text" class="form-control" id="end_date" name="end_date" placeholder="JAN0122">
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
                            <h3 class="text-center rounded">Update TR Status</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="#" method="post" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">TR Code</label>
                                            <div class="col-sm-8">
                                                <select name="print_code" class="browser-default custom-select">
                                                    <option selected>Select TR Code</option>

                                                    <option value="#"></option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="end_date" class="col-sm-4 col-form-label">Dep Date</label>
                                            <div class="col-sm-8">
                                                <input required type="date" class="form-control" id="end_date" name="end_date" placeholder="JAN0122">
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