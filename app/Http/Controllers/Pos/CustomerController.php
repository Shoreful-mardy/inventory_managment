<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Carbon\Carbon;
use Image;

class CustomerController extends Controller
{
    public function AllCustomer(){
        $customer = Customer::latest()->get();
        return view('backend.customer.all_customer',compact('customer'));
    }//End Method

    public function AddCustomer(){
        return view('backend.customer.add_customer');
    }//End Method


    public function StoreCustomer(Request $request){

        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
        $save_url = 'upload/customer/'.$name_gen;

        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'customer_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Customer Added Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.customer')->with($notification);
    }//End Method

    public function EditCustomer($id){
       $customer = Customer::findOrFail($id);
       return view('backend.customer.edit_customer',compact('customer')); 
    }//End Method


    public function UpdateCustomer(Request $request){

        $customer_id = $request->id;
        

        if ($request->file('customer_image')) {
            $old_img = $request->oldimg;
            if (file_exists(public_path($old_img))) {
                unlink($old_img);
            }
            $image = $request->file('customer_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
            $save_url = 'upload/customer/'.$name_gen;

            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'customer_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Customer Updated Successfully With Image', 
                'alert-type' => 'success'
            );
            return redirect()->route('all.customer')->with($notification);
        }else{
            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Customer Updated Successfully Without Image', 
                'alert-type' => 'success'
            );
            return redirect()->route('all.customer')->with($notification);
        }
    }//End Method













}
