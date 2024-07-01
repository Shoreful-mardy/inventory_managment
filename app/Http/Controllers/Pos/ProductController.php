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

    public function EditProduct($id){
        $product = Product::findOrFail($id);
        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        return view('backend.product.edit_product',compact('product','supplier','category','unit'));
    }//End Method


    public function UpdateProduct(Request $request){
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'quantity' => '0',
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);

    }//End Method

    public function DeleteProduct($id){

        Product::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Product Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);

    }//End Method














}
