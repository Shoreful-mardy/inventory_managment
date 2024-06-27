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
















}
