<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function AllCustomer(){
        $customer = Customer::latest()->get();
        return view('backend.customer.all_customer',compact('customer'));
    }//End Method
}
