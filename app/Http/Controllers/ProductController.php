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
public function create()
{
    return view('products.create');
}

// Menyimpan data produk baru ke database
public function store(Request $request)
{
    $request->validate([
        'nama_222290' => 'required|string|max:255',
        'deskripsi_222290' => 'nullable|string',
        'harga_222290' => 'required|numeric',
        'kategori_id_222290' => 'required|integer',
        'path_img_222290' => 'nullable|string|max:255'
    ]);

    Product::create($request->all());

    return redirect()->route('products')->with('success', 'Produk berhasil ditambahkan.');
}

// Menampilkan detail produk tertentu
public function show(Product $product)
{
    return view('products.show', compact('product'));
}

// Menampilkan form untuk mengedit produk tertentu
public function edit(Product $product)
{
    return view('products.edit', compact('product'));
}

// Memperbarui data produk di database
public function update(Request $request, Product $product)
{
    $request->validate([
        'nama_222290' => 'required|string|max:255',
        'deskripsi_222290' => 'nullable|string',
        'harga_222290' => 'required|numeric',
        'kategori_id_222290' => 'required|integer',
        'path_img_222290' => 'nullable|string|max:255'
    ]);

    $product->update($request->all());

    return redirect()->route('products')->with('success', 'Produk berhasil diperbarui.');
}

// Menghapus produk tertentu dari database
public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('products')->with('success', 'Produk berhasil dihapus.');
}
}
