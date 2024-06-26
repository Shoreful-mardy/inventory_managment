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

    public function EditSupplier($id){

         $supplier = Supplier::findOrFail($id);
         return view('backend.supplier.edit_supplier',compact('supplier'));

    }//End Method

    public function UpdateSupplier(Request $request){

        Supplier::findOrFail($request->id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Supplier Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.supplier')->with($notification);


    }//End Method

    public function DeleteSupplier($id){

        Supplier::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supplier Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.supplier')->with($notification);

    }//End Method

















}
