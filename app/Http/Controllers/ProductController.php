<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Method untuk mengambil semua data produk
    public function index(Request $request)
    {
        // Mengambil semua produk dengan paginasi (15 per halaman)
        $products = Product::paginate(15);

        // Cek apakah request memiliki parameter 'page'
        if ($request->has('page')) {
            return view('list_product', compact('products'));
        }

        // Hanya mengambil produk terlaris jika halaman shop ditampilkan
        $productsLaris = Product::skip(4)->take(4)->get();
        return view('shop', compact('products', 'productsLaris'));
    }

    public function Best4Product(Request $request)
    {
        $products = Product::limit(4)->get();
        return view('index', compact('products'));
    }

    // Controller: DashboardController.php

    public function showProduct()
    {
        $products = Product::with('category')->get();

        return view('dashboard.produk.product', [
            'title'    => 'Daftar Produk',
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = CategoryProduct::all();  // Ambil semua kategori untuk pilihan
        return view('dashboard.produk.add', compact('categories'));
    }

    // Simpan produk baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_222290'        => 'required|string|max:255',
            'deskripsi_222290'   => 'required|string',
            'harga_222290'       => 'required|numeric',
            'kategori_id_222290' => 'required|integer|exists:kategori_produk_222290,id_222290',
            'path_img_222290'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Upload the image
        $fileName = null;
        if ($request->hasFile('path_img_222290')) {
            $image    = $request->file('path_img_222290');
            $fileName = $image->store('images', 'public');  // Simpan gambar ke public/images
        }

        // Buat entri produk
        Product::create([
            'nama_222290'        => $request->nama_222290,
            'deskripsi_222290'   => $request->deskripsi_222290,
            'harga_222290'       => $request->harga_222290,
            'kategori_id_222290' => $request->kategori_id_222290,
            'path_img_222290'    => $fileName  // Simpan nama file ke DB
        ]);

        return redirect()->route('dashboard.produk')->with('success', 'Produk berhasil disimpan!');
    }

    // Tampilkan satu produk
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Tampilkan form untuk mengedit produk
    public function edit($id)
    {
        $product    = Product::findOrFail($id);
        $categories = CategoryProduct::all();
        return view('dashboard.produk.update', compact('product', 'categories'));
    }

    // Update produk yang ada
    // Update produk yang ada

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_222290'        => 'required|string|max:255',
            'deskripsi_222290'   => 'required|string',
            'harga_222290'       => 'required|numeric',
            'kategori_id_222290' => 'required|exists:kategori_produk_222290,id_222290',
            'path_img_222290'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        // Update gambar jika ada gambar baru diunggah
        if ($request->hasFile('path_img_222290')) {
            // Hapus gambar lama jika ada
            if ($product->path_img_222290 && Storage::exists('public/' . $product->path_img_222290)) {
                Storage::delete('public/' . $product->path_img_222290);
            }

            // Simpan gambar baru dan perbarui path
            $path                     = $request->file('path_img_222290')->store('images', 'public');
            $product->path_img_222290 = $path;
        }

        // Update atribut lainnya
        $product->nama_222290        = $request->nama_222290;
        $product->deskripsi_222290   = $request->deskripsi_222290;
        $product->harga_222290       = $request->harga_222290;
        $product->kategori_id_222290 = $request->kategori_id_222290;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Hapus produk dari database
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('dashboard.produk')->with('success', 'Product deleted successfully.');
    }
}
