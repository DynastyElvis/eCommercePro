<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;


class HomeController extends Controller
{
    public function index()
    {
        $product=Product::all();
        // $product=Product::paginate('3');//3 products only
        return view('home.userpage', compact('product') );
    }

    public function redirect()
    {
        $usertype=Auth::user()->usertype;
        if($usertype=='1')
        {
            return view('admin.home');
        }
        else
        {
            $product=Product::all();
            // $product=Product::paginate('3');//3 products only
            return view('home.userpage', compact('product') );
        }     
    }
    public function product_details($id)
    {
        $product=product::find($id);
        return view('home.product_details', compact('product'));
    }
    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            // return redirect()->back();
            $user=Auth::user();
            // dd($user);// check raw data
            $product=product::find($id);
            $cart=new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id; 
            $cart->Product_title=$product->title;

            if($product->discounted_price!=null)
            {
                $cart->price=$product->discounted_price * $request->quantity;
            }
            else
            {
                $cart->price=$product->price * $request->quantity;
            }
            
            $cart->image=$product->image;
            $cart->product_id=$product->id;
            $cart->quantity=$request->quantity;

            $cart->save();
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        $id=Auth::user()->id;
        $cart=cart::where('user_id','=', $id)->get();//when using cart table make sure you add model path at the top
        return view('home.show_cart', compact('cart'));
    }


}
