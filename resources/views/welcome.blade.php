@extends('layouts.app')
@section('title', 'Bajaj Point - 3S Dealer Of Uttara Motors Ltd')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="justify-content-center" style="margin-bottom: 2rem">
                <div class="bg-dark text-white text-bold text-center rounded" style="padding: 0.5rem 0 0.2rem 0">
                    <h3>Customer Information - Search Panel</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-1 p-0">
        <div class="col-md-4">
            <form class="form-inline mb-1" action="{{ url('chassisSearch') }}" method="post">
                @csrf {{--
                <label for="inputPassword2" class="sr-only">5 Digit Chassis</label>
                --}}
                <input required type="text" class="form-control" style="width: 79%" name="chassis" placeholder="5 Digit Chassis" />
                <button type="submit" class="btn btn-dark" style="width: 21%">
                    Search
                </button>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-inline mb-1" action="{{ url('mobileSearch') }}" method="post">
                @csrf {{--
                <label for="inputPassword2" class="sr-only">Mobile No</label>
                --}}
                <input required type="text" class="form-control" style="width: 79%" name="mobile" placeholder="Mobile No" />
                <button type="submit" class="btn btn-dark" style="width: 21%">
                    Search
                </button>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-inline mb-1" action="{{ url('engineSearch') }}" method="post">
                @csrf {{--
                <label for="inputPassword2" class="sr-only">Engine No</label>
                --}}
                <input required type="text" class="form-control" style="width: 79%" name="engine" placeholder="Engine No" />
                <button type="submit" class="btn btn-dark" style="width: 21%">
                    Search
                </button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <form class="form-inline mb-1" action="{{ url('searchChassisList') }}" method="post">
                @csrf {{--
                <label for="inputPassword2" class="sr-only">5 Digit Chassis</label>
                --}}
                <input required type="text" class="form-control" style="width: 79%" name="chassis" placeholder="Chassis List" />
                <button type="submit" class="btn btn-dark" style="width: 21%">
                    Search
                </button>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-inline mb-1" action="{{ url('searchChassisList') }}" method="post">
                @csrf {{--
                <label for="inputPassword2" class="sr-only">5 Digit Chassis</label>
                --}}
                <input required type="text" class="form-control" style="width: 79%" name="chassis" placeholder="Chassis List" />
                <button type="submit" class="btn btn-dark" style="width: 21%">
                    Search
                </button>
            </form>
        </div>
    </div>
</div>

@endsection