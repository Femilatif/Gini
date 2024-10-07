<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $completed_orders = Order::where('status', 'Completed')
            ->where('user_id', $user->id)
            ->orderBy('updated_at','desc')
            ->get();

        $carts =  Cart::where('user_id', $user->id)
            ->where('status', 'Completed')
            ->with('product')
            ->with('order')
            ->orderBy('updated_at','desc')
            ->get();

        $pending_orders = Order::where('status', 'Pending')
            ->where('user_id', $user->id)
            ->orderBy('updated_at','desc')
            ->get();

        return view('orders', compact('user', 'completed_orders', 'pending_orders', 'carts'));
    }
    
    public function order($order)
    {
        $user = Auth::user();
        // Fetch the order with the given order number
        $myorder = Order::where('order_number', $order)->first();
    
        // Check if the order exists
        if (!$myorder) {
            // Handle case where order doesn't exist, for example:
            return redirect()->route('home')->with('error', 'Order not found.');
        }
    
        // Eager load the cart and product relationships
        $myorder->load('cart.product');
    
        // Access the carts from the loaded relationship
        $carts = $myorder->cart;
    
        return view('order', compact('myorder', 'carts'));
    }
    // public function order($order)
    // {
    //     $user = Auth::user();
    //     $myorder = Order::where('order_number', $order)
    //         // ->with('cart')
    //         // ->with('product')
    //         ->first();

    //     $carts =  Cart::where('order_id', $myorder->id)
    //         ->with('product')
    //         ->with('order')
    //         ->get();
     

    //     return view('order', compact('myorder', 'carts'));
    // }

    public function createOrder()
    {
        $id = Auth::id();
        $carts = Cart::where('user_id', $id)
            ->where('status', 'Pending')
            ->where('order_id', null)
            ->get();

        $total = 0;

        $order = Order::create([
            'order_number' => str_pad(rand(0, pow(10, 10) - 1), 10, '0', STR_PAD_LEFT),
            'user_id' => $id,
            'status' => 'Completed',
            'total_amount' => $total,
        ]);

        foreach ($carts as $cart) {
            $total += $cart->price;
            $cart->update([
                'status' => 'Completed',
                'order_id' => $order->id,
            ]);
        }

        $order->update([
            'total_amount' => $total,
        ]);


        return redirect()->route('orders')->withSuccess('Your Order ' . $order->order_numberx . 'was placed successfully Successfully');
    }



    // public function createOrder()
    // {
    //     $id = Auth::id();
    //     $carts = Cart::where('user_id', $id)
    //         ->where('status', 'Pending')
    //         ->where('order_id', null)
    //         ->get();

    //     $order_num = Str::random(10);
    //     $order_num = Str::random(5) . strtoupper(Str::random(5));
    //     $total = 0;
    //     foreach ($carts as $cart) {
    //        $total += $cart->price;
    //        $cart->update(['status'=>'Completed', 'order_num'=>$order_num]);


    //     }

    //     $orderItem  = new Order();
    //     $orderItem->order_number = $order_num;
    //     $orderItem->user_id = Auth::id();
    //     $orderItem->status = 'Completed';
    //     $orderItem->total_amount = $total;

    //     $orderItem->create();

    //     return redirect()->route('orders');
    // }
}
