@extends('layouts.app') @section('content')
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
                        <div class="card-header">
                            <h3 class="text-center rounded">Assign TR Number</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="#" method="post" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Model</label>
                                            <div class="col-sm-8">
                                                <select name="model_code[]" class="selectpicker" multiple data-live-search="true">
                                                    <option selected>Select Model</option>
                                                    <option value="1001">Pulsar</option>
                                                    <option value="1001">Discover</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="end_date" class="col-sm-4 col-form-label">TR Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="end_date" name="end_date" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center d-flex justify-content-center">
                                                <a href="" target="_blank">
                                                    <button style="width:150px;" type="submit" class="btn btn-primary btn-block">Assign</button>
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
                        <div class="card-header">
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
                                                <input type="text" class="form-control" id="end_date" name="end_date" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="end_date" class="col-sm-4 col-form-label">Code</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="end_date" name="end_date" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center d-flex justify-content-center">
                                                <a href="" target="_blank">
                                                    <button style="width:150px;" type="submit" class="btn btn-primary btn-block">Assign</button>
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
                        <div class="card-header">
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
                                                <input type="date" class="form-control" id="end_date" name="end_date" placeholder="JAN0122">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center d-flex justify-content-center">
                                                <a href="" target="_blank">
                                                    <button style="width:150px;" type="submit" class="btn btn-primary btn-block">Update</button>
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
                        <div class="card-header">
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
                                                    <button style="width:150px;" type="submit" class="btn btn-primary btn-block">View</button>
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
                        <div class="card-header">
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
                                                    <button style="width:150px;" type="submit" class="btn btn-primary btn-block">View</button>
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
    $('select').selectpicker();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
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