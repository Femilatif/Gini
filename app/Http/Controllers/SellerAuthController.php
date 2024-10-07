<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SellerAuthController extends Controller
{
    //
    protected $redirectTo = '/seller/index';

    public function showLoginForm()
    {
        return view('seller.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('sellers')->attempt($credentials, $request->remember)) {
            return redirect()->intended($this->redirectTo);
        }

        return back()->withErrors(['email' => 'Invalid login credentials'])->withInput($request->only('email', 'remember'));
    }

    public function signup(){
        return view('seller.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'status' => ['nullable', 'string', 'max:255'],
            'shop_name' => ['required', 'string', 'max:255'],
            'shop_address' => ['required', 'string', 'max:255'],
            // 'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sellers'], 
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    
        $validated['password'] =Hash::make($validated['password']);
        $validated['status'] = 'Pending';
        $seller = Seller::create($validated);
    
        if($seller){
            // Log in the user after registration
            auth()->guard('sellers')->login($seller);
            return redirect()->route('myshop'); // Assuming 'seller.dashboard' is the route name for the seller dashboard
        }
    
        return redirect()->back()->with('error', 'Registration failed.'); // Redirect with an error message if registration fails
    }
    
    public function logout(Request $request)
    {

        Auth::guard('sellers')->logout();
        $request->session()->invalidate();
        return redirect('/seller');
    }
}
