<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
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
        $product=new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discounted_price=$request->dis_price;
        $product->category=$request->category;
        $image=$request->image;
        // $imagename=time().'.'.$image->getClientOriginalExtension;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image=$imagename;
        $product->save();
        return redirect()->back()->with('message', 'Product added successfully');
    }
    public function show_product()
    {
        $product=product::all();
        return view('admin.show_product',compact('product'));
    }
    public function delete_product($id)
    {
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');
    }

    public function update_product($id)
    {
        $product=product::find($id);
        $category=category::all();
        return view('admin.update_product', compact('product', 'category'));

        // return redirect()->back();
    }
    public function update_product_confirm(Request $request,$id)
    {
        $product=product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discounted_price=$request->dis_price;
        $product->quantity=$request->quantity;
        $image=$request->image;
        $imagename=time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image=$imagename;
        $product->save();
        return redirect()->back();
    }


}









