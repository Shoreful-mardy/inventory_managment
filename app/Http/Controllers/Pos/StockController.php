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




















}
