<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function createTransaction(Request $request)
    {
        \Midtrans\Config::$serverKey    = config('midtrans.server_key');
        \Midtrans\Config::$clientKey    = config('midtrans.client_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');

        // Data transaksi
        $transactionDetails = [
            'order_id'     => 'ORDER_' . time(),
            'gross_amount' => $request->input('amount'),  // total amount from the request
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

        // Mendapatkan snap token
        $snapToken = Snap::getSnapToken($transactionData);

        return response()->json(['snapToken' => $snapToken]);
    }
}
