<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_222290;
use App\Models\CartItem;
use App\Models\CartItem_222290;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Fungsi untuk menambahkan item ke dalam cart
    public function addToCart(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $userId = session('user_id');

        $cart = Cart::firstOrCreate(['user_id_222290' => $userId]);

        $cartItem = $cart->items()->where('product_id_222290', $productId)->first();

        if ($cartItem) {
            $cartItem->quantity_222290 += $request->input('quantity', 1);
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id_222290' => $product->id_222290,
                'quantity_222290'   => $request->input('quantity', 1),
                'price_222290'      => $product->harga_222290
            ]);
        }

        return response()->json(['message' => 'Product added to cart successfully'], 200);
    }

    public function showCart()
    {
        // Ambil ID user dari sesi
        $userId = session('user_id');

        // Ambil cart berdasarkan user_id dan muat cartItems
        $cart = Cart::where('user_id_222290', $userId)->with('cartItems.product')->first();

        // Pastikan cart ditemukan
        if (!$cart) {
            return view('cart', ['cartItems' => collect()]);  // Jika tidak ada cart, kembalikan koleksi kosong
        }

        // Kirim data ke view
        return view('cart', ['cartItems' => $cart->cartItems]);
    }

    // Fungsi untuk melihat isi cart
    public function viewCart()
    {
        $userId = session('user_id');
        $cart   = Cart::where('user_id_222290', $userId)->with('items.product')->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart is empty'], 200);
        }

        return response()->json([
            'cart_id' => $cart->id_222290,
            'items' => $cart->items->map(function ($item) {
                return [
                    'product_id'   => $item->product_id_222290,
                    'product_name' => $item->product->name_222290,
                    'quantity'     => $item->quantity_222290,
                    'price'        => $item->price_222290
                ];
            })
        ], 200);
    }
}
