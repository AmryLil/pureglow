<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table      = 'cart_items_222290';
    protected $primaryKey = 'id_222290';

    protected $fillable = [
        'cart_id_222290',
        'product_id_222290',
        'quantity_222290',
        'price_222290'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id_222290', 'id_222290');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_222290');  // Ganti 'product_id_222290' dengan nama kolom yang sesuai
    }
}
