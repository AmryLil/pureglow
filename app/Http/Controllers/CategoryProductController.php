<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct; // Mengimpor model CategoryProduct
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    // Contoh metode untuk menampilkan semua kategori produk
    public function index()
    {
        $categories = CategoryProduct::all(); // Mengambil semua kategori produk
        return view('categories', compact('categories')); // Mengembalikan view dengan data kategori
    }

    // Contoh metode untuk menampilkan produk berdasarkan kategori
    public function show($id)
    {
        $category = CategoryProduct::with('products')->findOrFail($id); // Mengambil kategori berdasarkan ID dengan produk terkait
        return view('productbycategory', compact('category')); // Mengembalikan view dengan data kategori dan produk
    }
}
