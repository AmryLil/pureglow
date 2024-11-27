<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;  // Mengimpor model CategoryProduct
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryProductController extends Controller
{
    // Contoh metode untuk menampilkan semua kategori produk
    public function index()
    {
        $categories = CategoryProduct::all();  // Mengambil semua kategori produk
        return view('categories', compact('categories'));  // Mengembalikan view dengan data kategori
    }

    public function kategori_dashboard()
    {
        $categories = CategoryProduct::all();  // Mengambil semua kategori produk
        return view('dashboard.kategori.index', compact('categories'));  // Mengembalikan view dengan data kategori
    }

    // Contoh metode untuk menampilkan produk berdasarkan kategori
    public function create()
    {
        return view('dashboard.kategori.add');
    }

    // Store a newly created category product in storage
    public function store(Request $request)
    {
        $request->validate([
            'nama_222290'      => 'required|string|max:255',
            'deskripsi_222290' => 'nullable|string',
            'path_img_222290'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Upload gambar jika ada
        $fileName = null;
        if ($request->hasFile('path_img_222290')) {
            $image    = $request->file('path_img_222290');
            $fileName = $image->store('images', 'public');  // Simpan gambar ke public/images
        }

        // Buat entri kategori
        CategoryProduct::create([
            'nama_222290'      => $request->nama_222290,
            'deskripsi_222290' => $request->deskripsi_222290,
            'path_img_222290'  => $fileName  // Simpan nama file ke DB
        ]);

        return redirect()->route('dashboard.kategori.index')->with('success', 'Kategori berhasil disimpan!');
    }

    // Display the specified category product
    public function show($id)
    {
        $category = CategoryProduct::with('products')->findOrFail($id);  // Mengambil kategori berdasarkan ID dengan produk terkait
        return view('productbycategory', compact('category'));  // Mengembalikan view dengan data kategori dan produk
    }

    // Show the form for editing the specified category product
    public function edit($id)
    {
        $category = CategoryProduct::findOrFail($id);
        return view('dashboard.kategori.update', compact('category'));
    }

    // Update the specified category product in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_222290'      => 'required|string|max:255',
            'deskripsi_222290' => 'nullable|string',
            'path_img_222290'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category = CategoryProduct::findOrFail($id);

        // Hapus gambar lama jika ada gambar baru yang diunggah dan path lama bukan URL internet
        if ($request->hasFile('path_img_222290')) {
            // Cek jika path_img_222290 adalah URL internet
            if ($category->path_img_222290 && !filter_var($category->path_img_222290, FILTER_VALIDATE_URL)) {
                if (Storage::exists('public/' . $category->path_img_222290)) {
                    Storage::delete('public/' . $category->path_img_222290);
                }
            }

            // Simpan gambar baru dan perbarui path
            $path                      = $request->file('path_img_222290')->store('images', 'public');
            $category->path_img_222290 = $path;
        }

        // Update atribut lainnya
        $category->nama_222290      = $request->nama_222290;
        $category->deskripsi_222290 = $request->deskripsi_222290;

        $category->save();

        return redirect()->route('dashboard.kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Remove the specified category product from storage
    public function destroy($id)
    {
        $category = CategoryProduct::findOrFail($id);
        $category->delete();

        return redirect()->route('dashboard.kategori.index')->with('success', 'Category product deleted successfully.');
    }

    public function generatePdf(Request $request)
    {
        // Ambil data kategori produk
        $categories = CategoryProduct::all();

        // Generate PDF
        $pdf = PDF::loadView('dashboard.kategori.pdf', compact('categories'));

        // Return PDF download response
        return $pdf->download('categories.pdf');
    }
}
