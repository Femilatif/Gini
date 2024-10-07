<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    protected $title;

    public function __construct()
    {
        $this->title = Route::currentRouteName();
    }

    public function product($id)
    {
        // $product = Product::find($id);
        $user =  Auth::user();
        $product = Product::with('category')
            ->with('seller')
            ->find($id);

        if(!empty($user)){
            $cart = Cart::where('product_id', $id)
            ->where('status', 'Pending')
            ->where('user_id',$user->id)
            ->first();
        }else{
            $cart = Cart::where('product_id', $id)
            ->where('status', 'Pending')
            // ->where('user_id',$user->id)
            ->first(); 
        }
        
        if($product){
            $related_products = Product::where('category_id', $product->category_id)->get();
            return view('product', compact('product', 'cart', 'related_products'))->with('title', $this->title);
        }else{
            return redirect()->back();
        }

       
    }

    public function category($id)
    {
        $products = Product::where('category_id', $id)->get();

        return view('category', compact('category'));
    }
}
