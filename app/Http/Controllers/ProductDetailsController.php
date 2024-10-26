<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function showProductDetails($id)
    {
        // Cari produk berdasarkan ID
        $product = Product::find($id);

        // Jika produk tidak ditemukan, tampilkan error atau halaman 404
        if (!$product) {
            abort(404, 'Product not found');
        }

        // Kembalikan tampilan dengan data produk
        return view('product', compact('product'));
    }
}
