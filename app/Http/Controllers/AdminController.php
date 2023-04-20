<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=category::all();
        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request)
    {
        $data=new category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully'); 
    }
    public function delete_category($id)
    {
        $data = category::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('message', 'Category Deleted Successfully');
        } else {
            return redirect()->back()->with('message', 'Category Not Found');
        }
    }
    
    public function view_product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }
    public function add_product(Request $request)
    {
        // return view('admin.product');
    }
}









