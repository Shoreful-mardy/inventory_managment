<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Auth;
use Carbon\Carbon;

class SupplierController extends Controller
{
    public function AllSupplier(){
        $supplier = Supplier::latest()->get();
        return view('backend.supplier.allsupplier',compact('supplier'));
    }//End Method

    public function AddSupplier(){
        return view('backend.supplier.add_supplier');
    }//End Method


    public function StoreSupplier(Request $request){

        Supplier::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Supplier Added Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.supplier')->with($notification);

    }//End Method

















}
