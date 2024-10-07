<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    public function update(Request $request, User $user)
    {
        $id = $request->id;
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
     
        $user->where("id", $id)->update($validated);
        return redirect()->back();
        
    }
}
