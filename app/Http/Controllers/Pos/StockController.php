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

class StockController extends Controller
{


    public function StockReport(){

        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('backend.stock.stock_report',compact('allData'));


    }//End Method


    public function StockReportPdf(){

        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('backend.pdf.stock_report_pdf',compact('allData'));

    }//End Method

    public function StockReportSupplierWise(){
        $suppliers = Supplier::all();
        $category = Category::all();
        return view('backend.stock.stock_report_supplier_wise',compact('suppliers','category'));   

    }//End Method

    public function SupplierWisePdf(Request $request){

        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
        return view('backend.pdf.supplier_wise_pdf_report',compact('allData'));


    }//End Method

    public function ProductWisePdf(Request $request){
        $product = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
        return view('backend.pdf.product_wise_pdf_report',compact('product'));
    }//End Method




















}
