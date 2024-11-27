<?php

// app/Http/Controllers/TransaksiController.php

namespace App\Http\Controllers;

use App\Models\Product;  // Pastikan model Product sudah di-import
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function showAll(Request $request)
    {
        // Mendapatkan filter dari request
        $filter = $request->get('filter', 'semua');  // Nilainya bisa: 'hari', 'minggu', atau 'bulan'

        // Memulai query untuk transaksi
        $transaksis = Transaksi::with('pelanggan');

        // Menambahkan kondisi berdasarkan filter
        if ($filter == 'hari') {
            $transaksis->hariIni();
        } elseif ($filter == 'minggu') {
            $transaksis->mingguIni();
        } elseif ($filter == 'bulan') {
            $transaksis->bulanIni();
        }

        // Eksekusi query
        $transaksis = $transaksis->get();

        // Menampilkan data transaksi di halaman utama
        return view('dashboard.transaksi.index', compact('transaksis', 'filter'));
    }

    // Fungsi untuk mengenerate PDF
    // Fungsi untuk mengenerate PDF dengan filter

    public function generatePdf($filter, Request $request)
    {
        // Memulai query untuk transaksi
        $transaksis = Transaksi::with('pelanggan');

        // Menambahkan kondisi berdasarkan filter

        if ($filter == 'hari') {
            $transaksis->hariIni();
        } elseif ($filter == 'minggu') {
            $transaksis->mingguIni();
        } elseif ($filter == 'bulan') {
            $transaksis->bulanIni();
        } elseif ($filter == 'semua') {
            $transaksis = Transaksi::with('pelanggan');
        }

        if (!$filter) {
            $transaksis = Transaksi::with('pelanggan');
        }

        // Eksekusi query
        $transaksis = $transaksis->get();

        // Menyimpan data transaksi dan filter ke view untuk PDF
        $pdf = PDF::loadView('dashboard.transaksi.pdf', compact('transaksis', 'filter'));

        // Menyediakan nama file PDF berdasarkan filter
        $filename = 'Transaksi-' . ucfirst($filter) . '.pdf';

        // Mengunduh PDF
        return $pdf->download($filename);
    }
}
