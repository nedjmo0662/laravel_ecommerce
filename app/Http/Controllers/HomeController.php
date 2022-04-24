<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
    //

    public function products()
    {
        $products = Product::paginate(6);
        return view('user.products',compact('products'));
    }
    public function index()
    {
        if(Auth::id()){
            
            return redirect('/redirect');
        }else {
            $products = Product::paginate(6);
            return view("user.home",compact('products'));
        }
    }

    public function redirect(Request $req)
    {
        $is_admin = Auth::user()->is_admin;

        if($is_admin){
            $products = Product::paginate(6);
            return view('admin.home',compact('products'));
        }else {
            $products = Product::paginate(3);
            return view("user.home",compact("products"));
        }
    } 

    public function addCart(Request $req, $id)
    {
        if(Auth::id()){
            session(['product' => $id]);
            $cart = Cart::where('product_id', $id)->where('user_id', Auth::id())->get();
            if(count($cart) > 0){
                $cart = $cart[0];
                $quantity = $cart->quantity;
                if($quantity == $req->quantity){
                    return redirect()->back()->with('message' , 'Already ' . $quantity . ' piece in the cart');
                }else{
                    $cart->quantity = $req->quantity;
                    $cart->save();
                }
            }else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $id,
                    'quantity' => $req->quantity,
                ]); 
            }
            return redirect()->back()->with('message','Product added to cart');
        }else {
            return redirect('login');
        }
    }
    
    public function showCart(Request $req, $id){
        $user = User::find($id);
        $products = $user->products->all();
        return $products;
        return view('user.cart',compact('products'));
        // $user_products = $user->products;
        // return $user_products;
    }
}
