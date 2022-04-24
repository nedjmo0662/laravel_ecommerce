<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use com;


class AdminController extends Controller
{
    //
    public function products()
    {
        $products = Product::paginate(6);
        return view('admin.products',compact('products'));
    }
    public function admin(Request $req){
        $users = User::all();
        return view("admin.cPannel");
    }

    public function uploadProduct(Request $req){
        $validate = $req->validate([
            'title' => "required|string|max:20",
            "description" => "required|string",
            "image" =>"required|mimes:png,jpg",
            "price" => "required|numeric",
            "quantity" => "required|numeric"
        ]);
        if($validate){
            if($req->hasFile('image')){

                $image = $req->file('image');
                $imageName = time() . "." . $image->getClientOriginalExtension();
                $image->move(public_path() . "/productImages",$imageName);
            }
            $product = Product::create([
                "image" => $imageName,
                "title" => $req->title,
                "description" => $req->description,
                "quantity" => $req->quantity,
                "price" => $req->price,
            ]);
            return redirect()->back()->with('message',"product has added successfully");
        }
    }


    public function destroy(Request $req, $id){
        $product = Product::find($id);
        
        if($product->image){ 
            unlink("productImages/" . $product->image);
        } 
        Product::destroy($id);
        return redirect()->back();
    }

    public function edit(Request $req , $id)
    {
        
        $product = Product::find($id);
        
        return view('admin.edit',compact('product'));
    }


    public function update(Request $req, $id){
        $validate = $req->validate([
            'title' => "required|string|max:200",
            "description" => "required|string",
            "image" =>"mimes:png,jpg",
            "price" => "required|numeric",
            "quantity" => "required|numeric"
        ]);
        $product = Product::find($id);
        if($validate){
            if($req->hasFile('image')){
                //delet the image from the server if exists
                if($product->image){ 
                    unlink("productImages/" . $product->image);
                } 

                $image = $req->file('image');
                $imageName = time() . "." . $image->getClientOriginalExtension();
                $image->move(public_path() . "/productImages",$imageName);
            }
            // return dd($req->file('image'));

            $product->title = $req->title ;
            $product->description = $req->description;
            $product->quantity = $req->quantity;
            $product->price = $req->price;
            $product->image = $req->image ?? $product->image;

            $product->save();
            return redirect()->back()->with('message',"product has updated successfully");
        }
    }
}
