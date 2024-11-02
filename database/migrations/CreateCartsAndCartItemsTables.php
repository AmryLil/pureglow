<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsAndCartItemsTables extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    // Tabel carts_222290
    Schema::create('carts_222290', function (Blueprint $table) {
      $table->bigIncrements('id_222290');
      $table->unsignedBigInteger('user_id_222290');
      $table->timestamps();

      // Foreign key constraint
      $table->foreign('user_id_222290')->references('id_222290')->on('users_222290')->onDelete('cascade');
    });

    // Tabel cart_items_222290
    Schema::create('cart_items_222290', function (Blueprint $table) {
      $table->bigIncrements('id_222290');
      $table->unsignedBigInteger('cart_id_222290');
      $table->unsignedBigInteger('product_id_222290');
      $table->integer('quantity_222290');
      $table->decimal('price_222290', 10, 2);
      $table->timestamps();

      // Foreign key constraints
      $table->foreign('cart_id_222290')->references('id_222290')->on('carts_222290')->onDelete('cascade');
      $table->foreign('product_id_222290')->references('id_222290')->on('products')->onDelete('cascade');  // Pastikan tabel `products` sudah ada dan sesuai dengan yang ada dalam database Anda
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('cart_items_222290');
    Schema::dropIfExists('carts_222290');
  }
}
