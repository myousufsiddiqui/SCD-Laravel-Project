<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function index()
    {
        return view('frontend.master');
    }
    public function login()
    {
        return view('frontend.login');
    }

    
    public function request()
    {
        return view('frontend.request');
    }
    public function category()
    {
      
        $products = Product::all();
        return view('frontend.category',compact('products'));
    }
    public function register()
    {
        return view('frontend.register');
    }
    public function detail(Product $product)
    {
        return view('frontend.detail', compact('product'));
    }
    
    public function contact()
    {
        return view('frontend.contact');
    }    


    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Search for products by name or description
        $products = Product::where('name', 'like', '%' . $query . '%')
                           ->orWhere('description', 'like', '%' . $query . '%')
                           ->get();
    
        return response()->json(['products' => $products]);
    }
    
}
