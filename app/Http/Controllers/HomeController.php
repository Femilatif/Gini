<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user =  Auth::user();
        $products = Product::all();

        if($user){
            $f_products = Product::where('country', '!=', $user->country)->get();
        }else{
            $f_products = Product::all();
        }
        
        return view('index',compact('products','f_products'));
    }
}
