<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'showroom'], function () {
    // MRP Table
    Route::controller(App\Http\Controllers\Showroom\MrpController::class)->group(function () {
        Route::get('/mrp_index',  'index')->name('mrp.index');
        Route::post('/get_single_mrp',  'get_single_mrp')->name('mrp.get_single_mrp');
        Route::get('/mrp_get',  'mrp_get')->name('mrp.get');
        Route::post('/mrp_add',  'mrp_add')->name('mrp.add');
        Route::post('/mrp_update',  'mrp_update')->name('mrp.update');
        Route::delete('/mrp_delete',  'mrp_delete')->name('mrp.delete');
    });

    // Vehicle Route
    Route::controller(App\Http\Controllers\Showroom\VehicleController::class)->group(function () {
        Route::get('/vehicle_index',  'index')->name('vehicle.index');
        Route::post('/get_single_vehicle',  'get_single_vehicle')->name('vehicle.get_single_vehicle');
        Route::get('/vehicle_get',  'vehicle_get')->name('vehicle.get');
        Route::post('/vehicle_add',  'vehicle_add')->name('vehicle.add');
        Route::post('/vehicle_update',  'vehicle_update')->name('vehicle.update');
        Route::delete('/vehicle_delete',  'vehicle_delete')->name('vehicle.delete');
    });

    // Supplier Route
    Route::controller(App\Http\Controllers\Showroom\SupplierController::class)->group(function () {
        Route::get('/supplier_index',  'index')->name('supplier.index');
        Route::post('/get_single_supplier',  'get_single_supplier')->name('supplier.get_single_supplier');
        Route::get('/supplier_get',  'supplier_get')->name('supplier.get');
        Route::post('/supplier_add',  'supplier_add')->name('supplier.add');
        Route::post('/supplier_update',  'supplier_update')->name('supplier.update');
        Route::delete('/supplier_delete',  'supplier_delete')->name('supplier.delete');
    });

    // Color Code
    Route::controller(App\Http\Controllers\Showroom\ColorCodeController::class)->group(function () {
        Route::get('/color_code_index',  'index')->name('color_code.index');
        Route::post('/get_single_color',  'get_single_color')->name('color_code.get_single_color');
        Route::get('/color_code_get',  'color_code_get')->name('color_code.get');
        Route::post('/color_code_add',  'color_code_add')->name('color_code.add');
        Route::post('/color_code_update',  'color_code_update')->name('color_code.update');
        Route::delete('/color_code_delete',  'color_code_delete')->name('color_code.delete');
    });

    // Price Declare
    Route::controller(App\Http\Controllers\Showroom\PriceDeclareController::class)->group(function () {
        Route::get('/pd_index',  'index')->name('pd.index');
        Route::post('/get_single_pd',  'get_single_pd')->name('pd.get_single_pd');
        Route::get('/pd_get',  'pd_get')->name('pd.get');
        Route::post('/pd_add',  'pd_add')->name('pd.add');
        Route::post('/pd_update',  'pd_update')->name('pd.update');
        Route::delete('/pd_delete',  'pd_delete')->name('pd.delete');
    });

    // Purchage
    Route::controller(App\Http\Controllers\Showroom\PurchageController::class)->group(function () {
        Route::get('/purchage_entry',  'index')->name('purchage.purchage_entry');
        Route::get('/purchage_by_date',  'purchage_by_date')->name('purchage.purchage_by_date');
        Route::post('/purchage_by_month',  'purchage_by_month')->name('purchage.purchage_by_month');
        Route::post('/purchage_create',  'create')->name('purchage.create');
        Route::post('/purchage_get_mrp',  'get_mrp')->name('purchage.get_mrp');
        Route::get('/purchage_list_index',  'purchage_list_index')->name('purchage.index');
        Route::get('/purchage_list',  'purchage_list')->name('purchage.list');
        Route::get('/purchage_details/{id}',  'purchage_details')->name('purchage.purchage_details_id');
        Route::post('/purchage_detail_update',  'purchage_detail_update')->name('purchage.purchage_detail_update');
        Route::post('/uml_mushak_bulk_update',  'uml_mushak_bulk_update')->name('purchage.uml_mushak_bulk_update');
        Route::post('/print_code_update',  'print_code_update')->name('purchage.print_code_update');
    });

    // PDF
    Route::controller(App\Http\Controllers\Showroom\PDFController::class)->group(function () {
        Route::get('/pdf_file_print',  'pdf_file_print')->name('pdf.file_print');
        Route::get('/hform/{id}',  'hform')->name('pdf.hform');
        Route::get('gate_pass/{id}',  'gate_pass')->name('pdf.gate_pass');
    });

    // Excel
    Route::get('excel_export', [App\Http\Controllers\UsersController::class, 'export'])->name('excel.export');
    Route::post('service_data', [App\Http\Controllers\Showroom\CoreController::class, 'service_data'])->name('excel.service_data');

    // Print & Excel Dashboard
    Route::controller(App\Http\Controllers\Showroom\PrintController::class)->group(function () {
        Route::get('print_dashboard',  'print_dashboard')->name('print.print_dashboard');
        Route::get('excel_dashboard',  'excel_dashboard')->name('excel.dashboard');
        Route::post('customer_data',  'customer_data')->name('excel.customer_data');
        Route::post('file_print',  'file_print')->name('print.file_print');
        Route::get('single_file_print/{id}',  'single_file_print')->name('print.single_file_print');
        Route::get('print_list',  'print_list')->name('print.print_list');
        Route::post('print_list_dashboard',  'print_list_dashboard')->name('print.print_list_dashboard');
        Route::get('/hform/{id}',  'hform')->name('print.hform');
        Route::get('/brta_assessment_form/{id}',  'brta_assessment_form')->name('print.brta_assessment_form');
        Route::get('/brta_stamp/{id}',  'brta_stamp')->name('print.brta_stamp');
    });

    // Sales
    Route::controller(App\Http\Controllers\Showroom\SalesController::class)->group(function () {
        Route::get('/sales_update/{id}',  'sales_update')->name('sale.sales_update');
        Route::get('/sales_update_modal',  'sales_update_modal')->name('sale.sales_update_modal');
        Route::post('/sales_update_store',  'sales_update_store')->name('sale.sales_update_store');
        Route::post('/sales_report',  'sales_report')->name('sale.sales_report');
    });

    // VAT
    Route::controller(App\Http\Controllers\Showroom\VATController::class)->group(function () {
        Route::get('/vat_dashboard',  'index')->name('vat.dashboard');
        Route::get('/vat_index',  'vat_index')->name('vat.index');
        Route::post('/vat_sale',  'vat_sale')->name('vat.vat_sale');
        Route::post('/vat_sale_by_model',  'vat_sale_by_model')->name('vat.vat_sale_by_model');
        Route::post('/assign_tr_code',  'assign_tr_code')->name('vat.assign_tr_code');
        Route::post('/update_tr_status',  'update_tr_status')->name('vat.update_tr_status');
        Route::post('/tr_changer_update',  'tr_changer_update')->name('vat.tr_changer_update');
        Route::post('/assign_tr_number',  'assign_tr_number')->name('assign_tr_number');
        Route::post('/assign_sale_mushak_no',  'assign_sale_mushak_no')->name('vat.assign_sale_mushak_no');
        Route::post('/assign_sale_mushak_no_store',  'assign_sale_mushak_no_store')->name('vat.assign_sale_mushak_no_store');
        Route::post('/uml_mushak_update',  'uml_mushak_update')->name('vat.uml_mushak_update');
        Route::post('/uml_mushak_update_store',  'uml_mushak_update_store')->name('vat.uml_mushak_update_store');
    });

    // CKD
    Route::get('/ckd_pending', [App\Http\Controllers\Showroom\CKDController::class, 'ckd_pending'])->name('ckd.ckd_pending');
    Route::post('/ckd_update', [App\Http\Controllers\Showroom\CKDController::class, 'ckd_update'])->name('ckd.update');

    // CKD
    Route::get('/tr_pending', [App\Http\Controllers\Showroom\TRController::class, 'tr_pending'])->name('tr.tr_pending');
    Route::get('/tr_status', [App\Http\Controllers\Showroom\TRController::class, 'tr_status'])->name('tr.tr_status');
    // Route::post('/ckd_update', [App\Http\Controllers\CKDController::class, 'ckd_update'])->name('ckd.update');

    // Utility
    Route::post('/assessment_year', [App\Http\Controllers\Showroom\UtilityController::class, 'assessment_year'])->name('utility.assessment_year');
    Route::get('/download', [App\Http\Controllers\Showroom\UtilityController::class, 'download'])->name('utility.download');

    // Quotation
    Route::controller(App\Http\Controllers\Showroom\QuotationController::class)->group(function () {
        Route::get('/quotation_index',  'index')->name('quotation.create');
        Route::get('/quotation_list',  'quotation_list')->name('quotation.list');
        Route::post('/quotation_store',  'store')->name('quotation.store');
        Route::get('/quotation_print_html/{id}',  'quotation_print_html')->name('quotation.print');
        Route::get('/quotation_edit/{id}',  'quotation_edit')->name('quotation.edit');
        Route::delete('/quotation_delete',  'quotation_delete')->name('quotation.delete');
        Route::post('/quotation_update',  'quotation_update')->name('quotation.update');
    });

    // Customer Info
    Route::get('/customer_info/', [App\Http\Controllers\Showroom\CustomerController::class, 'customer_info'])->name('customer.customer_info');



    Route::get('/filemanager', [App\Http\Controllers\FileManagerController::class, 'index'])->name('file.manager');


    // Delivery Challan
    Route::controller(App\Http\Controllers\Showroom\DeliveryChallanController::class)->group(function () {
        Route::get('/delivery_challan',  'index')->name('utility.delivery_challan');
        Route::get('/get_stock_mc',  'get_stock_mc')->name('delivery_challan.get_stock_mc');
        Route::get('/get_stock_mc_details',  'get_stock_mc_details')->name('delivery_challan.get_stock_mc_details');
        Route::get('/create_delivery_challan_no',  'create_delivery_challan_no')->name('delivery_challan.create_delivery_challan_no');
        Route::post('/store_created_challan',  'store_created_challan')->name('delivery_challan.store_created_challan');
    });

    //     Route::get('backup-run', function () {
    //         Artisan::call('backup:run --only-db');
    //         return back();
    //     });
});
