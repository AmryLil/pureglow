<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function createTransaction(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey    = 'SB-Mid-server-0BPSoq6ZokfN6eJlm49W38mF';
        Config::$clientKey    = 'SB-Mid-client-uWS7H-PNyLQB8VKx';
        Config::$isProduction = false;
        Config::$isSanitized  = true;
        Config::$is3ds        = true;

        // Data transaksi
        $transactionDetails = [
            'order_id'     => 'ORDER_' . time(),
            'gross_amount' => $request->input('amount'),  // total amount
        ];

        $itemDetails = [
            [
                'id'       => 'item1',
                'price'    => $request->input('amount'),
                'quantity' => 1,
                'name'     => 'Test Item'
            ]
        ];

        $customerDetails = [
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'email'      => $request->input('email'),
            'phone'      => $request->input('phone'),
        ];

        // Data lengkap transaksi
        $transactionData = [
            'transaction_details' => $transactionDetails,
            'item_details'        => $itemDetails,
            'customer_details'    => $customerDetails,
        ];

        // Mendapatkan Snap Token dari Midtrans
        try {
            $snapToken = Snap::getSnapToken($transactionData);
            return response()->json(['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function storePendingTransaction(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_pelanggan'      => 'required|integer',
            'order_id'          => 'required|string',  // ID order dari Midtrans
            'transaction_id'    => 'nullable|string',  // ID transaksi dari Midtrans
            'jumlah'            => 'required|integer|min:1',
            'harga_total'       => 'required|integer',  // Total harga yang dibayar
            'status'            => 'required|string',  // Status transaksi
            'metode_pembayaran' => 'nullable|string',
            'product_ids'       => 'required|string',
        ]);

        // Simpan data ke database
        Transaksi::create([
            'id_pelanggan_222290'      => $validatedData['id_pelanggan'],
            'order_id_222290'          => $validatedData['order_id'],
            'transaction_id_222290'    => $validatedData['transaction_id'],
            'jumlah_222290'            => $validatedData['jumlah'],
            'harga_total_222290'       => $validatedData['harga_total'],
            'status_222290'            => $validatedData['status'],
            'metode_pembayaran_222290' => $validatedData['metode_pembayaran'],
            'id_produk_222290'         => $validatedData['product_ids'],
            'tanggal_transaksi_222290' => now(),  // Tanggal transaksi dibuat
        ]);

        return response()->json(['message' => 'Data transaksi pending berhasil disimpan.']);
    }
}
