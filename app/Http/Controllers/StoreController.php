<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Product;
class StoreController extends Controller
{
    //
    public function store($id){
        $seller = Seller::find($id);
        $products = Product::where('seller_id', $id)->get();
        return view('shop', compact('seller', 'products'));
    }

}
