@extends('layouts.app')
@section('content')
<div class="container-fluid" style="margin-top:15px; padding:0;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                <div class="card-header bg-dark">
                    <h3 class="text-center rounded">
                        Customer Information
                    </h3>
                </div>
                <div class="row" style="margin-bottom:15px;">
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="vendor" class="col-sm-3 col-form-label form-control-sm">Vendor Name</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$purchage_data ? $purchage_data->vendor : ''}}" type="text" name="vendor" class="form-control form-control-sm" id="vendor">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="factory_challan_no" class="col-sm-3 col-form-label form-control-sm">Challan No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$purchage_data ? $purchage_data->factory_challan_no : ''}}" type="text" name="factory_challan_no" class="form-control form-control-sm" id="factory_challan_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="purchage_date" class="col-sm-3 col-form-label form-control-sm">Purchage Date</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{date('d-m-Y', strtotime($purchage_data ? $purchage_data->purchage_date : ''))}}" type="text" name="purchage_date" class="form-control form-control-sm" id="purchage_date">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="model" class="col-sm-3 col-form-label form-control-sm">Model</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$model_data ? $model_data->model : ''}}" type="text" name="model" class="form-control form-control-sm" id="model">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="ckd_process" class="col-sm-3 col-form-label form-control-sm">CKD</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$core_data ? $core_data->ckd_process : ''}}" type="text" name="ckd_process" class="form-control form-control-sm" id="ckd_process">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="approval_no" class="col-sm-3 col-form-label form-control-sm">Approval No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$core_data ? $core_data->approval_no : ''}}" type="text" name="approval_no" class="form-control form-control-sm" id="approval_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="invoice_no" class="col-sm-3 col-form-label form-control-sm">Invoice No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$core_data ? $core_data->invoice_no : ''}}" type="text" name="invoice_no" class="form-control form-control-sm" id="invoice_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="sale_price" class="col-sm-3 col-form-label form-control-sm">Sale Price</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$core_data ? $core_data->sale_price : ''}}" type="text" name="sale_price" class="form-control form-control-sm" id="sale_price">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="uml_mushak_no" class="col-sm-3 col-form-label form-control-sm">UML Mushak No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$core_data ? $core_data->uml_mushak_no : ''}}" type="text" name="uml_mushak_no" class="form-control form-control-sm" id="uml_mushak_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="whos_vat" class="col-sm-3 col-form-label form-control-sm">Whos VAT</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$core_data ? $core_data->whos_vat : ''}}" type="text" name="whos_vat" class="form-control form-control-sm" id="whos_vat">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="sale_mushak_no" class="col-sm-3 col-form-label form-control-sm">Sale Mushak No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$core_data ? $core_data->sale_mushak_no : ''}}" type="text" name="sale_mushak_no" class="form-control form-control-sm" id="sale_mushak_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="gate_pass" class="col-sm-3 col-form-label form-control-sm">Gate Pass</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$core_data ? $core_data->gate_pass : ''}}" type="text" name="gate_pass" class="form-control form-control-sm" id="gate_pass">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="chassis_no" class="col-sm-3 col-form-label form-control-sm">Chassis No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$core_data ? $core_data->eight_chassis : ''}}{{$core_data ? $core_data->one_chassis : ''}}{{$core_data ? $core_data->three_chassis : ''}}{{$core_data ? $core_data->five_chassis : ''}}" type="text" name="chassis_no" class="form-control form-control-sm" id="chassis_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="engine_no" class="col-sm-3 col-form-label form-control-sm">Engine No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$core_data ? $core_data->six_engine : ''}}{{$core_data ? $core_data->five_engine : ''}}" type="text" name="engine_no" class="form-control form-control-sm" id="engine_no">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="note" class="col-sm-3 col-form-label form-control-sm">Note</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$core_data ? $core_data->note : ''}}" type="text" name="note" class="form-control form-control-sm" id="note">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="size_of_tyre" class="col-sm-3 col-form-label form-control-sm">Tyre Size</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly value="{{$model_data ? $model_data->size_of_tyre : ''}}" type="text" name="size_of_tyre" class="form-control form-control-sm" id="size_of_tyre">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="color" class="col-sm-3 col-form-label form-control-sm">Color</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly required value="{{$color_data ? $color_data->color : ''}}" type="text" name="color" class="form-control form-control-sm" id="color">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="original_sale_date" class="col-sm-3 col-form-label form-control-sm">Sale Date</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly required value="{{date('d-m-Y', strtotime($core_data ? $core_data->original_sale_date : ''))}}" type="text" name="original_sale_date" class="form-control form-control-sm" id="original_sale_date">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="dealer" class="col-sm-3 col-form-label form-control-sm">Dealer</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly required value="{{$core_data ? $core_data->dealer : ''}}" type="text" name="dealer" class="form-control form-control-sm" id="dealer">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="rg_number" class="col-sm-3 col-form-label form-control-sm">RG Number</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly required value="{{$core_data ? $core_data->rg_number : ''}}" type="text" name="rg_number" class="form-control form-control-sm" id="rg_number">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="customer_name" class="col-sm-3 col-form-label form-control-sm">Customer Name</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly required value="{{$core_data ? $core_data->customer_name : ''}}" type="text" name="customer_name" class="form-control form-control-sm" id="customer_name">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="father_name" class="col-sm-3 col-form-label form-control-sm">Father Name</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly required value="{{$core_data ? $core_data->father_name : ''}}" type="text" name="father_name" class="form-control form-control-sm" id="father_name">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="mother_name" class="col-sm-3 col-form-label form-control-sm">Mother Name</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly required value="{{$core_data ? $core_data->mother_name : ''}}" type="text" name="mother_name" class="form-control form-control-sm" id="mother_name">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="mobile" class="col-sm-3 col-form-label form-control-sm">Mobile</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly required value="{{$core_data ? $core_data->mobile : ''}}" type="text" name="mobile" class="form-control form-control-sm" id="mobile">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="vat_process" class="col-sm-3 col-form-label form-control-sm">VAT Process</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly required value="{{$core_data ? $core_data->vat_process : ''}}" type="text" name="vat_process" class="form-control form-control-sm" id="vat_process">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="address" class="col-sm-3 col-form-label form-control-sm">Full Address</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly required value="{{$core_data ? $core_data->address_one : ''}}{{$core_data ? $core_data->address_two : ''}}" type="text" name="address" class="form-control form-control-sm" id="address">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="stage" class="col-sm-3 col-form-label form-control-sm">Stage</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly required value="{{$core_data ? $core_data->stage : ''}}" type="text" name="stage" class="form-control form-control-sm" id="stage">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="file_status" class="col-sm-3 col-form-label form-control-sm">File Status</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly required value="{{$core_data ? $core_data->file_status : ''}}" type="text" name="file_status" class="form-control form-control-sm" id="file_status">
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