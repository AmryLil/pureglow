<?php

// app/Http/Controllers/TransaksiController.php

namespace App\Http\Controllers;

use App\Models\Product;  // Pastikan model Product sudah di-import
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        // Ambil ID pengguna yang sedang login
        $userId = session('user_id');

        // Ambil transaksi yang terkait dengan ID pelanggan yang sedang login
        $transaksiList = Transaksi::where('id_pelanggan_222290', $userId)
            ->where('status_222290', 'success')  // Filter hanya transaksi dengan status sukses
            ->get();

        // Untuk setiap transaksi, ambil data produk berdasarkan id_produk_222290
        foreach ($transaksiList as $transaksi) {
            // Pisahkan ID produk yang disimpan sebagai string
            $productIds = explode(',', $transaksi->id_produk_222290);

            // Ambil data produk yang sesuai dengan ID
            $transaksi->products = Product::whereIn('id_222290', $productIds)->get();
        }

        return view('transaksi', compact('transaksiList'));
    }

    public function showAll()
    {
        // Mengambil semua data transaksi
        $transaksis = Transaksi::with('pelanggan')->get();
        return view('dashboard.transaksi.index', compact('transaksis'));
    }
}
