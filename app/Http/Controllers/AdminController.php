<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $pendingsellers =  Seller::where('status', 'Pending')->count();
        $verifiedsellers =  Seller::where('status', 'Verified')->count();
        $categories = Category::all()->count();
        $users = User::all()->count();

        return view('admin.index', compact('pendingsellers', 'verifiedsellers', 'categories','users'));
    }
    public function verified()
    {
        $verifiedsellers =  Seller::where('status', 'Verified')->get();
        return view('admin.approvedseller', compact('verifiedsellers'));
    }

    public function pending()
    {
        $pendingsellers =  Seller::where('status', 'Pending')->get();
        return view('admin.pendingseller', compact('pendingsellers'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }
    public function editcategory(Request $request, Category $category, $id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('admin.editcategory', compact('categories', 'category'));
    }

    public function addcategory(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'=>'required|unique:categories',
            'description' => 'nullable'
        ],[
            'name.unique'=> $request->name .' already exist in categories',
            'name.required'=>'Category name cannot be empty',
        ]);
        $category = $category::create($validated);
        $categories = Category::all();

        return view('admin.categories', compact('categories'));
    }

    public function updatecategory(Request $request, Category $category)
    {
        $validated = $request->validate([
             'name'=>'required|unique:categories',
             'description' => 'nullable'
        ],[
            'name.unique'=> $request->name .' already exist in categories',
            'name.required'=>'Category name cannot be empty',
        ]);
        $id = $request->id;
        $category = Category::find($id);
        $category->update($validated);
        return redirect()->back()->with('success', $category . 'was updated successfully');
    }
    public function deleteCategory(Request $request, Category $category)
    {
        $id = $request->id;
        $category = Category::find($id);
        // $category->delete();
        $category->forceDelete();
        return view('admin.categories');
    }
    // public function verifyseller(Request $request, Seller $seller)
    // {
    //     $id = $request->id;
    //     $seller = Seller::find($id);
    //     $seller->update([
    //         'status' => 'Verified'
    //     ]);
    //     $verifiedsellers =  Seller::where('status', 'Verified')->get();
    //     return view('admin.approvedseller',compact('verifiedsellers'))->with('success', $seller->fullname. ' has been verified successfully.');
    // }
    public function verifyseller(Request $request)
    {
        $id = $request->id;
        $seller = Seller::find($id);

        if (!$seller) {
            return redirect()->back()->with('error', 'Seller not found.');
        }

        $seller->update([
            'status' => 'Verified'
        ]);

        $verifiedsellers =  Seller::where('status', 'Verified')
            ->orderBy('updated_at', 'asc')
            ->get();

        return redirect()->route('verifiedsellers', compact('verifiedsellers'))->with('success', $seller->fullname . ' has been verified successfully.');
    }
}
