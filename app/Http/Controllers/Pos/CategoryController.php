<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function AllCategory(){
        $category = Category::latest()->get();
        return view('backend.category.all_category',compact('category'));
    }//End Method

    public function AddCategory(){
        return view('backend.category.add_category');
    }//End Method

    public function StoreCategory(Request $request){

        Category::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Category Added Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);

    }//End Method

    public function EditCategory($id){

         $category = Category::findOrFail($id);
         return view('backend.category.edit_category',compact('category'));

    }//End Method

    public function UpdateCategory(Request $request){

        Category::findOrFail($request->id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Category Updated Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }//End Method

    public function DeleteCategory($id){

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);

    }//End Method





















}
