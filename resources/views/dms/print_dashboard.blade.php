@extends('layouts.app') @section('title', 'Print Dashboard') @section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Print Dashboard</h1>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">File</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{ route('print.file_print') }}" method="post" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Dealer</label>
                                            <div class="col-sm-8">
                                                <select name="print_code" class="browser-default custom-select" required="required">
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
                                                <a href="" target="_blank">
                                                    <button type="submit" class="btn btn-dark btn-block">
                                                        Print
                                                    </button>
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
                    <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">VAT Sale</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{ route('vat.vat_sale') }}" method="post" target="_blank">
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
                                                    Print
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
                            <h3 class="text-center rounded">Purchage</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{
                                            route('purchage.purchage_by_date')
                                        }}" method="get" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Dealer</label>
                                            <div class="col-sm-8">
                                                <select name="print_code" class="browser-default custom-select" required>
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
                                                <a href="" target="_blank">
                                                    <button type="submit" class="btn btn-dark btn-block">
                                                        View
                                                    </button>
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
                    <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">
                                Purchage By Month
                            </h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{
                                            route('purchage.purchage_by_month')
                                        }}" method="post" target="_blank">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Dealer</label>
                                            <div class="col-sm-8">
                                                <select name="print_code" class="browser-default custom-select" required>
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
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Month</label>
                                            <div class="col-sm-8">
                                                <select name="month" class="browser-default custom-select" required>
                                                    <option selected>
                                                        Select Month
                                                    </option>
                                                    <option value="January">
                                                        January
                                                    </option>
                                                    <option value="February">
                                                        February
                                                    </option>
                                                    <option value="March">
                                                        March
                                                    </option>
                                                    <option value="April">
                                                        April
                                                    </option>
                                                    <option value="May">
                                                        May
                                                    </option>
                                                    <option value="June">
                                                        June
                                                    </option>
                                                    <option value="July">
                                                        July
                                                    </option>
                                                    <option value="August">
                                                        August
                                                    </option>
                                                    <option value="September">
                                                        September
                                                    </option>
                                                    <option value="October">
                                                        October
                                                    </option>
                                                    <option value="November">
                                                        November
                                                    </option>
                                                    <option value="December">
                                                        December
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Year</label>
                                            <div class="col-sm-8">
                                                <select name="year" id="date-dropdown" class="browser-default custom-select" required>
                                                    <option selected>
                                                        Select Year
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <a href="" target="_blank">
                                                    <button type="submit" class="btn btn-dark btn-block">
                                                        View
                                                    </button>
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
                    <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">VAT Sale By Model</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{ route('vat.vat_sale_by_model') }}" method="post" target="_blank">
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
                                                    Print
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                        <div class="card-header bg-dark">
                            <h3 class="text-center rounded">
                                Sales Update, Hform, Stamp, Gate Pass, Single
                                Print
                            </h3>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <form class="form-inline" target="_blank" action="{{ route('print.print_list') }}">
                                <div class="form-group mb-2">
                                    <label for="five_chassis">Chassis No</label>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="text" name="five_chassis" class="form-control" id="five_chassis" placeholder="Last Five Digit Chassis" />
                                </div>
                                <div class="form-group mb-2">
                                    <label for="five_engine">Engine No</label>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="text" name="five_engine" class="form-control" id="five_engine" placeholder="Last Five Digit Engine" />
                                </div>
                                <button type="submit" class="btn btn-dark mb-2">
                                    View List
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')
<script>
    let dateDropdown = document.getElementById("date-dropdown");

    let currentYear = new Date().getFullYear();
    let earliestYear = 2010;
    while (currentYear >= earliestYear) {
        let dateOption = document.createElement("option");
        dateOption.text = currentYear;
        dateOption.value = currentYear;
        dateDropdown.add(dateOption);
        currentYear -= 1;
    }
</script>
@endsection