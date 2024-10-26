<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Method untuk mengambil semua data produk
    public function index(Request $request)
{
    $products = Product::paginate(15); // Mengambil semua produk dari database

    if ($request->has('page')) {
        return view('list_product', compact('products'));
    } else {
        return view('shop', compact('products'));
    }
}
}
