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
                                            <input required readonly type="text" name="id" class="form-control form-control-sm" id="id">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="model_code" class="col-sm-3 col-form-label form-control-sm">Model Code</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required readonly type="text" name="model_code" class="form-control form-control-sm" id="model_code">
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
                                            <input required type="text" name="eight_chassis" class="form-control form-control-sm" id="eight_chassis">
                                        </div>
                                        <div class="col-sm-1" style="padding:0px;">
                                            <input required type="text" name="one_chassis" class="form-control form-control-sm" id="one_chassis">
                                        </div>
                                        <div class="col-sm-2" style="padding:0px;">
                                            <input required type="text" name="three_chassis" class="form-control form-control-sm" id="three_chassis">
                                        </div>
                                        <div class="col-sm-3" style="padding:0px;">
                                            <input required type="text" name="five_chassis" class="form-control form-control-sm" id="five_chassis">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label form-control-sm">Engine No</label>
                                        <div class="col-sm-5" style="padding:0px;">
                                            <input required type="text" name="six_engine" class="form-control form-control-sm" id="six_engine">
                                        </div>
                                        <div class="col-sm-4" style="padding:0px;">
                                            <input required type="text" name="five_engine" class="form-control form-control-sm" id="five_engine">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="customer_name" class="col-sm-3 col-form-label form-control-sm">Customer Name</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="customer_name" class="form-control form-control-sm" id="customer_name">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="relation" class="col-sm-3 col-form-label form-control-sm">Relation</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="relation" class="form-control form-control-sm" id="relation">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="father_name" class="col-sm-3 col-form-label form-control-sm">Father Name</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="father_name" class="form-control form-control-sm" id="father_name">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="mother_name" class="col-sm-3 col-form-label form-control-sm">Mother Name</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="mother_name" class="form-control form-control-sm" id="mother_name">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="address_one" class="col-sm-3 col-form-label form-control-sm">Address One</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="address_one" class="form-control form-control-sm" id="address_one">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="address_two" class="col-sm-3 col-form-label form-control-sm">Address Two</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="address_two" class="form-control form-control-sm" id="address_two">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="mobile" class="col-sm-3 col-form-label form-control-sm">Mobile</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="mobile" class="form-control form-control-sm" id="mobile">
                                        </div>
                                    </div>

                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="print_ref" class="col-sm-3 col-form-label form-control-sm">Print Ref</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input required type="text" name="print_ref" class="form-control form-control-sm" id="print_ref">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="email" class="col-sm-6 col-form-label form-control-sm">Email</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="email" name="email" class="form-control form-control-sm" id="email">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="dob" class="col-sm-6 col-form-label form-control-sm">DOB</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="date" name="dob" class="form-control form-control-sm" id="dob">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="vat_code" class="col-sm-6 col-form-label form-control-sm">VAT Code</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="vat_code" class="form-control form-control-sm" id="vat_code">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="print_code" class="col-sm-6 col-form-label form-control-sm">Print Code</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="print_code" class="form-control form-control-sm" id="print_code">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="report_code" class="col-sm-6 col-form-label form-control-sm">Report Code</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="report_code" class="form-control form-control-sm" id="report_code">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="year_of_manufacture" class="col-sm-6 col-form-label form-control-sm">Man. Year</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="year_of_manufacture" class="form-control form-control-sm" id="year_of_manufacture">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="tr_number" class="col-sm-5 col-form-label form-control-sm">TR Number</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="tr_number" class="form-control form-control-sm" id="tr_number">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="tr_dep_date" class="col-sm-5 col-form-label form-control-sm">TR Date</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="date" name="tr_dep_date" class="form-control form-control-sm" id="tr_dep_date">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="nid_no" class="col-sm-5 col-form-label form-control-sm">NID No</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="nid_no" class="form-control form-control-sm" id="nid_no">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="ckd_process" class="col-sm-5 col-form-label form-control-sm">CKD Process</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="ckd_process" class="form-control form-control-sm" id="ckd_process">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="approval_no" class="col-sm-5 col-form-label form-control-sm">Ref No</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="approval_no" class="form-control form-control-sm" id="approval_no">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="invoice_no" class="col-sm-5 col-form-label form-control-sm">Invoice No</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="invoice_no" class="form-control form-control-sm" id="invoice_no">
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
                                            <input readonly type="text" name="vendor" class="form-control form-control-sm" id="vendor2">
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
                                                    <input required type="date" name="original_sale_date" class="form-control form-control-sm" id="original_sale_date">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="vat_sale_date" class="col-sm-6 col-form-label form-control-sm">VAT Sale Date</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input required type="date" name="vat_sale_date" class="form-control form-control-sm" id="vat_sale_date">
                                                </div>
                                            </div>

                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="sale_date" class="col-sm-6 col-form-label form-control-sm">Sale Date</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input required type="date" name="sale_date" class="form-control form-control-sm" id="sale_date">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="print_date" class="col-sm-6 col-form-label form-control-sm">Print Date</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input required type="date" name="print_date" class="form-control form-control-sm" id="print_date">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="purchage_price" class="col-sm-6 col-form-label form-control-sm">Buy Price</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input required type="text" name="purchage_price" class="form-control form-control-sm" id="purchage_price">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="stage" class="col-sm-6 col-form-label form-control-sm">Stage</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="stage" class="form-control form-control-sm" id="stage">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="vat_year_sale" class="col-sm-6 col-form-label form-control-sm">VAT Year Sale</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="vat_year_sale" class="form-control form-control-sm" id="vat_year_sale">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="tr_month_code" class="col-sm-6 col-form-label form-control-sm">TR Month Code</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="tr_month_code" class="form-control form-control-sm" id="tr_month_code">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="vat_month_sale" class="col-sm-6 col-form-label form-control-sm">VAT Month Sale</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="vat_month_sale" class="form-control form-control-sm" id="vat_month_sale">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="vat_process" class="col-sm-6 col-form-label form-control-sm">VAT Process</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="vat_process" class="form-control form-control-sm" id="vat_process">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="rg_number" class="col-sm-6 col-form-label form-control-sm">RG Number</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="rg_number" class="form-control form-control-sm" id="rg_number">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="uml_mushak_no" class="col-sm-6 col-form-label form-control-sm">UML Mus No</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="text" name="uml_mushak_no" class="form-control form-control-sm" id="uml_mushak_no">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="uml_mushak_date" class="col-sm-6 col-form-label form-control-sm">UML Mus Date</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input type="date" name="mushak_date" class="form-control form-control-sm" id="mushak_date">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="price_declare_id" class="col-sm-6 col-form-label form-control-sm">Price Dec Id</label>
                                                <div class="col-sm-6" style="padding:0px;">
                                                    <input readonly type="text" name="price_declare_id" class="form-control form-control-sm" id="price_declare_id2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="unit_price_vat" class="col-sm-5 col-form-label form-control-sm">VAT MRP</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input required type="text" name="unit_price_vat" class="form-control form-control-sm" id="unit_price_vat">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="sale_vat" class="col-sm-5 col-form-label form-control-sm">Sale VAT</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input required type="text" name="sale_vat" class="form-control form-control-sm" id="sale_vat">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="basic_price_vat" class="col-sm-5 col-form-label form-control-sm">VAT Basic</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input required type="text" name="basic_price_vat" class="form-control form-control-sm" id="basic_price_vat">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="sale_price" class="col-sm-5 col-form-label form-control-sm">Sale Price</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="sale_price" class="form-control form-control-sm" id="sale_price">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="dealer" class="col-sm-5 col-form-label form-control-sm">Dealer</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="dealer" class="form-control form-control-sm" id="dealer">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="purchage_date" class="col-sm-5 col-form-label form-control-sm">Purchage Date</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input readonly type="date" name="purchage_date" class="form-control form-control-sm" id="purchage_date2">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="sale_mushak_no" class="col-sm-5 col-form-label form-control-sm">Sale Mus No</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="sale_mushak_no" class="form-control form-control-sm" id="sale_mushak_no">
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
                                                    <input type="text" name="whos_vat" class="form-control form-control-sm" id="whos_vat">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="sale_profit" class="col-sm-5 col-form-label form-control-sm">Sale Profit</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="sale_profit" class="form-control form-control-sm" id="sale_profit">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="note" class="col-sm-5 col-form-label form-control-sm">Note</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="note" class="form-control form-control-sm" id="note">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="evl_invoice_no" class="col-sm-5 col-form-label form-control-sm">EVL Invoice</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="evl_invoice_no" class="form-control form-control-sm" id="evl_invoice_no">
                                                </div>
                                            </div>

                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="updated_at" class="col-sm-5 col-form-label form-control-sm">Updated At</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input type="text" name="updated_at" class="form-control form-control-sm" id="updated_at">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:0px;">
                                                <label for="vat_mrp" class="col-sm-5 col-form-label form-control-sm">PD Price</label>
                                                <div class="col-sm-7" style="padding:0px;">
                                                    <input readonly type="text" name="vat_mrp" class="form-control form-control-sm" id="vat_mrp">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="file_status" class="col-sm-3 col-form-label form-control-sm">File Status</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input type="text" name="file_status" class="form-control form-control-sm" id="file_status">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="fake_sale_date" class="col-sm-3 col-form-label form-control-sm">Fake Sale Date</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input type="date" name="fake_sale_date" class="form-control form-control-sm" id="fake_sale_date">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <label for="in_stock" class="col-sm-3 col-form-label form-control-sm">In Stock</label>
                                        <div class="col-sm-9" style="padding:0px;">
                                            <input type="text" name="in_stock" class="form-control form-control-sm" id="in_stock">
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