<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class LinksController extends Controller
{
    protected $title; // Define the property

    public function __construct()
    {
        $this->title = Route::currentRouteName();
    }

    public function profile()
    {
        $user = Auth::user();
        if ($user) {
            return view('profile', compact('user'));
        } else {
            return redirect()->back();
        }
    }

    public function products()
    {
        // $user = Auth::user();

        // if($user){
        //     $products = Product::where();
        // }
        $products = Product::inRandomOrder()
            ->get();;
        return view('products', compact('products'))->with('title', $this->title);
    }

    public function cart()
    {
        return view('cart')->with('title', $this->title);
    }

    public function checkout()
    {
        $id = Auth::id();
        $address = Address::where('user_id', $id)
            ->where('active', 1)
            ->first();

        $products = Cart::where('user_id', $id)
            ->where('status', 'Pending')
            ->where('order_id', null)
            ->with('product')
            ->get();


        if (empty($address)) {
            return view('add-address')->with(['message' => 'You need to provide a delivery address']);
        }

        return view('checkout', compact('products', 'address'))->with('title', $this->title);
    }

    public function pay()
    {
        try {
            $url = "https://api.paystack.co/transaction/initialize";
            $user = User::find(Auth::id());
            $total = 0;

            $carts = Cart::where('user_id', $user->id)
            ->where('status', 'Pending')
            ->where('order_id', null)
            ->get();

            foreach ($carts as $cart) {
                $total += $cart->price;
            
            }
            $fields = [
                'email' => $user->email,
                 'amount' => $total*100,
                // 'callback_url' => env('APP_URL') . "payment?amount=" . $amount,
                'callback_url' => env('APP_URL') . "createOrder",
            ];
    
            $response = Http::withHeaders([
                "Authorization" => "Bearer " . env('PAYSTACK_SKEY'),
                "Cache-Control" => "no-cache"
            ])->post($url, $fields);
    
            $result = $response->json();

            
    
            if ($result['status']) {
                $access_code = $result['data']['access_code'];
                session(['access_code' => $access_code]);
                return redirect($result['data']['authorization_url']);
            } 
        } catch (\Exception $e) {
            // Handle exceptions, such as network errors or issues with the API
            Log::error('Paystack payment initialization failed: ' . $e->getMessage());
            $access_code = "An error occurred while processing your payment. Please try again.";
        }
    
        return view('payment', compact('access_code'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $reference = $request->input('reference');
        try {
            
            return redirect()->route('index');
        } catch (\Exception $e) {
          
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function account(Address $address)
    {
        $address =  Address::where('user_id', Auth::id())
            ->where('active', 1)
            ->first();
        return view('account', compact('address'))->with('title', $this->title);
    }

    public function international()
    {
        $user = Auth()->user();
        if ($user) {
            $products = Product::where('country', '!=', $user->country)
                ->inRandomOrder()->get();
        } else {
            $products = Product::inRandomOrder()->get();;
        }

        return view('international', compact('products'))->with('title', $this->title);
    }

    public function shop($id)
    {
        $seller = Seller::find($id);
        $products = Product::where('seller_id', $id)->get();
        return view('shop', compact('seller', 'products'));
    }



    public function category($id)
    {
        $products = Product::where('category_id', $id)->get();
        $category = Category::find($id);
        $categories = Category::all();
        $category_id = $id;
        return view('category', compact('products', 'category', 'categories', 'category_id'))->with('title', $this->title);
    }
}
