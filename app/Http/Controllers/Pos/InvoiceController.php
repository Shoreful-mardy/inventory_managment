<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Parchase;
use App\Models\Invoice;
use App\Models\Invoicedetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Customer;
use Auth;
use Carbon\Carbon;

class InvoiceController extends Controller
{

    public function AllInvoice(){
        $allData = Invoice::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.invoice.invoice_all',compact('allData'));
    }//End Method


    public function AddInvoice(){

        

        $unit = Unit::all();
        $category = Category::all();
        $customer = Customer::all();
        $invoice_data = Invoice::orderBy('id','desc')->first();
        if ($invoice_data == null) {
            $firstReg = '0';
            $invoice_no = $firstReg+1;
        }else{
            $invoice_data = Invoice::orderBy('id','desc')->first()->invoice_no;
            $invoice_no = $invoice_data+1;
        }
        $date = date('Y-m-d');
        return view('backend.invoice.invoice_add',compact('invoice_no','category','date','customer'));
    }//End Method





















}