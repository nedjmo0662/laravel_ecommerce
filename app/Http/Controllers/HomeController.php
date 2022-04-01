<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Product;

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
            $proucts = Product::paginate(6);
            return view("user.home",compact('products'));
        }
    }

    public function redirect()
    {
        // return 'nedjmo';
        $is_admin = Auth::user()->is_admin;

        if($is_admin){
            $product = Product::paginate(6);
            return view('admin.home',compact('products'));
        }else {
            $products = Product::paginate(3);
            return view("user.home",compact("products"));
        }
    } 
}
