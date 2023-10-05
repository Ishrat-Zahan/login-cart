<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('layouts.main');
    }

    public function cartapi($id)
    {
        $single = Product::find($id);

        if (!$single) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($single);
    }

    public function product()
    {
        if (Auth::check()) {
            $products = Product::all();
            return view('product', [
                'products' => $products,
            ]);
        } else {
           
            return redirect()->route('login');
        }
    }
    public function cart()
    {
        if (Auth::check()) {
           
            return view('cart');
        } else {
           
            return redirect()->route('login');
        }
    }
}
