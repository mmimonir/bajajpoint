@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <h3 class="bg-primary text-center p-2 text-white mt-2 rounded">Customer Information</h3>
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form>
                    @foreach ($cores as $core)
                    <div class="form-group row">
                        <label class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">Chassis
                            No</label>
                        <label id="ChassisNo" class="col-md-9 form-control col-form-label">{{ $core->ChassisNo
                            }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">Engine
                            No</label>
                        <label id="EngineNo" class="col-md-9 form-control col-form-label">{{ $core->EngineNo }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">From
                            Challan</label>
                        <label id="VendorName" class="col-md-9 form-control col-form-label">{{ $core->VendorName
                            }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">Purchage
                            Date</label>
                        <label class="col-md-9 form-control col-form-label">
                            @if ($core->PurchageDate)
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $core->PurchageDate)->format('d-m-Y')}}
                            @endif
                        </label>
                    </div>
                    <div class="form-group row">
                        <label class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">Sale
                            Date</label>
                        <label class="col-md-9 form-control col-form-label">
                            @if ($core->OriginalSaleDate)
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                            $core->OriginalSaleDate)->format('d-m-Y')}}
                            @endif
                        </label>
                    </div>
                    <div class="form-group row">
                        <label class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">CKD
                            Process</label>
                        <label class="col-md-9 form-control col-form-label">{{ $core->CKDProcess }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">VAT
                            Process</label>
                        <label class="col-md-9 form-control col-form-label">{{ $core->VatProcess }}</label>
                    </div>

                    <div class="form-group row">
                        <label class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">Customer
                            Name</label>
                        <label class="col-md-9 form-control col-form-label">{{ $core->CustomerName }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">Mobile
                            No</label>
                        <label class="col-md-9 form-control col-form-label">{{ $core->Mobile }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">Full
                            Address</label>
                        <label class="col-md-9 form-control col-form-label">{{ $core->FullAddress }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">File
                            Status</label>
                        <label class="col-md-9 form-control col-form-label">{{ $core->FileStatus }}</label>
                    </div>
                    <div class="form-group row">
                        <label
                            class="bg-dark text-white font-weight-bold col-md-3 form-control col-form-label">Registraion
                            Number</label>
                        <label class="col-md-9 form-control col-form-label">{{ $core->RGNumber }}</label>
                    </div>
                    <hr class="mt-5 mb-5" style="border-top: 4px solid #999;">
                    @endforeach
                </form>
                <button class="btn btn-outline-info mx-auto" id="button">Conver to PDF</button>
            </div>
        </div>
    </div>
</div>
@endsection
