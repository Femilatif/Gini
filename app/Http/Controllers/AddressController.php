<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class AddressController extends Controller
{
    //
    public function index(Request $request)
    {
        $id = Auth::id();
        $addresses = Address::where('user_id', $id)
            ->orderBy('active', 'desc')
            ->get();
        $total = Address::where('user_id', $id)->count();
        return view('address', compact('addresses', 'total'));
    }

    public function create(Request $request, Address $address)
    {
        $validated = $request->validate([
            'address' => 'required',
        ]);
        $userId = Auth::id();
        $total = Address::where('user_id', $userId)->count();
        if ($total < 1) {
            $address->create([
                'address' => $validated['address'],
                'user_id' => $userId,
                'active' => 1
            ]);
        } else {
            $address->create([
                'address' => $validated['address'],
                'user_id' => $userId,
            ]);
        }
        return redirect()->route('address');
    }


    public function show(Request $request)
    {
        return view('add-address');
    }

    public function set_default(Request $request)
    {
        $id = $request->id;
        $user_id = Auth::id();
        Address::where('user_id', $user_id)->update(['active' => 0]);

        $address = Address::find($id);
        if ($address) {
            $address->update(['active' => 1]);
        }
        return redirect()->back();
    }

    public function destroy($id, Address $address)
    {
        $address = Address::find($id);
        $address->delete();
        return redirect()->back();
    }
}
