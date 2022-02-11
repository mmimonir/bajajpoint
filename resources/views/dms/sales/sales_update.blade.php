@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-info mt-2" style="box-shadow:0 0 25px 0 lightgrey; transform:scaleY(.9);">
                <div class="card-header" style="background-color:#343A40;">
                    <h3 class="card-title" style="margin-bottom:0;">Sales Update</h3>
                </div>
                <form class="form-horizontal" action="" method="POST" id="sale_update_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="id" class="col-sm-3 col-form-label form-control-sm">Id</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->id}}" readonly type="text" name="id" class="form-control form-control-sm" id="id">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="model_code" class="col-sm-3 col-form-label form-control-sm">Model Code</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->model_code}}" readonly type="text" name="model_code" class="form-control form-control-sm" id="model_code">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="model" class="col-sm-3 col-form-label form-control-sm">Model</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$vehicle_data ? $vehicle_data->model : ''}}" readonly type="text" name="model" class="form-control form-control-sm" id="model">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="eight_chassis" class="col-sm-3 col-form-label form-control-sm">Chassis No</label>
                                    <div class="col-sm-3" style="padding:0px;">
                                        <input value="{{$core_data->eight_chassis}}" type="text" name="eight_chassis" class="form-control form-control-sm" id="eight_chassis">
                                    </div>
                                    <div class="col-sm-1" style="padding:0px;">
                                        <input value="{{$core_data->one_chassis}}" type="text" name="one_chassis" class="form-control form-control-sm" id="one_chassis">
                                    </div>
                                    <div class="col-sm-2" style="padding:0px;">
                                        <input value="{{$core_data->three_chassis}}" type="text" name="three_chassis" class="form-control form-control-sm" id="three_chassis">
                                    </div>
                                    <div class="col-sm-3" style="padding:0px;">
                                        <input value="{{$core_data->five_chassis}}" type="text" name="five_chassis" class="form-control form-control-sm" id="five_chassis">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label form-control-sm">Engine No</label>
                                    <div class="col-sm-5" style="padding:0px;">
                                        <input value="{{$core_data->six_engine}}" type="text" name="six_engine" class="form-control form-control-sm" id="six_engine">
                                    </div>
                                    <div class="col-sm-4" style="padding:0px;">
                                        <input value="{{$core_data->five_engine}}" type="text" name="five_engine" class="form-control form-control-sm" id="five_engine">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="customer_name" class="col-sm-3 col-form-label form-control-sm">Customer Name</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->customer_name}}" type="text" name="customer_name" class="form-control form-control-sm" id="customer_name">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="relation" class="col-sm-3 col-form-label form-control-sm">Relation</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->relation}}" type="text" name="relation" class="form-control form-control-sm" id="relation">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="father_name" class="col-sm-3 col-form-label form-control-sm">Father Name</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->father_name}}" type="text" name="father_name" class="form-control form-control-sm" id="father_name">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="mother_name" class="col-sm-3 col-form-label form-control-sm">Mother Name</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->mother_name}}" type="text" name="mother_name" class="form-control form-control-sm" id="mother_name">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="address_one" class="col-sm-3 col-form-label form-control-sm">Address One</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->address_one}}" type="text" name="address_one" class="form-control form-control-sm" id="address_one">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="address_two" class="col-sm-3 col-form-label form-control-sm">Address Two</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->address_two}}" type="text" name="address_two" class="form-control form-control-sm" id="address_two">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="mobile" class="col-sm-3 col-form-label form-control-sm">Mobile</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->mobile}}" type="text" name="mobile" class="form-control form-control-sm" id="mobile">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="email" class="col-sm-3 col-form-label form-control-sm">Email</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->email}}" type="email" name="email" class="form-control form-control-sm" id="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="dob" class="col-sm-6 col-form-label form-control-sm">DOB</label>
                                            <div class="col-sm-6" style="padding:0px;">
                                                <input value="{{$core_data->dob}}" type="date" name="dob" class="form-control form-control-sm" id="dob">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="vat_code" class="col-sm-6 col-form-label form-control-sm">VAT Code</label>
                                            <div class="col-sm-6" style="padding:0px;">
                                                <input value="{{$core_data->vat_code}}" type="text" name="vat_code" class="form-control form-control-sm" id="vat_code">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="print_code" class="col-sm-6 col-form-label form-control-sm">Print Code</label>
                                            <div class="col-sm-6" style="padding:0px;">
                                                <input value="{{$core_data->print_code}}" type="text" name="print_code" class="form-control form-control-sm" id="print_code">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="report_code" class="col-sm-6 col-form-label form-control-sm">Report Code</label>
                                            <div class="col-sm-6" style="padding:0px;">
                                                <input value="{{$core_data->report_code}}" type="text" name="report_code" class="form-control form-control-sm" id="report_code">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="original_sale_date" class="col-sm-6 col-form-label form-control-sm">Ori Sale Date</label>
                                            <div class="col-sm-6" style="padding:0px;">
                                                <input type="date" value="{{$core_data->original_sale_date}}" name="original_sale_date" class="form-control form-control-sm" id="original_sale_date">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="vat_sale_date" class="col-sm-6 col-form-label form-control-sm">VAT Sale Date</label>
                                            <div class="col-sm-6" style="padding:0px;">
                                                <input type="date" value="{{$core_data->vat_sale_date}}" name="vat_sale_date" class="form-control form-control-sm" id="vat_sale_date">
                                            </div>
                                        </div>

                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="sale_date" class="col-sm-6 col-form-label form-control-sm">Sale Date</label>
                                            <div class="col-sm-6" style="padding:0px;">
                                                <input type="date" value="{{$core_data->sale_date}}" name="sale_date" class="form-control form-control-sm" id="sale_date">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="print_date" class="col-sm-6 col-form-label form-control-sm">Print Date</label>
                                            <div class="col-sm-6" style="padding:0px;">
                                                <input type="date" value="{{$core_data->print_date}}" name="print_date" class="form-control form-control-sm" id="print_date">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="purchage_price" class="col-sm-6 col-form-label form-control-sm">Buy Price</label>
                                            <div class="col-sm-6" style="padding:0px;">
                                                <input type="text" value="{{$core_data->purchage_price}}" name="purchage_price" class="form-control form-control-sm" id="purchage_price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="nid_no" class="col-sm-5 col-form-label form-control-sm">NID No</label>
                                            <div class="col-sm-7" style="padding:0px;">
                                                <input value="{{$core_data->nid_no}}" type="text" name="nid_no" class="form-control form-control-sm" id="nid_no">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="ckd_process" class="col-sm-5 col-form-label form-control-sm">CKD Process</label>
                                            <div class="col-sm-7" style="padding:0px;">
                                                <input value="{{$core_data->ckd_process}}" type="text" name="ckd_process" class="form-control form-control-sm" id="ckd_process">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="approval_no" class="col-sm-5 col-form-label form-control-sm">Ref No</label>
                                            <div class="col-sm-7" style="padding:0px;">
                                                <input value="{{$core_data->approval_no}}" type="text" name="approval_no" class="form-control form-control-sm" id="approval_no">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="invoice_no" class="col-sm-5 col-form-label form-control-sm">Invoice No</label>
                                            <div class="col-sm-7" style="padding:0px;">
                                                <input value="{{$core_data->invoice_no}}" type="text" name="invoice_no" class="form-control form-control-sm" id="invoice_no">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="sale_mushak_no" class="col-sm-5 col-form-label form-control-sm">Sale Mus No</label>
                                            <div class="col-sm-7" style="padding:0px;">
                                                <input value="{{$core_data->sale_mushak_no}}" type="text" name="sale_mushak_no" class="form-control form-control-sm" id="sale_mushak_no">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="uml_mushak_no" class="col-sm-5 col-form-label form-control-sm">UML Mus No</label>
                                            <div class="col-sm-7" style="padding:0px;">
                                                <input value="{{ $purchage_data ? ($purchage_data->uml_mushak_no ? $purchage_data->uml_mushak_no : $core_data->uml_mushak_no) : $core_data->uml_mushak_no }}" type="text" name="uml_mushak_no" class="form-control form-control-sm" id="uml_mushak_no">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="challan_no" class="col-sm-5 col-form-label form-control-sm">Tail Mus No</label>
                                            <div class="col-sm-7" style="padding:0px;">
                                                <input value="{{ $purchage_data ? ($purchage_data->challan_no ? $purchage_data->challan_no : $core_data->challan_no) : $core_data->challan_no }}" type="text" name="challan_no" class="form-control form-control-sm" id="challan_no">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="whos_vat" class="col-sm-5 col-form-label form-control-sm">Whos VAT</label>
                                            <div class="col-sm-7" style="padding:0px;">
                                                <input value="{{$core_data->whos_vat}}" type="text" name="whos_vat" class="form-control form-control-sm" id="whos_vat">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="sale_profit" class="col-sm-5 col-form-label form-control-sm">Sale Profit</label>
                                            <div class="col-sm-7" style="padding:0px;">
                                                <input type="text" value="{{$core_data->sale_profit}}" name="sale_profit" class="form-control form-control-sm" id="sale_profit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label form-control-sm">Color Code</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <select name="color_code" class="browser-default custom-select">
                                            <option>Open this select menu</option>
                                            @foreach ($color_data as $color)
                                            <option {{$color->color_code == $core_data->color_code ? 'selected' : ''}} value="{{$color->color_code}}">{{$color->color}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="vendor" class="col-sm-3 col-form-label form-control-sm">Vendor</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{ $purchage_data ? ($purchage_data->vendor ? $purchage_data->vendor : $core_data->vendor) : $core_data->vendor }}" type="text" name="vendor" class="form-control form-control-sm" id="vendor">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="stage" class="col-sm-3 col-form-label form-control-sm">Stage</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->stage}}" type="text" name="stage" class="form-control form-control-sm" id="stage">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="unit_price_vat" class="col-sm-3 col-form-label form-control-sm">VAT MRP</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->unit_price_vat}}" type="text" name="unit_price_vat" class="form-control form-control-sm" id="unit_price_vat">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="basic_price_vat" class="col-sm-3 col-form-label form-control-sm">VAT Basic</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->basic_price_vat}}" type="text" name="basic_price_vat" class="form-control form-control-sm" id="basic_price_vat">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="sale_vat" class="col-sm-3 col-form-label form-control-sm">Sale VAT</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->sale_vat}}" type="text" name="sale_vat" class="form-control form-control-sm" id="sale_vat">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="tr_month_code" class="col-sm-3 col-form-label form-control-sm">TR Month Code</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->tr_month_code}}" type="text" name="tr_month_code" class="form-control form-control-sm" id="tr_month_code">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="vat_year_sale" class="col-sm-3 col-form-label form-control-sm">VAT Year Sale</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->vat_year_sale}}" type="text" name="vat_year_sale" class="form-control form-control-sm" id="vat_year_sale">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="vat_month_sale" class="col-sm-3 col-form-label form-control-sm">VAT Month Sale</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->vat_month_sale}}" type="text" name="vat_month_sale" class="form-control form-control-sm" id="vat_month_sale">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="vat_process" class="col-sm-3 col-form-label form-control-sm">VAT Process</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->vat_process}}" type="text" name="vat_process" class="form-control form-control-sm" id="vat_process">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="rg_number" class="col-sm-3 col-form-label form-control-sm">RG Number</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->rg_number}}" type="text" name="rg_number" class="form-control form-control-sm" id="rg_number">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="sale_price" class="col-sm-3 col-form-label form-control-sm">Sale Price</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->sale_price}}" type="text" name="sale_price" class="form-control form-control-sm" id="sale_price">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="dealer" class="col-sm-3 col-form-label form-control-sm">Dealer</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->dealer}}" type="text" name="dealer" class="form-control form-control-sm" id="dealer">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="purchage_date" class="col-sm-3 col-form-label form-control-sm">Purchage Date</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{ $purchage_data ? ($purchage_data->purchage_date ? $purchage_data->purchage_date : $core_data->purchage_date) : $core_data->purchage_date }}" type="date" name="purchage_date" class="form-control form-control-sm" id="purchage_date">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="uml_mushak_date" class="col-sm-3 col-form-label form-control-sm">UML Mus Date</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{ $purchage_data ? ($purchage_data->uml_mushak_date ? $purchage_data->uml_mushak_date : $core_data->mushak_date) : $core_data->mushak_date }}" type="date" name="uml_mushak_date" class="form-control form-control-sm" id="uml_mushak_date">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="print_ref" class="col-sm-3 col-form-label form-control-sm">Print Ref</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->print_ref }}" type="text" name="print_ref" class="form-control form-control-sm" id="print_ref">
                                    </div>
                                </div>
                                <!-- <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="print_ref" class="col-sm-3 col-form-label form-control-sm">Print Ref</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <select name="print_ref" class="browser-default custom-select">
                                            <option>Open this select menu</option>
                                            @foreach ($print_ref as $ref)
                                            <option {{$ref->print_ref == $core_data->print_ref ? 'selected' : ''}} value="{{$ref->print_ref}}">{{$ref->print_ref}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> -->
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="evl_invoice_no" class="col-sm-3 col-form-label form-control-sm">EVL Invoice</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->evl_invoice_no}}" type="text" name="evl_invoice_no" class="form-control form-control-sm" id="evl_invoice_no">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="note" class="col-sm-3 col-form-label form-control-sm">Note</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->note}}" type="text" name="note" class="form-control form-control-sm" id="note">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="file_status" class="col-sm-3 col-form-label form-control-sm">File Status</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->file_status}}" type="text" name="file_status" class="form-control form-control-sm" id="file_status">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="updated_at" class="col-sm-3 col-form-label form-control-sm">Updated At</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->updated_at}}" type="text" name="updated_at" class="form-control form-control-sm" id="updated_at">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <label for="fake_sale_date" class="col-sm-3 col-form-label form-control-sm">Fake Sale Date</label>
                                    <div class="col-sm-9" style="padding:0px;">
                                        <input value="{{$core_data->fake_sale_date}}" type="date" name="fake_sale_date" class="form-control form-control-sm" id="fake_sale_date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="price_declare_id" class="col-sm-6 col-form-label form-control-sm">Price Dec Id</label>
                                            <div class="col-sm-6" style="padding:0px;">
                                                <input value="{{$pd_data ? $pd_data->id : ''}}" type="text" name="price_declare_id" class="form-control form-control-sm" id="price_declare_id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row" style="margin-bottom:0px;">
                                            <label for="vat_mrp" class="col-sm-5 col-form-label form-control-sm">PD Price</label>
                                            <div class="col-sm-7" style="padding:0px;">
                                                <input value="{{$pd_data ? $pd_data->vat_mrp : ''}} Date: {{$pd_data ? date('d.m.y', strtotime($pd_data->submit_date))  : ''}}" type="text" name="vat_mrp" class="form-control form-control-sm" id="vat_mrp">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-info" style="width:350px; color:white;">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $("#sale_update_form").submit(function(e) {
            e.preventDefault();
            const FD = new FormData(this);
            $.ajax({
                url: "{{ route('sale.sales_update_store') }}",
                method: 'post',
                data: FD,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                            footer: '<a href="">Why do I have this issue?</a>'
                        })
                    }
                }
            });
        });

        $("#sale_price").change(function() {
            var sale_price = +$('#sale_price').val();
            var purchage_price = +$('#purchage_price').val();
            var sale_profit = sale_price - purchage_price;
            $('#sale_profit').val(sale_profit);
        });

        function getCurrentFinancialYear(sale_date) {
            var financial_year = "";
            var today = new Date(sale_date);
            if ((today.getMonth() + 1) <= 3) {
                financial_year = (today.getFullYear() - 1) + "-" + today.getFullYear()
            } else {
                financial_year = today.getFullYear() + "-" + (today.getFullYear() + 1)
            }
            return financial_year;
        }

        function print_ref(print_code, year) {
            switch (print_code) {
                case 2000:
                    $('#print_ref').val(`BAJAJ POINT/DHAKA/${year}`);
                    break;
                case 2011:
                    $('#print_ref').val(`BAJAJ HEAVEN/DHAKA/${year}`);
                    break;
                case 2030:
                    $('#print_ref').val(`BAJAJ BLOOM/DHAKA/${year}`);
                    break;
                default:
                    $('#print_ref').val('');
                    break;
            }
        }

        $("#print_code").change(function() {
            var sale_date = $('#original_sale_date').val();
            var year = getCurrentFinancialYear(sale_date)

            var print_code = +$('#print_code').val();
            print_ref(print_code, year);
        });
        $("#original_sale_date").on("change", function() {
            var sale_date = $('#original_sale_date').val();
            $('#vat_sale_date').val(sale_date);
            $('#sale_date').val(sale_date);
            $('#print_date').val(sale_date);

            var year = getCurrentFinancialYear(sale_date)
            var print_code = +$('#print_code').val();
            print_ref(print_code, year);

            let csrf = '{{ csrf_token() }}';
            var vat_code = +$('#vat_code').val();
            var model_code = $('#model_code').val();

            const date = new Date($('#vat_sale_date').val());
            const month = date.toLocaleString('default', {
                month: 'short'
            }).toUpperCase();

            $.ajax({
                url: "{{ route('utility.assessment_year') }}",
                method: 'post',
                data: {
                    model_code: model_code,
                    _token: csrf
                },
                success: function({
                    assessment,
                    vat_mrp
                }) {
                    if (vat_code == 2000 || vat_code == 2011 || vat_code == 2030) {
                        const vat_sale_date = $('#vat_sale_date').val();
                        const vat_month_year = new Date(vat_sale_date).getFullYear();
                        const year = getCurrentFinancialYear(vat_sale_date);

                        $('#vat_year_sale').val(year.replace('-', ''));
                        $('#vat_month_sale').val(month + vat_month_year);
                        $('#unit_price_vat').val(vat_mrp[0].vat_mrp);

                        const unit_price_vat = +vat_mrp[0].vat_mrp;
                        const sale_vat = Math.round(unit_price_vat * 15 / 115);
                        const basic_price_vat = Math.round(unit_price_vat - sale_vat);

                        $('#sale_vat').val(sale_vat);
                        $('#basic_price_vat').val(basic_price_vat);
                    } else {
                        $('#unit_price_vat').val(vat_mrp[0].vat_mrp);
                        const unit_price_vat = +vat_mrp[0].vat_mrp;
                        const sale_vat = Math.round(unit_price_vat * 15 / 115);
                        const basic_price_vat = Math.round(unit_price_vat - sale_vat);

                        $('#sale_vat').val(sale_vat);
                        $('#basic_price_vat').val(basic_price_vat);
                    }
                },
            });

        });
    });
</script>
@endsection