<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;
use Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function AllProduct(){
        $product = Product::latest()->get();
        return view('backend.product.all_product',compact('product'));
    }//End Method


    public function AddProduct(){
        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        return view('backend.product.add_product',compact('supplier','category','unit'));
    }//End Method

    public function StoreProduct(Request $request){

        Product::insert([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);

    }//End Method














}
