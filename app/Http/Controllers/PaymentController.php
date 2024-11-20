<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    // Method untuk menampilkan semua transaksi
    public function index()
    {
        $transaksi = Transaksi::where('id_pelanggan_222290', Auth::id())->get();
        return response()->json($transaksi);
    }

    // Method untuk menampilkan transaksi berdasarkan ID
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }
        return response()->json($transaksi);
    }

    // Method untuk menyimpan bukti pembayaran dari keranjang
    public function store(Request $request)
    {
        // Validasi input untuk bukti transfer
        $validated = $request->validate([
            'receipt' => 'required|image|max:2048',  // Bukti transfer wajib ada dan harus berupa gambar
        ]);

        // Ambil data pengguna yang sedang login dari session
        $userId = session('user_id');

        if (!$userId) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 403);
        }

        // Ambil data keranjang berdasarkan user_id
        $cart = Cart::where('user_id_222290', $userId)->first();

        if (!$cart) {
            return response()->json(['message' => 'Keranjang belanja tidak ditemukan'], 404);
        }

        // Ambil item dari tabel CartItem berdasarkan cart_id
        $cartItems = CartItem::where('cart_id_222290', $cart->id_222290)->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Keranjang belanja kosong'], 400);
        }

        $totalPrice    = 0;
        $totalQuantity = 0;

        // Simpan file bukti transfer
        try {
            $path = $request->file('receipt')->store('bukti_transfer', 'public');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan bukti transfer', 'error' => $e->getMessage()], 500);
        }

        // Proses transaksi dan pengurangan stok produk
        foreach ($cartItems as $item) {
            $product = $item->product;

            if (!$product) {
                return response()->json(['message' => 'Produk dengan ID ' . $item->product_id_222290 . ' tidak ditemukan'], 404);
            }

            // Periksa apakah stok cukup
            if ($product->jumlah_222290 < $item->quantity_222290) {
                return response()->json(['message' => 'Stok produk ' . $product->nama_222290 . ' tidak mencukupi'], 400);
            }

            // Hitung total harga dan jumlah
            $totalPrice    += $product->harga_222290 * $item->quantity_222290;
            $totalQuantity += $item->quantity_222290;

            // Kurangi stok produk
            $product->jumlah_222290 -= $item->quantity_222290;
            $product->save();

            // Buat transaksi baru
            Transaksi::create([
                'id_pelanggan_222290'      => $userId,
                'jumlah_222290'            => $item->quantity_222290,
                'id_produk_222290'         => $product->id_222290,
                'harga_total_222290'       => $product->harga_222290 * $item->quantity_222290,
                'status_222290'            => 'success',
                'bukti_tf_222290'          => $path,
                'tanggal_transaksi_222290' => Carbon::now(),
            ]);
        }

        // Kosongkan keranjang setelah checkout berhasil
        CartItem::where('cart_id_222290', $cart->id_222290)->delete();

        // Hapus keranjang jika sudah kosong
        $cart->delete();

        return response()->json(['message' => 'Pembayaran berhasil disimpan', 'data' => 'success'], 201);
    }

    // Method untuk mengupdate status transaksi (misalnya oleh admin)
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'status_222290' => 'required|in:pending,approved,rejected',
        ]);

        // Update status transaksi
        $transaksi->update(['status_222290' => $validated['status_222290']]);

        return response()->json(['message' => 'Status transaksi diperbarui', 'data' => $transaksi]);
    }

    // Method untuk menghapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        // Hapus file bukti transfer jika ada
        if ($transaksi->bukti_tf_222290) {
            Storage::disk('public')->delete($transaksi->bukti_tf_222290);
        }

        $transaksi->delete();

        return redirect()->back()->with('success', 'Transaksi berhasil dihapus.');
    }

    public function checkoutSingleProduct(Request $request, $productId)
    {
        // Validasi input untuk bukti transfer
        $validated = $request->validate([
            'receipt'  => 'required|image|max:2048',  // Bukti transfer wajib berupa gambar
            'quantity' => 'required|integer|min:1'  // Jumlah produk yang dibeli
        ]);

        // Ambil pengguna dari session
        $userId = session('user_id');

        if (!$userId) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 403);
        }

        // Ambil data produk berdasarkan ID
        $product = \App\Models\Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        // Periksa apakah stok mencukupi
        if ($product->jumlah_222290 < $validated['quantity']) {
            return response()->json(['message' => 'Stok produk tidak mencukupi'], 400);
        }

        // Simpan bukti transfer
        try {
            $path = $request->file('receipt')->store('bukti_transfer', 'public');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan bukti transfer', 'error' => $e->getMessage()], 500);
        }

        // Kurangi stok produk
        $product->jumlah_222290 -= $validated['quantity'];
        $product->save();

        // Buat transaksi baru
        $transaksi = Transaksi::create([
            'id_pelanggan_222290'      => $userId,
            'jumlah_222290'            => $validated['quantity'],
            'id_produk_222290'         => $product->id_222290,
            'harga_total_222290'       => $product->harga_222290 * $validated['quantity'],
            'status_222290'            => 'pending',
            'bukti_tf_222290'          => $path,
            'tanggal_transaksi_222290' => Carbon::now(),
        ]);

        return response()->json([
            'message'   => 'Checkout berhasil',
            'transaksi' => $transaksi
        ], 201);
    }
}
