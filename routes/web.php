<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
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



 





Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
