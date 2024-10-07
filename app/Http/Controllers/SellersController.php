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
use Illuminate\Support\Facades\DB;

class SellersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $revenue = 0;
        $id = Auth::guard('sellers')->id();
        $seller = Seller::find($id);
        $products = Product::where('seller_id', $seller->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $placed_orders = Cart::where('seller_id', $id)
            ->where('Status', 'Completed')
            ->count();

        $completed_orders = Cart::where('seller_id', $id)
            ->where('Status', 'Delivered')
            ->count();

        $total = Cart::where('seller_id', $id)
            ->where('status', 'Delivered')
            ->value(DB::raw('SUM(price)'));

        $totalproducts = Product::where('seller_id', $seller->id)->count();



        return view('seller.shop', compact('seller', 'products', 'placed_orders', 'completed_orders', 'total', 'totalproducts'));
    }
    public function allproducts()
    {
        $revenue = 0;
        $id = Auth::guard('sellers')->id();
        $seller = Seller::find($id);
        $products = Product::where('seller_id', $seller->id)
            ->orderBy('created_at', 'desc')
            ->get();



        return view('seller.allproducts', compact('seller', 'products'));
    }

    public function orders()
    {
        $id = Auth::guard('sellers')->id();

        $placed_orders = Cart::where('seller_id', $id)
            ->where('Status', 'Completed')
            ->get();

        $completed_orders = Cart::where('seller_id', $id)
            ->where('Status', 'Delivered')
            ->get();

        $seller = Seller::find($id);

        return view('seller.orders', compact('placed_orders', 'completed_orders', 'seller'));
    }

    public function completedorders()
    {
        $id = Auth::guard('sellers')->id();

        $placed_orders = Cart::where('seller_id', $id)
            ->where('Status', 'Completed')
            ->get();

        $completed_orders = Cart::where('seller_id', $id)
            ->where('Status', 'Delivered')
            ->orderBy('updated_at','desc')
            ->get();

        $seller = Seller::find($id);

        return view('seller.completedorders', compact('placed_orders', 'completed_orders', 'seller'));
    }

    public function accept(Request $request)
    {
        // Validate the incoming request data
        $id = $request->id;
        $request->validate([
            'id' => 'required|exists:carts,id',
        ]);


        $cart = Cart::findOrFail($id);
        $cart->update(['status' => 'Delivered']);
        return redirect()->route('completedorders')->with('success', 'Order has been accepted');
    }

    public function updateProduct(Request $request)
    {
        $id = Auth::guard('sellers')->id();
        $validated = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required',
            'qty' => 'required',
            'description' => 'nullable',
            'category_id' => 'required',
        ]);

        $product = Product::findOrFail($request->id);
        if ($product->seller_id != $id) {
            return redirect()->back()->with('error', ' Unauthorized Action ');
        }
        $product->update($validated);

        return redirect()->back()->with('success', $product->name . ' Has been updated successfully');
    }

    public function addProduct(Request $request)
    {


        $validated = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required',
            'qty' => 'required',
            'country' => 'required',
            'description' => 'nullable',
            'category_id' => 'required',
            'seller_id' => 'required',
        ]);

        // Handle image upload
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName); // Save the image to the public/uploads directory
            $validated['img'] = '/uploads/' . $imageName; // Store the image path in the database
        }

        // Create new product instance
        Product::create($validated);


        return redirect()->route('myshop')->with('success', 'Product created successfully');
    }

    // public function accept(Request $request)
    // {
    //     $id = $request->id;
    //     $cart = Cart::find($id);

    //     $cart->update(['status' => 'Delivered']);
    //     return redirect()->back()->withSuccess('Order has been accepted');
    // }

    public function reject(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:carts,id',
        ]);

        $id = $request->id;
        $cart = Cart::findOrFail($id);
        $cart->update(['status' => 'Rejected']);
        return redirect()->back()->with('success', 'Order has been accepted');
    }

    public function orderdetails($id)
    {
        $cart = Cart::findOrFail($id);
        $user = User::findOrFail($cart->user_id);
        $address = Address::where('user_id', $user->id)
            ->where('active', 1)
            ->first();

        return view('seller.orderdetails', compact('cart', 'user', 'address'));
    }

    public function product($id)
    {
        $pid = Auth::guard('sellers')->id();
        $product = Product::find($id);
        $categories = Category::all();

      

        if($product){
            if ($product->seller_id != $pid) {
                return redirect()->back()->with('error', ' Unauthorized Action ');
            }
            return view('seller.product', compact('product', 'categories'));
        }else{
            return redirect()->back();
        }
  
    }

    public function newproduct()
    {
        $categories = Category::all();
        $id = Auth::guard('sellers')->id();
        $seller = Seller::find($id);
        return view('seller.addproducts', compact('seller','categories'));
    }

    public function deleteproduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('myshop')->with('success', 'Product deleted successfully');
    }


    public function selleraccount(){
        $revenue = 0;
        $id = Auth::guard('sellers')->id();
        $seller = Seller::find($id);
        $products = Product::where('seller_id', $seller->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $placed_orders = Cart::where('seller_id', $id)
            ->where('Status', 'Completed')
            ->count();

        $completed_orders = Cart::where('seller_id', $id)
            ->where('Status', 'Delivered')
            ->count();

        $total = Cart::where('seller_id', $id)
            ->where('status', 'Delivered')
            ->value(DB::raw('SUM(price)'));

        $totalproducts = Product::where('seller_id', $seller->id)->count();



        return view('seller.profile', compact('seller', 'products', 'placed_orders', 'completed_orders', 'total', 'totalproducts'));
    }

  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
