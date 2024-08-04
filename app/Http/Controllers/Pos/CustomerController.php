<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\PaymentDetail;
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

    public function DeleteCustomer($id){

        $customer = Customer::findOrFail($id);

        $img = $customer->customer_image;
        unlink($img);

        $customer->delete();
        $notification = array(
            'message' => 'Customer Deleted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('all.customer')->with($notification);


    }//End Method


    public function CreditCustomer(){

        $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.customer.credit_customer',compact('allData'));

    }//End Method

    public function CreditCustomerPrintPdf(){
        $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pdf.credit_customer_pdf',compact('allData'));
    }//End Method

    public function EditCustomerInvoice($invoice_id){

        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.customer.edit_customer_invoice',compact('payment'));

    }//End Method


    public function UpdateCustomerInvoice(Request $request,$invoice_id){

        if ($request->new_paid_amount < $request->paid_amount) {
            $notification = array(
                'message' => 'Sorry,Your Paid Maximum Amount', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
            $payment = Payment::where('invoice_id',$invoice_id)->first();
            $payment_details = new PaymentDetail();

            $payment->paid_status = $request->paid_status;

            if ($request->paid_status == 'full_paid') {
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
                $payment->due_amount = '0';
                $payment_details->current_paid_amount = $request->new_paid_amount;
            }elseif($request->paid_status == 'partial_paid'){
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
                $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;
            }
            $payment->save();
            $payment_details->invoice_id = $invoice_id;
            $payment_details->date = date('Y-m-d',strtotime($request->date));
            $payment_details->updated_by = Auth::user()->id;
            $payment_details->save();

            $notification = array(
                'message' => 'Invoice Updated Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('credit.customer')->with($notification);

        }

    }//End Method

    public function CustomerInvoiceDetailsPdf($invoice_id){

        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.pdf.customer_invoice_details_pdf',compact('payment'));

    }//End Method



    public function PaidCustomer(){

        $allData = Payment::where('paid_status','!=','full_due')->get();
        return view('backend.customer.paid_customer',compact('allData'));

    }//End Method


    public function PaidCustomerPrintPdf(){
       $allData = Payment::where('paid_status','!=','full_due')->get();
        return view('backend.pdf.paid_customer_pdf',compact('allData')); 
    }//End Method













}
