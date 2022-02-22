@extends('layouts.app')
@section('title', 'Bajaj Point - 3S Dealer Of UttaraMotors Ltd')
@section('content')
<div class="container-fluid" style="margin-top:15px; padding:0;">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Search Together</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                            <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" style="display: block; padding:0px;">
                    <div class="card mt-1" style="box-shadow: 0 0 5px 0 lightgrey">
                        <div class="card-header bg-dark d-flex justify-content-center">
                            <h3 class="card-title">
                                Sales Update, Hform, Stamp, Gate Pass, Single
                                Print
                            </h3>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <form class="form-inline" action="#" method="post" id="search_form">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="five_chassis">Chassis No</label>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="text" name="five_chassis" class="form-control" id="five_chassis" placeholder="Last Five Digit Chassis">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="five_engine">Engine No</label>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="text" name="five_engine" class="form-control" id="five_engine" placeholder="Last Five Digit Engine">
                                </div>
                                <button type="submit" class="btn btn-dark mb-2">
                                    Search
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top:-15px; padding:0px;">
                        <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey; margin-bottom:0px;" id="show_search_result">

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Reports</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                            <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                                <div class="card-header bg-dark d-flex justify-content-center">
                                    <h3 class="card-title">CKD Pending</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <form action="{{ route('ckd.ckd_pending') }}" method="get" target="_blank">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-12 text-center">
                                                        <a href="" target="_blank">
                                                            <button type="submit" class="btn btn-dark btn-block">
                                                                View List
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
                                <div class="card-header bg-dark d-flex justify-content-center">
                                    <h3 class="card-title">TR Status</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <form action="{{
                                            route('excel.service_data')
                                        }}" method="post" target="_blank">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-12 text-center">
                                                        <a href="" target="_blank">
                                                            <button type="submit" class="btn btn-dark btn-block">
                                                                View List
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
                                <div class="card-header bg-dark d-flex justify-content-center">
                                    <h3 class="card-title">Quotation</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <form action="{{route('quotation.create')}}" method="get" target="_blank">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-12 text-center">
                                                        <a href="" target="_blank">
                                                            <button type="submit" class="btn btn-dark btn-block">
                                                                Create
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
                                <div class="card-header bg-dark d-flex justify-content-center">
                                    <h3 class="card-title">Quotation List</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <a href="{{route('quotation.list')}}" target="_blank">
                                                <button type="submit" class="btn btn-dark btn-block">
                                                    List
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-12">
            <div class="small-box bg-dark">
                <div class="inner d-flex justify-content-center">
                    <a style="font-size:20px;" href="{{ route('utility.download') }}" class="btn btn-sm btn-primary text-white"><i class="fa-solid fa-download text-white" style="color:black; margin-right:5px;"></i>Download Backup</a>
                </div>
            </div>
        </div> -->

    </div>

</div>
<!-- Modal Info-->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header text-write" style="padding:5px 21px;">
                <h4 class="modal-title" id="title">Customer Info</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <div class="container-fluid">
                <div class="row" style="margin-bottom:15px;">
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="vendor" class="col-sm-3 col-form-label form-control-sm">Vendor Name</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="vendor" class="form-control form-control-sm" id="vendor">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="factory_challan_no" class="col-sm-3 col-form-label form-control-sm">Challan No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="factory_challan_no" class="form-control form-control-sm" id="factory_challan_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="purchage_date" class="col-sm-3 col-form-label form-control-sm">Purchage Date</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="purchage_date" class="form-control form-control-sm" id="purchage_date">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="model" class="col-sm-3 col-form-label form-control-sm">Model</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="model" class="form-control form-control-sm" id="model">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="ckd_process" class="col-sm-3 col-form-label form-control-sm">CKD</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="ckd_process" class="form-control form-control-sm" id="ckd_process">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="approval_no" class="col-sm-3 col-form-label form-control-sm">Approval No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="approval_no" class="form-control form-control-sm" id="approval_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="invoice_no" class="col-sm-3 col-form-label form-control-sm">Invoice No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="invoice_no" class="form-control form-control-sm" id="invoice_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="sale_price" class="col-sm-3 col-form-label form-control-sm">Sale Price</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="sale_price" class="form-control form-control-sm" id="sale_price">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="uml_mushak_no" class="col-sm-3 col-form-label form-control-sm">UML Mushak No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="uml_mushak_no" class="form-control form-control-sm" id="uml_mushak_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="whos_vat" class="col-sm-3 col-form-label form-control-sm">Whos VAT</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="whos_vat" class="form-control form-control-sm" id="whos_vat">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="sale_mushak_no" class="col-sm-3 col-form-label form-control-sm">Sale Mushak No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="sale_mushak_no" class="form-control form-control-sm" id="sale_mushak_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="gate_pass" class="col-sm-3 col-form-label form-control-sm">Gate Pass</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="gate_pass" class="form-control form-control-sm" id="gate_pass">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="chassis_no" class="col-sm-3 col-form-label form-control-sm">Chassis No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="chassis_no" class="form-control form-control-sm" id="chassis_no">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="engine_no" class="col-sm-3 col-form-label form-control-sm">Engine No</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="engine_no" class="form-control form-control-sm" id="engine_no">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="note" class="col-sm-3 col-form-label form-control-sm">Note</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="note" class="form-control form-control-sm" id="note">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="size_of_tyre" class="col-sm-3 col-form-label form-control-sm">Tyre Size</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="size_of_tyre" class="form-control form-control-sm" id="size_of_tyre">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="color" class="col-sm-3 col-form-label form-control-sm">Color</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="color" class="form-control form-control-sm" id="color">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="original_sale_date" class="col-sm-3 col-form-label form-control-sm">Sale Date</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="original_sale_date" class="form-control form-control-sm" id="original_sale_date">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="dealer" class="col-sm-3 col-form-label form-control-sm">Dealer</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="dealer" class="form-control form-control-sm" id="dealer">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="rg_number" class="col-sm-3 col-form-label form-control-sm">RG Number</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="rg_number" class="form-control form-control-sm" id="rg_number">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="customer_name" class="col-sm-3 col-form-label form-control-sm">Customer Name</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="customer_name" class="form-control form-control-sm" id="customer_name">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="father_name" class="col-sm-3 col-form-label form-control-sm">Father Name</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="father_name" class="form-control form-control-sm" id="father_name">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="mother_name" class="col-sm-3 col-form-label form-control-sm">Mother Name</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="mother_name" class="form-control form-control-sm" id="mother_name">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="mobile" class="col-sm-3 col-form-label form-control-sm">Mobile</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="mobile" class="form-control form-control-sm" id="mobile">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="vat_process" class="col-sm-3 col-form-label form-control-sm">VAT Process</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="vat_process" class="form-control form-control-sm" id="vat_process">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="address" class="col-sm-3 col-form-label form-control-sm">Full Address</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="address" class="form-control form-control-sm" id="address">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="stage" class="col-sm-3 col-form-label form-control-sm">Stage</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="stage" class="form-control form-control-sm" id="stage">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <label for="file_status" class="col-sm-3 col-form-label form-control-sm">File Status</label>
                                <div class="col-sm-9" style="padding:0px;">
                                    <input readonly type="text" name="file_status" class="form-control form-control-sm" id="file_status">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Info End-->

<!-- Modal Sales Update-->
<div class="modal fade" id="salesUpdateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header text-write" style="padding:5px 21px;">
                <h4 class="modal-title" id="title">Sales Update</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <div class="container-fluid">
                <div class="row" style="margin-bottom:15px;">
                    <form class="form-horizontal" action="" method="POST" id="sale_update_form">
                        @csrf
                        <div class="row" style="margin-bottom: -14px;">
                            <div class=" col-md-6">
                                <div class="card-body">
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="id" class="col-sm-3 col-form-label form-control-sm">Id</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required readonly type="text" name="id" class="form-control form-control-sm" id="id2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="model_code" class="col-sm-3 col-form-label form-control-sm">Model Code</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required readonly type="text" name="model_code" class="form-control form-control-sm" id="model_code2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="model" class="col-sm-3 col-form-label form-control-sm">Model</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required readonly type="text" name="model" class="form-control form-control-sm" id="model_name2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="eight_chassis" class="col-sm-3 col-form-label form-control-sm">Chassis No</label>
                                        <div class="col-sm-3" style="padding:0px;">
                                            <input required type="text" name="eight_chassis" class="form-control form-control-sm" id="eight_chassis2">
                                        </div>
                                        <div class="col-sm-1" style="padding:0px;">
                                            <input required type="text" name="one_chassis" class="form-control form-control-sm" id="one_chassis2">
                                        </div>
                                        <div class="col-sm-2" style="padding:0px;">
                                            <input required type="text" name="three_chassis" class="form-control form-control-sm" id="three_chassis2">
                                        </div>
                                        <div class="col-sm-3" style="padding:0px;">
                                            <input required type="text" name="five_chassis" class="form-control form-control-sm" id="five_chassis2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label form-control-sm">Engine No</label>
                                        <div class="col-sm-5" style="padding:0px;">
                                            <input required type="text" name="six_engine" class="form-control form-control-sm" id="six_engine2">
                                        </div>
                                        <div class="col-sm-4" style="padding:0px;">
                                            <input required type="text" name="five_engine" class="form-control form-control-sm" id="five_engine2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="customer_name" class="col-sm-3 col-form-label form-control-sm">Customer Name</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="customer_name" class="form-control form-control-sm" id="customer_name2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="relation" class="col-sm-3 col-form-label form-control-sm">Relation</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="relation" class="form-control form-control-sm" id="relation2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="father_name" class="col-sm-3 col-form-label form-control-sm">Father Name</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="father_name" class="form-control form-control-sm" id="father_name2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="mother_name" class="col-sm-3 col-form-label form-control-sm">Mother Name</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="mother_name" class="form-control form-control-sm" id="mother_name2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="address_one" class="col-sm-3 col-form-label form-control-sm">Address One</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="address_one" class="form-control form-control-sm" id="address_one2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="address_two" class="col-sm-3 col-form-label form-control-sm">Address Two</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="address_two" class="form-control form-control-sm" id="address_two2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="mobile" class="col-sm-3 col-form-label form-control-sm">Mobile</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="mobile" class="form-control form-control-sm" id="mobile2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="email" class="col-sm-3 col-form-label form-control-sm">Email</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input type="email" name="email" class="form-control form-control-sm" id="email2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="print_ref" class="col-sm-3 col-form-label form-control-sm">Print Ref</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="print_ref" class="form-control form-control-sm" id="print_ref2">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="dob" class="col-sm-6 col-form-label form-control-sm">DOB</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="date" name="dob" class="form-control form-control-sm" id="dob2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="vat_code" class="col-sm-6 col-form-label form-control-sm">VAT Code</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="vat_code" class="form-control form-control-sm" id="vat_code2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="print_code" class="col-sm-6 col-form-label form-control-sm">Print Code</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="print_code" class="form-control form-control-sm" id="print_code2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="report_code" class="col-sm-6 col-form-label form-control-sm">Report Code</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="report_code" class="form-control form-control-sm" id="report_code2">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="nid_no" class="col-sm-5 col-form-label form-control-sm">NID No</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="nid_no" class="form-control form-control-sm" id="nid_no2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="ckd_process" class="col-sm-5 col-form-label form-control-sm">CKD Process</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="ckd_process" class="form-control form-control-sm" id="ckd_process2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="approval_no" class="col-sm-5 col-form-label form-control-sm">Ref No</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="approval_no" class="form-control form-control-sm" id="approval_no2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="invoice_no" class="col-sm-5 col-form-label form-control-sm">Invoice No</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="invoice_no" class="form-control form-control-sm" id="invoice_no2">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="vendor" class="col-sm-3 col-form-label form-control-sm">Vendor</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="vendor" class="form-control form-control-sm" id="vendor2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label form-control-sm">Color Code</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <select name="color_code" class="browser-default custom-select color_code">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="original_sale_date" class="col-sm-6 col-form-label form-control-sm">Ori Sale Date</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input required type="date" name="original_sale_date" class="form-control form-control-sm" id="original_sale_date2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="vat_sale_date" class="col-sm-6 col-form-label form-control-sm">VAT Sale Date</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input required type="date" name="vat_sale_date" class="form-control form-control-sm" id="vat_sale_date2">
                                                </div>
                                            </div>

                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="sale_date" class="col-sm-6 col-form-label form-control-sm">Sale Date</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input required type="date" name="sale_date" class="form-control form-control-sm" id="sale_date2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="print_date" class="col-sm-6 col-form-label form-control-sm">Print Date</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input required type="date" name="print_date" class="form-control form-control-sm" id="print_date2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="purchage_price" class="col-sm-6 col-form-label form-control-sm">Buy Price</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input required type="text" name="purchage_price" class="form-control form-control-sm" id="purchage_price2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="stage" class="col-sm-6 col-form-label form-control-sm">Stage</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="stage" class="form-control form-control-sm" id="stage2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="basic_price_vat" class="col-sm-6 col-form-label form-control-sm">VAT Basic</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input required type="text" name="basic_price_vat" class="form-control form-control-sm" id="basic_price_vat2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="tr_month_code" class="col-sm-6 col-form-label form-control-sm">TR Month Code</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="tr_month_code" class="form-control form-control-sm" id="tr_month_code2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="vat_month_sale" class="col-sm-6 col-form-label form-control-sm">VAT Month Sale</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="vat_month_sale" class="form-control form-control-sm" id="vat_month_sale2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="vat_process" class="col-sm-6 col-form-label form-control-sm">VAT Process</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="vat_process" class="form-control form-control-sm" id="vat_process2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="rg_number" class="col-sm-6 col-form-label form-control-sm">RG Number</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="rg_number" class="form-control form-control-sm" id="rg_number2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="uml_mushak_date" class="col-sm-6 col-form-label form-control-sm">UML Mus Date</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="date" name="mushak_date" class="form-control form-control-sm" id="mushak_date2">
                                                </div>
                                            </div>

                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="evl_invoice_no" class="col-sm-6 col-form-label form-control-sm">EVL Invoice</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="evl_invoice_no" class="form-control form-control-sm" id="evl_invoice_no2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="price_declare_id" class="col-sm-6 col-form-label form-control-sm">Price Dec Id</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="price_declare_id" class="form-control form-control-sm" id="price_declare_id2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="unit_price_vat" class="col-sm-5 col-form-label form-control-sm">VAT MRP</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input required type="text" name="unit_price_vat" class="form-control form-control-sm" id="unit_price_vat2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="sale_vat" class="col-sm-5 col-form-label form-control-sm">Sale VAT</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input required type="text" name="sale_vat" class="form-control form-control-sm" id="sale_vat2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="vat_year_sale" class="col-sm-5 col-form-label form-control-sm">VAT Year Sale</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="vat_year_sale" class="form-control form-control-sm" id="vat_year_sale2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="sale_price" class="col-sm-5 col-form-label form-control-sm">Sale Price</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="sale_price" class="form-control form-control-sm" id="sale_price2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="dealer" class="col-sm-5 col-form-label form-control-sm">Dealer</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="dealer" class="form-control form-control-sm" id="dealer2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="purchage_date" class="col-sm-5 col-form-label form-control-sm">Purchage Date</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input required type="date" name="purchage_date" class="form-control form-control-sm" id="purchage_date2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="sale_mushak_no" class="col-sm-5 col-form-label form-control-sm">Sale Mus No</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="sale_mushak_no" class="form-control form-control-sm" id="sale_mushak_no2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="uml_mushak_no" class="col-sm-5 col-form-label form-control-sm">UML Mus No</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="uml_mushak_no" class="form-control form-control-sm" id="uml_mushak_no2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="challan_no" class="col-sm-5 col-form-label form-control-sm">Tail Mus No</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="factory_challan_no" class="form-control form-control-sm" id="factory_challan_no2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="whos_vat" class="col-sm-5 col-form-label form-control-sm">Whos VAT</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="whos_vat" class="form-control form-control-sm" id="whos_vat2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="sale_profit" class="col-sm-5 col-form-label form-control-sm">Sale Profit</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="sale_profit" class="form-control form-control-sm" id="sale_profit2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="note" class="col-sm-5 col-form-label form-control-sm">Note</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="note" class="form-control form-control-sm" id="note2">
                                                </div>
                                            </div>

                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="updated_at" class="col-sm-5 col-form-label form-control-sm">Updated At</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="updated_at" class="form-control form-control-sm" id="updated_at2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="vat_mrp" class="col-sm-5 col-form-label form-control-sm">PD Price</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="vat_mrp" class="form-control form-control-sm" id="vat_mrp2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="file_status" class="col-sm-3 col-form-label form-control-sm">File Status</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input type="text" name="file_status" class="form-control form-control-sm" id="file_status2">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="fake_sale_date" class="col-sm-3 col-form-label form-control-sm">Fake Sale Date</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input type="date" name="fake_sale_date" class="form-control form-control-sm" id="fake_sale_date2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-info" style="width:350px; color:white;">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Sales Update End-->
@endsection

@section('datatable')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $("#sale_update_form").submit(function(e) {
            e.preventDefault();
            const FD = new FormData(this);
            console.log(FD);
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
                        $('#salesUpdateModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                    } else {
                        $('#salesUpdateModal').modal('hide');
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

        $("#sale_price2").change(function() {
            var sale_price = +$('#sale_price2').val();
            var purchage_price = +$('#purchage_price2').val();
            var sale_profit = sale_price - purchage_price;
            $('#sale_profit2').val(sale_profit);
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
                    $('#print_ref2').val(`BAJAJ POINT/DHAKA/${year}`);
                    break;
                case 2011:
                    $('#print_ref2').val(`BAJAJ HEAVEN/DHAKA/${year}`);
                    break;
                case 2030:
                    $('#print_ref2').val(`BAJAJ BLOOM/DHAKA/${year}`);
                    break;
                default:
                    $('#print_ref2').val('');
                    break;
            }
        }

        $("#print_code2").change(function() {
            var sale_date = $('#original_sale_date2').val();
            var year = getCurrentFinancialYear(sale_date)

            var print_code = +$('#print_code2').val();
            print_ref(print_code, year);
        });
        $("#original_sale_date2").on("change", function() {
            var sale_date = $('#original_sale_date2').val();
            $('#vat_sale_date2').val(sale_date);
            $('#sale_date2').val(sale_date);
            $('#print_date2').val(sale_date);

            var year = getCurrentFinancialYear(sale_date)
            var print_code = +$('#print_code2').val();
            print_ref(print_code, year);

            let csrf = '{{ csrf_token() }}';
            var vat_code = +$('#vat_code2').val();
            var model_code = $('#model_code2').val();

            const date = new Date($('#vat_sale_date2').val());
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
                        const vat_sale_date = $('#vat_sale_date2').val();
                        const vat_month_year = new Date(vat_sale_date).getFullYear();
                        const year = getCurrentFinancialYear(vat_sale_date);

                        $('#vat_year_sale2').val(year.replace('-', ''));
                        $('#vat_month_sale2').val(month + vat_month_year);
                        $('#unit_price_vat2').val(vat_mrp[0].vat_mrp);

                        const unit_price_vat = +vat_mrp[0].vat_mrp;
                        const sale_vat = Math.round(unit_price_vat * 15 / 115);
                        const basic_price_vat = Math.round(unit_price_vat - sale_vat);

                        $('#sale_vat2').val(sale_vat);
                        $('#basic_price_vat2').val(basic_price_vat);
                    } else {
                        $('#unit_price_vat2').val(vat_mrp[0].vat_mrp);
                        const unit_price_vat = +vat_mrp[0].vat_mrp;
                        const sale_vat = Math.round(unit_price_vat * 15 / 115);
                        const basic_price_vat = Math.round(unit_price_vat - sale_vat);

                        $('#sale_vat2').val(sale_vat);
                        $('#basic_price_vat2').val(basic_price_vat);
                    }
                },
            });
        });
        $("#search_form").submit(function(e) {
            e.preventDefault();
            const FD = new FormData(this);
            $.ajax({
                url: "{{ route('print.print_list_dashboard') }}",
                method: 'post',
                data: FD,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.length > 0) {
                        var html = `
                <div class="card-header bg-dark">                
                    <h3 class="card-title">
                        Search Result
                    </h3>
                </div>
                <div>                
                    <table id="search_result" class="table table-hover table-sm table-bordered">
                        <thead class="text-center">
                            <tr class="text-sm">
                                <th>Sl</th>
                                <th>Model</th>
                                <th>Sale Date</th>
                                <th>Chassis No</th>
                                <th>Engine No</th>
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                <th>Action (Print)</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        response.forEach(function(data, index) {
                            var saleDate = new Intl.DateTimeFormat('en-IN').format(new Date(data.original_sale_date)).split("/").join("-")
                            var sl = index + 1;
                            var chassis = (data.eight_chassis || '') + (data.one_chassis || '') + (data.three_chassis || '') + (data.five_chassis || '');
                            var engine = (data.six_engine || '') + (data.five_engine || '');
                            html +=
                                `<tr>                                
                                <td>${sl}</td>
                                <td>${data.model ? data.model :''}</td>
                                <td>${saleDate ? saleDate : ''}</td>
                                <td>${chassis}</td>
                                <td>${engine}</td>
                                <td>${data.customer_name ? data.customer_name.length > 15 ? data.customer_name.substring(0,15) + '.' : data.customer_name : ''}</td>
                                <td>${data.mobile ? data.mobile : ''}</td>
                                <td>
                                    <div class="d-flex justify-content-center padd text-decoration btn-group">
                                        <a href="/hform/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            Hform
                                        </a>
                                        <a href="#" class="btn-sm bg-dark">
                                            Stamp
                                        </a>
                                        <a href="/gate_pass/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            Gate Pass
                                        </a>
                                        <a href="/single_file_print/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            File Print
                                        </a>
                                        <a href="#" class="btn-sm bg-dark salesUpdate" id="${data.id}" data-bs-toggle="modal" data-idUpdate="${data.id}" data-bs-target="#salesUpdateModal">
                                            Edit
                                        </a>
                                        <a href="#" target="_blank" class="btn-sm bg-dark">
                                            Bank Slip
                                        </a>
                                        <a href="#" class="btn-sm bg-dark cusInfo" id="${data.id}" data-bs-toggle="modal" data-idUpdate="${data.id}" data-bs-target="#showModal">
                                            Info
                                        </a>                                        
                                    </div>
                                </td>
                            </tr>`;
                        });
                        html += `</tbody></table></div>`;
                    } else {
                        html = `
                    <div class="card-header bg-dark">
                    <h3 class="text-center rounded">
                        Search Result
                    </h3>
                </div>
                <div style="padding:0px 5px;">
                    <h3 class="text-center">No Data Found</h3>
                    </div>
                    `;
                    }
                    $("#show_search_result").html(html);
                    $("#search_result").DataTable({
                        bPaginate: false,
                        pageLength: 10,
                        responsive: true,
                        lengthChange: true,
                        searching: false,
                        "bInfo": false,
                    });
                }
            });
        });
        $(document).on('click', '.cusInfo', function(e) {
            e.preventDefault();
            var id = $(this).attr("id");
            $.ajax({
                url: "{{ route('customer.customer_info') }}",
                method: 'get',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function({
                    color_data,
                    core_data,
                    model_data,
                    purchage_data
                }) {
                    $('#vendor').val(purchage_data ? purchage_data.vendor : core_data.vendor_name);
                    $('#factory_challan_no').val(purchage_data ? purchage_data.factory_challan_no : core_data.challan_no);
                    $('#purchage_date').val(purchage_data ? new Intl.DateTimeFormat('en-IN').format(new Date(purchage_data.purchage_date)).split("/").join("-") : new Intl.DateTimeFormat('en-IN').format(new Date(core_data.purchage_date)).split("/").join("-"));
                    $('#model').val(model_data.model);
                    $('#ckd_process').val(core_data.ckd_process);
                    $('#approval_no').val(core_data.approval_no);
                    $('#invoice_no').val(core_data.invoice_no);
                    $('#sale_price').val(core_data.sale_price);
                    $('#uml_mushak_no').val(core_data.uml_mushak_no);
                    $('#whos_vat').val(core_data.whos_vat);
                    $('#sale_mushak_no').val(core_data.sale_mushak_no);
                    $('#gate_pass').val(core_data.gate_pass);
                    $('#chassis_no').val((core_data.eight_chassis || '') + (core_data.one_chassis || '') + (core_data.three_chassis || '') + (core_data.five_chassis));
                    $('#engine_no').val((core_data.six_engine || '') + (core_data.five_engine || ''));
                    $('#note').val(core_data.note);
                    $('#size_of_tyre').val(model_data.size_of_tyre);
                    $('#color').val(color_data ? color_data.color : core_data.color);
                    $('#original_sale_date').val(new Intl.DateTimeFormat('en-IN').format(new Date(core_data.original_sale_date)).split("/").join("-"));
                    $('#dealer').val(core_data.dealer);
                    $('#rg_number').val(core_data.rg_number);
                    $('#customer_name').val(core_data.customer_name);
                    $('#father_name').val(core_data.father_name);
                    $('#mother_name').val(core_data.mother_name);
                    $('#mobile').val(core_data.mobile);
                    $('#vat_process').val(core_data.vat_process);
                    $('#address').val((core_data.address_one || '') + (core_data.address_two || ''));
                    $('#stage').val(core_data.stage);
                    $('#file_status').val(core_data.file_status);
                }
            });
        });
        $(document).on('click', '.salesUpdate', function(e) {
            e.preventDefault();
            var id = $(this).attr("id");
            $.ajax({
                url: "{{ route('sale.sales_update_modal') }}",
                method: 'get',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function({
                    color_data,
                    core_data,
                    pd_data,
                    print_ref,
                    purchage_data,
                    vehicle_data
                }) {
                    $('#id2').val(core_data.id);
                    $('#model_code2').val(core_data.model_code);
                    $('#model_name2').val(vehicle_data.model);
                    $('#eight_chassis2').val(core_data.eight_chassis);
                    $('#one_chassis2').val(core_data.one_chassis);
                    $('#three_chassis2').val(core_data.three_chassis);
                    $('#five_chassis2').val(core_data.five_chassis);
                    $('#six_engine2').val(core_data.six_engine);
                    $('#five_engine2').val(core_data.five_engine);
                    $('#customer_name2').val(core_data.customer_name);
                    $('#relation2').val(core_data.relation);
                    $('#father_name2').val(core_data.father_name);
                    $('#mother_name2').val(core_data.mother_name);
                    $('#address_one2').val(core_data.address_one);
                    $('#address_two2').val(core_data.address_two);
                    $('#mobile2').val(core_data.mobile);
                    $('#email2').val(core_data.email);
                    $('#dob2').val(core_data.dob);
                    $('#vat_code2').val(core_data.vat_code);
                    $('#print_code2').val(core_data.print_code);
                    $('#report_code2').val(core_data.report_code);
                    $('#nid_no2').val(core_data.nid_no);
                    $('#ckd_process2').val(core_data.ckd_process);
                    $('#approval_no2').val(core_data.approval_no);
                    $('#invoice_no2').val(core_data.invoice_no);
                    $('#vendor2').val(purchage_data.vendor);
                    color_data.forEach(function(item) {
                        $(".color_code").append(`<option ${item.color_code === core_data.color_code ? 'selected' : ''} value="${item.color_code}">${item.color}</option>`);
                    });
                    $('#original_sale_date2').val(core_data.original_sale_date);
                    $('#vat_sale_date2').val(core_data.vat_sale_date);
                    $('#sale_date2').val(core_data.sale_date);
                    $('#print_date2').val(core_data.print_date);
                    $('#purchage_price2').val(core_data.purchage_price);
                    $('#stage2').val(core_data.stage);
                    $('#basic_price_vat2').val(core_data.basic_price_vat);
                    $('#tr_month_code2').val(core_data.tr_month_code);
                    $('#vat_month_sale2').val(core_data.vat_month_sale);
                    $('#vat_process2').val(core_data.vat_process);
                    $('#rg_number2').val(core_data.rg_number);
                    $('#mushak_date2').val(core_data.mushak_date);
                    $('#print_ref2').val(core_data.print_ref);
                    $('#evl_invoice_no2').val(core_data.evl_invoice_no);
                    $('#price_declare_id2').val((pd_data.id) + ', Date ' + (pd_data.submit_date));
                    $('#unit_price_vat2').val(core_data.unit_price_vat);
                    $('#sale_vat2').val(core_data.sale_vat);
                    $('#vat_year_sale2').val(core_data.vat_year_sale);
                    $('#sale_price2').val(core_data.sale_price);
                    $('#dealer2').val(core_data.dealer);
                    $('#purchage_date2').val(purchage_data.purchage_date);
                    $('#sale_mushak_no2').val(core_data.sale_mushak_no);
                    $('#uml_mushak_no2').val(core_data.uml_mushak_no);
                    $('#factory_challan_no2').val(purchage_data.factory_challan_no);
                    $('#whos_vat2').val(core_data.whos_vat);
                    $('#sale_profit2').val(core_data.sale_profit);
                    $('#note2').val(core_data.note);
                    $('#file_status2').val(core_data.file_status);
                    $('#updated_at2').val(core_data.updated_at);
                    $('#vat_mrp2').val(pd_data.vat_mrp);
                    $('#fake_sale_date2').val(core_data.fake_sale_date);
                }
            });
        });
    });
</script>
@endsection