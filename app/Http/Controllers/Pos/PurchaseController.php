<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Parchase;
use Auth;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    
    public function AllPurchase(){

        $allData = Parchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.purchase.all_purchase',compact('allData'));

    }//End Method



    public function AddPurchase(){


        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();


        return view('backend.purchase.add_purchase',compact('supplier','unit','category'));

    }//End Method


    public function PurchaseStore(Request $request){

        if ($request->category_id == null) {
            $notification = array(
            'message' => 'Sorry You Do Not Select Any Item  ', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{

            $count_category = count($request->category_id);
            for($i=0; $i<$count_category; $i++){
                $purchase = new Parchase();
                $purchase->date = date('Y-m-d',strtotime($request->date[$i]));
                $purchase->parchase_no = $request->parchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->created_by = Auth::user()->id;
                $purchase->status = '0';
                $purchase->save();

            }//End For
            $notification = array(
            'message' => 'Data Save Successfully ', 
            'alert-type' => 'success'
            );
            return redirect()->route('all.purchase')->with($notification);
        }//End else

    }//End Method


    public function DeletePurchase($id){

        Parchase::findOrFail($id)->delete();
        $notification = array(
        'message' => 'Purchase Item Deleted Successfully ', 
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//End Method
























}
