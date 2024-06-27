<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Auth;
use Carbon\Carbon;

class UnitController extends Controller
{
    public function AllUnits(){
        $unit = Unit::latest()->get();
        return view('backend.unit.all_unit',compact('unit'));
    }//End Method

    public function AddUnits(){
        return view('backend.unit.add_unit');
    }//End Method

    public function StoreUnits(Request $request){

        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Unit Added Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('all.units')->with($notification);

    }//End Method
    public function EditUnits($id){

         $unit = Unit::findOrFail($id);
         return view('backend.unit.edit_unit',compact('unit'));

    }//End Method

    public function UpdateUnits(Request $request){

        Unit::findOrFail($request->id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Units Updated Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('all.units')->with($notification);
    }//End Method
















}
