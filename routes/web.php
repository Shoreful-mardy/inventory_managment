<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\DefaultController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});






Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});


 // Admin All Route 
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
     
});

 // Manage Suppliers All Route 
Route::controller(SupplierController::class)->group(function () {
    Route::get('/all/supplier', 'AllSupplier')->name('all.supplier');
    Route::get('/add/supplier', 'AddSupplier')->name('add.supplier');
    Route::post('/store/supplier', 'StoreSupplier')->name('store.supplier');
    Route::get('/edit/supplier/{id}', 'EditSupplier')->name('edit.supplier');
    Route::post('/update/supplier', 'UpdateSupplier')->name('update.supplier');
    Route::get('/delete/supplier/{id}', 'DeleteSupplier')->name('delete.supplier');
     
});

 // Manage Customer All Route 
Route::controller(CustomerController::class)->group(function () {
    Route::get('/all/customer', 'AllCustomer')->name('all.customer');
    Route::get('/add/customer', 'AddCustomer')->name('add.customer');
    Route::post('/store/customer', 'StoreCustomer')->name('store.customer');
    Route::get('/edit/customer/{id}', 'EditCustomer')->name('edit.customer');
    Route::post('/update/customer', 'UpdateCustomer')->name('update.customer');
    Route::get('/delete/customer/{id}', 'DeleteCustomer')->name('delete.customer');
     
});

 // Manage Units All Route 
Route::controller(UnitController::class)->group(function () {
    Route::get('/all/units', 'AllUnits')->name('all.units');
    Route::get('/add/units', 'AddUnits')->name('add.units');
    Route::post('/store/units', 'StoreUnits')->name('store.units');
    Route::get('/edit/units/{id}', 'EditUnits')->name('edit.units');
    Route::post('/update/units', 'UpdateUnits')->name('update.units');
    Route::get('/delete/units/{id}', 'DeleteUnits')->name('delete.units');
     
});

 // Manage Category All Route 
Route::controller(CategoryController::class)->group(function () {
    Route::get('/all/category', 'AllCategory')->name('all.category');
    Route::get('/add/category', 'AddCategory')->name('add.category');
    Route::post('/store/category', 'StoreCategory')->name('store.category');
    Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
    Route::post('/update/category', 'UpdateCategory')->name('update.category');
    Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
     
});

 // Manage Product All Route 
Route::controller(ProductController::class)->group(function () {
    Route::get('/all/product', 'AllProduct')->name('all.product');
    Route::get('/add/product', 'AddProduct')->name('add.product');
    Route::post('/store/product', 'StoreProduct')->name('store.product');
    Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product');
    Route::post('/update/product', 'UpdateProduct')->name('update.product');
    Route::get('/delete/product/{id}', 'DeleteProduct')->name('delete.product');
     
});

 // Manage Purchase All Route 
Route::controller(PurchaseController::class)->group(function () {
    Route::get('/all/purchase', 'AllPurchase')->name('all.purchase');
    Route::get('/add/purchase', 'AddPurchase')->name('add.purchase');
    Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store');
    Route::get('/delete/purchase/{id}', 'DeletePurchase')->name('delete.purchase');
    Route::get('/pending/purchase', 'PendingPurchase')->name('pending.purchase');
    Route::get('/approve/purchase/{id}', 'ApprovePurchase')->name('approve.purchase');


});

// Default All Route 
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-category', 'GetCategory')->name('get-category');
    Route::get('/get-product', 'GetProduct')->name('get-product');
    Route::get('/check-product-stock', 'GetStock')->name('check-product-stock');

});

 // Manage Invoice All Route invoice.approve
Route::controller(InvoiceController::class)->group(function () {
    Route::get('/all/invoice', 'AllInvoice')->name('all.invoice');
    Route::get('/add/invoice', 'AddInvoice')->name('add.invoice');
    Route::post('/invoice/store', 'StoreInvoice')->name('invoice.store');
    Route::get('/pending/invoice', 'PendingInvoice')->name('pending.invoice');
    Route::get('/delete/invoice/{id}', 'DeleteInvoice')->name('delete.invoice');
    Route::get('/approve/invoice/{id}', 'ApproveInvoice')->name('invoice.approve');
    Route::post('/approval/store/{id}', 'ApproveIStore')->name('approval.store');
    Route::get('/print/invoice/', 'PrintInvoice')->name('print.invoice.list');
    Route::get('/invoice/print/{id}', 'InvoicePrint')->name('invoice.print');
    Route::get('/daily/invoice/report', 'DailyInvoiceReport')->name('daily.invoice.report');
    Route::get('/daily/invoice/pdf', 'DailyInvoicePdf')->name('daily.invoice.pdf');



});



 





Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
