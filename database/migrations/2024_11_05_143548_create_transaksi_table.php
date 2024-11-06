<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transaksi_222290', function (Blueprint $table) {
            $table->id('id_transaksi_222290');  // ID unik untuk setiap transaksi
            $table->integer('id_pelanggan_222290');  // ID pelanggan yang melakukan transaksi
            $table->string('order_id_222290');  // ID order dari Midtrans
            $table->string('id_produk_222290');  // ID order dari Midtrans
            $table->string('transaction_id_222290')->nullable();  // ID transaksi dari Midtrans
            $table->integer('jumlah_222290');  // Jumlah barang atau produk yang dibeli
            $table->integer('harga_total_222290');  // Total harga yang dibayar (gross amount)
            $table->string('status_222290')->default('pending');  // Status transaksi: pending, success, atau failed
            $table->string('metode_pembayaran_222290')->nullable();  // Metode pembayaran, contoh: bank transfer, e-wallet
            $table->timestamp('tanggal_transaksi_222290')->useCurrent();  // Tanggal transaksi dibuat
            $table->timestamps();  // Tanggal dibuat dan diperbarui
        });

        Schema::create('carts_222290', function (Blueprint $table) {
            $table->id('id_222290');  // Primary key dengan nama id_222290
            $table->foreignId('user_id_222290')->constrained('users_222290')->onDelete('cascade');  // Relasi ke tabel users_222290
            $table->timestamps();  // Timestamp untuk created_at dan updated_at
        });

        Schema::create('cart_items_222290', function (Blueprint $table) {
            $table->id('id_222290');  // Primary key dengan nama id_222290
            $table->foreignId('cart_id_222290')->constrained('carts_222290')->onDelete('cascade');  // Relasi ke tabel carts_222290
            $table->foreignId('product_id_222290')->constrained('products')->onDelete('cascade');  // Relasi ke tabel products
            $table->integer('quantity_222290');  // Quantity barang dalam cart
            $table->decimal('price_222290', 10, 2);  // Harga barang
            $table->timestamps();  // Timestamp untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_222290');
    }
};
