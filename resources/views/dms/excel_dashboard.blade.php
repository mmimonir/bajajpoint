@extends('layouts.app')
@section('title', 'Excel Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Excel Export</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">Service Data</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{route('excel.service_data')}}" method="post" target="_blank">
                                        @csrf
                                        <!-- <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Dealer</label>
                                            <div class="col-sm-8">
                                                <select name="print_code" class="browser-default custom-select">
                                                    <option selected>Select Dealer Name</option>
                                                    @foreach ($dealer as $data)
                                                    <option value="{{$data->supplier_code}}">{{$data->dealer_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="start_date" class="col-sm-4 col-form-label">Start Date</label>
                                            <div class="col-sm-8">
                                                <input required type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="end_date" class="col-sm-4 col-form-label">End Date</label>
                                            <div class="col-sm-8">
                                                <input required type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <a href="" target="_blank">
                                                    <button type="submit" class="btn btn-dark btn-block">Download</button>
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
                            <h3 class="text-center rounded">Sale Report</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{route('sale.sales_report')}}" method="post" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="start_date" class="col-sm-4 col-form-label">Start Date</label>
                                            <div class="col-sm-8">
                                                <input required type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="end_date" class="col-sm-4 col-form-label">End Date</label>
                                            <div class="col-sm-8">
                                                <input required type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <a href="" target="_blank">
                                                    <button type="submit" class="btn btn-dark btn-block">View</button>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">Customer Data</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{route('excel.customer_data')}}" method="post" target="_blank">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md 6">
                                                <div class="form-group row">
                                                    <label for="start_date" class="col-sm-4 col-form-label">Start Date</label>
                                                    <div class="col-sm-8">
                                                        <input required type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="end_date" class="col-sm-4 col-form-label">End Date</label>
                                                    <div class="col-sm-8">
                                                        <input required type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 offset-md-3">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Dealer</label>
                                                    <div class="col-sm-8">
                                                        <select name="report_code" class="browser-default custom-select">
                                                            <option selected>Select Dealer Name</option>
                                                            @foreach ($dealer as $data)
                                                            <option value="{{$data->supplier_code}}">{{$data->dealer_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                            <h3 class="text-center rounded">CKD Pending</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{route('ckd.ckd_pending')}}" method="get" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <a href="" target="_blank">
                                                    <button type="submit" class="btn btn-dark btn-block">View List</button>
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
                            <h3 class="text-center rounded">TR Pending</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{route('tr.tr_pending')}}" method="get" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <a href="" target="_blank">
                                                    <button type="submit" class="btn btn-dark btn-block">View List</button>
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
                                            <div class="col-sm-12 text-center">
                                                <a href="" target="_blank">
                                                    <button type="submit" class="btn btn-dark btn-block">View List</button>
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