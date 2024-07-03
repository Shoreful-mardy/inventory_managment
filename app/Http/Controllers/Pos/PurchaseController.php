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
























}
