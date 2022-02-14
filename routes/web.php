<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'login']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/customerSearch', [App\Http\Controllers\HomeController::class, 'customerSearch']);
    Route::get('core/{id}', [App\Http\Controllers\CoreController::class, 'show']);
    Route::get('customerInfoFullChassis/{id}', [App\Http\Controllers\CoreController::class, 'customerInfoFullChassis']);
    Route::resource('products', ProductController::class);
    Route::post('/chassisSearch', [App\Http\Controllers\CoreController::class, 'chassisSearch']);
    Route::post('/searchChassisList', [App\Http\Controllers\CoreController::class, 'searchChassisList']);
    Route::post('/engineSearch', [App\Http\Controllers\CoreController::class, 'engineSearch']);
    Route::post('/mobileSearch', [App\Http\Controllers\CoreController::class, 'mobileSearch']);

    // MRP Table
    Route::controller(App\Http\Controllers\MrpController::class)->group(function () {
        Route::get('/mrp_index',  'index')->name('mrp.index');
        Route::get('/mrp_get',  'mrp_get')->name('mrp.get');
        Route::post('/mrp_add',  'mrp_add')->name('mrp.add');
        Route::post('/mrp_update',  'mrp_update')->name('mrp.update');
        Route::delete('/mrp_delete',  'mrp_delete')->name('mrp.delete');
    });

    // Vehicle Route
    Route::controller(App\Http\Controllers\VehicleController::class)->group(function () {
        Route::get('/vehicle_index',  'index')->name('vehicle.index');
        Route::get('/vehicle_get',  'vehicle_get')->name('vehicle.get');
        Route::post('/vehicle_add',  'vehicle_add')->name('vehicle.add');
        Route::post('/vehicle_update',  'vehicle_update')->name('vehicle.update');
        Route::delete('/vehicle_delete',  'vehicle_delete')->name('vehicle.delete');
    });

    // Supplier Route
    Route::controller(App\Http\Controllers\SupplierController::class)->group(function () {
        Route::get('/supplier_index',  'index')->name('supplier.index');
        Route::get('/supplier_get',  'supplier_get')->name('supplier.get');
        Route::post('/supplier_add',  'supplier_add')->name('supplier.add');
        Route::post('/supplier_update',  'supplier_update')->name('supplier.update');
        Route::delete('/supplier_delete',  'supplier_delete')->name('supplier.delete');
    });

    // Color Code
    Route::controller(App\Http\Controllers\ColorCodeController::class)->group(function () {
        Route::get('/color_code_index',  'index')->name('color_code.index');
        Route::get('/color_code_get',  'color_code_get')->name('color_code.get');
        Route::post('/color_code_add',  'color_code_add')->name('color_code.add');
        Route::post('/color_code_update',  'color_code_update')->name('color_code.update');
        Route::delete('/color_code_delete',  'color_code_delete')->name('color_code.delete');
    });

    // Purchage
    Route::controller(App\Http\Controllers\PurchageController::class)->group(function () {
        Route::get('/purchage_entry',  'index')->name('purchage.purchage_entry');
        Route::get('/purchage_by_date',  'purchage_by_date')->name('purchage.purchage_by_date');
        Route::post('/purchage_by_month',  'purchage_by_month')->name('purchage.purchage_by_month');
        Route::post('/purchage_create',  'create')->name('purchage.create');
        Route::post('/purchage_get_mrp',  'get_mrp')->name('purchage.get_mrp');
        Route::get('/purchage_list_index',  'purchage_list_index')->name('purchage_list.index');
        Route::get('/purchage_list',  'purchage_list')->name('purchage.list');
        Route::get('/purchage_details/{id}',  'purchage_details')->name('purchage.purchage_details_id');
        Route::post('/purchage_detail_update',  'purchage_detail_update')->name('purchage.purchage_detail_update');
        Route::post('/print_code_update',  'print_code_update')->name('purchage.print_code_update');
    });


    // PDF
    Route::get('/pdf_file_print', [App\Http\Controllers\PDFController::class, 'pdf_file_print'])->name('pdf.file_print');
    Route::get('/hform/{id}', [App\Http\Controllers\PDFController::class, 'hform'])->name('pdf.hform');
    // Route::get('/vat_sale', [App\Http\Controllers\PDFController::class, 'vat_sale'])->name('pdf.vat_sale');
    Route::get('/gate_pass/{id}', [App\Http\Controllers\PDFController::class, 'gate_pass'])->name('pdf.gate_pass');

    // Excel
    Route::get('excel_export', [App\Http\Controllers\UsersController::class, 'export'])->name('excel.export');
    Route::post('service_data', [App\Http\Controllers\CoreController::class, 'service_data'])->name('excel.service_data');
    // Route::get('excel_dashboard', [App\Http\Controllers\CoreController::class, 'excel_dashboard'])->name('excel.dashboard');

    // Print & Excel Dashboard
    Route::controller(App\Http\Controllers\PrintController::class)->group(function () {
        Route::get('print_dashboard',  'print_dashboard')->name('print.print_dashboard');
        Route::get('excel_dashboard',  'excel_dashboard')->name('excel.dashboard');
        Route::post('customer_data',  'customer_data')->name('excel.customer_data');
        Route::post('file_print',  'file_print')->name('print.file_print');
        Route::get('single_file_print/{id}',  'single_file_print')->name('print.single_file_print');
        Route::get('print_list',  'print_list')->name('print.print_list');
        Route::get('/hform/{id}',  'hform')->name('print.hform');
    });


    // Sales
    Route::get('/sales_update/{id}', [App\Http\Controllers\SalesController::class, 'sales_update'])->name('sale.sales_update');
    Route::post('/sales_update_store', [App\Http\Controllers\SalesController::class, 'sales_update_store'])->name('sale.sales_update_store');
    Route::post('/sales_report', [App\Http\Controllers\SalesController::class, 'sales_report'])->name('sale.sales_report');

    // VAT
    Route::get('/vat_dashboard', [App\Http\Controllers\VATController::class, 'index'])->name('vat.dashboard');
    Route::get('/vat_index', [App\Http\Controllers\VATController::class, 'vat_index'])->name('vat.index');
    // Route::get('vat_sale_bp', [App\Http\Controllers\PDFController::class, 'vat_sale_bp']);
    Route::post('/vat_sale', [App\Http\Controllers\VATController::class, 'vat_sale'])->name('vat.vat_sale');
    Route::post('/assign_tr_code', [App\Http\Controllers\VATController::class, 'assign_tr_code'])->name('vat.assign_tr_code');
    Route::post('/update_tr_status', [App\Http\Controllers\VATController::class, 'update_tr_status'])->name('vat.update_tr_status');
    Route::post('/tr_changer_update', [App\Http\Controllers\VATController::class, 'tr_changer_update'])->name('vat.tr_changer_update');

    // CKD
    Route::get('/ckd_pending', [App\Http\Controllers\CKDController::class, 'ckd_pending'])->name('ckd.ckd_pending');
    Route::post('/ckd_update', [App\Http\Controllers\CKDController::class, 'ckd_update'])->name('ckd.update');

    // CKD
    Route::get('/tr_pending', [App\Http\Controllers\TRController::class, 'tr_pending'])->name('tr.tr_pending');
    // Route::post('/ckd_update', [App\Http\Controllers\CKDController::class, 'ckd_update'])->name('ckd.update');

    // Utility
    Route::post('/assessment_year', [App\Http\Controllers\UtilityController::class, 'assessment_year'])->name('utility.assessment_year');

    // Quotation
    Route::get('/quotation_index', [App\Http\Controllers\QuotationController::class, 'index'])->name('quotation.index');
    Route::post('/tr_update', [App\Http\Controllers\VATController::class, 'tr_update'])->name('tr_update');
});
Auth::routes(['register' => false]);
// Auth::routes();
