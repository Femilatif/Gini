<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{

    public function index(Request $request, Cart $cart)
    {
        $id =  Auth::id();
        $carts = Cart::where('user_id', $id)
            ->where('status', 'Pending')
            ->with('product')
            ->get();

        return view('cart',compact('carts'));
    }
    
    public function countCart()
    {
        $id = Auth::id();
        $total =  Cart::where('user_id', $id)
            ->where('status', 'Pending')
            ->count();
        return view('layouts.header', ['total' => $total]);
    }

    public function addToCart(Request $request, Cart $cart)
    {
        $validated = $request->validate([
            'qty' => 'required|integer|min:1', // Assuming qty should be an integer greater than zero
            'price' => 'required|numeric|min:0', // Assuming price should be a non-negative number
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'seller_id' => 'required',
        ]);

        $validated['price'] = $validated['qty'] * $validated['price'];
        $cart->create($validated);
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        $productId = $request->query('id');
        $quantity = $request->query('quantity');
        $userId = Auth::user()->id;

        $cartItem = Cart::where('product_id', $productId)
            ->where('user_id', $userId)
            ->first();

        if ($cartItem) {
            $cartItem->qty = $quantity;
            $cartItem->save();
            // return redirect()->back()->withSuccess('Cart updated successfully');
            return response()->json(['success' => true, 'message' => 'Cart quantity updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Cart item not found']);
        // return redirect()->back()->withErrors("Unable to update quantity");

    }
    public function cartplus(Request $request)
    {
        $productId = $request->product_id;
        // $quantity = $request->query('quantity');
        $userId = Auth::id();

        $product = Product::find($productId);
        $cartItem = Cart::where('product_id', $productId)
            ->where('user_id', $userId)
            ->where('status','Pending')
            ->first();

        if ($cartItem) {
            $cartItem->qty += 1;
            $cartItem->price = $product->price * $cartItem->qty;
            $cartItem->save();
            return redirect()->back()->withSuccess('Cart updated successfully');
            // return response()->json(['success' => true, 'message' => 'Cart quantity updated successfully']);
        }

        // return response()->json(['success' => false, 'message' => 'Cart item not found']);
        return redirect()->back()->withErrors("Unable to update quantity");
    }
    public function cartminus(Request $request)
    {
        $productId = $request->product_id;
        // $quantity = $request->query('quantity');
        $userId = Auth::id();
        $product = Product::find($productId);
        $cartItem = Cart::where('product_id', $productId)
            ->where('user_id', $userId)
            ->where('status','Pending')
            ->first();

        if ($cartItem) {
            $cartItem->qty -= 1;
            $cartItem->price = $product->price * $cartItem->qty;
            $cartItem->save();
            return redirect()->back()->withSuccess('Cart updated successfully');
            // return response()->json(['success' => true, 'message' => 'Cart quantity updated successfully']);
        }

        // return response()->json(['success' => false, 'message' => 'Cart item not found']);
        return redirect()->back()->withErrors("Unable to update quantity");
    }

    public function destroy($id){
       $cart = Cart::find($id);
       if($cart){
          $cart->delete();
          return redirect()->back()->withSuccess("Cart deleted successfully");
       }
       return redirect()->back()->withErrors("Unable to delete id");
    }
}
