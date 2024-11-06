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
        return $this->belongsTo(Product::class, 'product_id_222290', 'id_222290');
    }
}
