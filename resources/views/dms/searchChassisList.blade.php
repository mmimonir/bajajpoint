@extends('products.layout')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <h3 class="bg-success text-center p-2 text-white mt-2 rounded">Customer Information</h3>
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form>
                    @foreach ($cores as $core)
                    <div class="form-group row">
                        <label class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">Chassis
                            No</label>
                        <label class="col-md-7 form-control col-form-label">{{ $core->ChassisNo }}</label>
                        <a href="{{ url('customerInfoFullChassis').'/'. $core->ChassisNo}}"
                            class="col-md-2 form-control col-form-label btn btn-primary">View</a>
                    </div>
                    <div class="form-group row">
                        <label class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">Engine
                            No</label>
                        <label class="col-md-7 form-control col-form-label">{{ $core->EngineNo }}</label>
                    </div>
                    <hr class="mt-5 mb-5" style="border-top: 4px solid #999;">

                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
